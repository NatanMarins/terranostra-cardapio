<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Categoria;
use App\Models\Menu;
use App\Models\User;
use Exception;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(){

        $menus = Menu::with('categoria')->get();

        return view('menu.index',compact('menus'));
    }


    public function show(Menu $menu){

        $categoria = Menu::with('categoria')->findOrFail($menu->id);

        $descontoPercentual = (($categoria->preco - $categoria->preco_promocional) / $categoria->preco) * 100;

        $precoPromocional = $categoria->preco - ($categoria->preco * $categoria->desconto_percentual / 100);


        return view('menu.show', compact('categoria', 'descontoPercentual', 'precoPromocional'), ['menu' => $menu]);
    }


    public function create(){

        $categorias = Categoria::all();

        return view('menu.create', compact('categorias'));
    }


    public function store(MenuRequest $request){

        //Validar formulário
        $request->validated();

        $empresa_id = User::where('empresa_id', Auth::id())->first();

        DB::beginTransaction();
        
        try{
            //Transformando o nome do arquivo de imagem em um nome único
            $file_name = rand(0, 999999) . '-' . $request->file('product_file_name')->getClientOriginalName();
            $path = $request->file('product_file_name')->storeAs('uploads', $file_name);

            $data = $request->all();
            $data['product_file_name'] = $path;
            $data['empresa_id'] = $empresa_id->empresa_id;

            //Cadastrar no banco de dados
            Menu::create($data);

            //Operação concluída com êxito
            DB::commit();

            // Redirecionar o usuário
            return redirect()->route('menu.create')->with('success', 'Produto cadastrado com sucesso!');

        } catch(Exception $e){
            //Operação não concluída com êxito
            DB::rollBack();

            // Redirecionar o usuário
            return back()->withInput()->with('error', 'Item não foi cadastrado!');
        }
    }


    public function edit(Menu $menu){

        $categorias = Categoria::all();

        return view('menu.edit', compact('categorias'),['menu' => $menu]);
    }


    public function update(Request $request, Menu $menu){

        // Tratamento dos valores monetários para garantir que estejam no formato correto
        $request->merge([
            'preco' => str_replace(',', '.', $request->preco),
            'preco_promocional' => str_replace(',', '.', $request->preco_promocional),
            'desconto_promocional' => str_replace(',', '.', $request->desconto_promocional),
        ]);
        
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'preco_promocional' => 'required|numeric',
            'desconto_percentual' => 'required|numeric',
        ], [
            // Mensagens de erro
            'nome.required' => 'O campo nome é obrigatório.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'preco.required' => 'O campo preço é obrigatório.',
            'preco.numeric' => 'O campo preço deve ser um número.',
            'categoria_id.required' => 'O campo categoria é obrigatório.',
            'categoria_id.exists' => 'A categoria selecionada é inválida.',
            'preco_promocional.required' => 'O campo preço promocional é obrigatório.',
            'preco_promocional.numeric' => 'O campo preço promocional deve ser um número.',
            'desconto_promocional.required' => 'O campo desconto promocional é obrigatório.',
            'desconto_promocional.numeric' => 'O campo desconto promocional deve ser um número.',
        ]);

        $menu->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'categoria_id' => $request->categoria_id,
        ]);

        //Atualização de preço promocional e desconto percentual
        $precoPromocional = $request->preco_promocional;
        $descontoPercentual = $request->desconto_percentual;


        if ($precoPromocional > 0 || $descontoPercentual > 0){

            if ($precoPromocional > 0 && ($descontoPercentual=== null || $descontoPercentual <= 0)){
                //Calcular o percentual de desconto baseado no preço promocional
                $descontoPercentual = (($request->preco - $precoPromocional) / $request->preco) * 100;
            }

            if (($precoPromocional === null || $precoPromocional <= 0) && $descontoPercentual > 0){
                //Calcular o preço promocional baseado no percentual de desconto
                $precoPromocional = $request->preco - ($request->preco * ($descontoPercentual / 100));
            }

            // Atualizar o menu com os valores calculados
            $menu->update([
                'preco_promocional' => $precoPromocional,
                'desconto_percentual' => $descontoPercentual,
            ]);
                
        }


        if ($request->hasFile('product_file_name')) {
            // Deletar a imagem antiga, se existir
            if ($menu->product_file_name) {
                Storage::disk('public')->delete($menu->product_file_name);
            }

            // Armazenar a nova imagem
            $file = $request->file('product_file_name');
            $file_name = rand(0, 999999) . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $file_name, 'public'); // Salva em storage/app/public/uploads

            // Atualizar o campo de imagem com o novo caminho
            $menu->update(['product_file_name' => $path]);
        }


        return redirect()->route('menu.show', ['menu' => $menu->id])->with('success', 'Produto editado com sucesso!');
    }


    public function destroy(Menu $menu){

        try{
            //Excluir registro
            $menu->delete();

            //Redirecionar o usuário
            return redirect()->route('menu.index')->with('success', 'Produto excluido com sucesso!');
        } catch(Exception $e){
            return redirect()->route('menu.index')->with('error', 'Produto não excluído!');
        }
    }
}
