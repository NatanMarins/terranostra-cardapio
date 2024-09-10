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


    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return redirect()->route('usuario.create')->with('success', 'Cadastrado com sucesso!');
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
