<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{
    public function index(){

        $usuarios = User::get();

        return view('usuario.index', compact('usuarios'));
    }


    public function show(){

    }


    public function create(){

        return view('usuario.create');
    }


    public function store(UsuarioRequest $request){
        
        //Validar formulário
        $request->validated();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('usuario.create')->with('success', 'Categoria cadastrada com sucesso!');
    }


    public function edit(){

    }


    public function update(){

    }


    public function editPassword(){

    }


    public function updatePassword(){

    }


    public function destroy(){

    }
}
