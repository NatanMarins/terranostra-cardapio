<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Categoria;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(){

        // Recuperar os registros do banco de dados
        //$produtos = Menu::orderBy('id', 'DESC')->get();

        $menus = Menu::with('categoria')->get();


        return view('menu.index',compact('menus'));
    }


    public function show(Menu $menu){

        $categoria = Menu:: with('categoria')->findOrFail($menu->id);

        //dd($categoria);        

        return view('menu.show', compact('categoria'), ['menu' => $menu]);
    }


    public function create(){

        $categorias = Categoria::all();

        return view('menu.create', compact('categorias'));
    }


    public function store(MenuRequest $request){

        //Validar formulário
        $request->validated();

        DB::beginTransaction();
        
        try{
            //Transformando o nome do arquivo de imagem em um nome único
            $file_name = rand(0, 999999) . '-' . $request->file('product_file_name')->getClientOriginalName();
            $path = $request->file('product_file_name')->storeAs('uploads', $file_name);

            $data = $request->all();
            $data['product_file_name'] = $path;

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

        $menu->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'categoria_id' => $request->categoria_id,
        ]);

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
            return redirect()->route('menu.index')->with('error', 'Produto não escluído!');
        }
    }
}
