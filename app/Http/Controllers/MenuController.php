<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Categoria;
use App\Models\Menu;
use Exception;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(){

        // Recuperar os registros do banco de dados
        $produtos = Menu::orderBy('id', 'DESC')->get();

        return view('menu.index', ['produtos' => $produtos]);
    }


    public function show(Menu $menu){

        return view('menu.show', ['menu' => $menu]);
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


    public function update(MenuRequest $request, Menu $menu){
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
