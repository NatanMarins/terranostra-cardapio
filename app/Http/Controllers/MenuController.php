<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

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
        return view('menu.create');
    }


    public function store(Request $request){

        //Validar formulário
        //$request->validated();
        // nao ta funcionando ainda

        //Cadastrar no banco de dados
        Menu::create([
            'descricao' => $request->descricao
        ]);

        // Redirecionar o usuário
        return redirect()->route('menu.create')->with('success', 'Produto cadastrado com sucesso!');
    }


    public function edit(Menu $menu){
        return view('menu.edit', ['menu' => $menu]);
    }


    public function update(Request $request, Menu $menu){
        
        //Editar as informações
        $menu->update([
            'descricao' => $request->descricao
        ]);
        
        return redirect()->route('menu.show', ['menu' => $menu->id])->with('success', 'Produto editado com sucesso!');
    }


    public function destroy(Menu $menu){

        //Excluir registro
        $menu->delete();

        //Redirecionar o usuário
        return redirect()->route('menu.index')->with('success', 'Produto excluido com sucesso!');
    }
}
