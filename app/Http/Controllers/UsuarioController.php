<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function index(){

        $usuarios = User::get();

        return view('usuario.index', compact('usuarios'));
    }


    public function show(User $usuario){

        return view('usuario.show', ['usuario' => $usuario]);
    }


    public function create(){

        $roles = Role::pluck('name')->all();

        return view('usuario.create', ['roles' => $roles]);
    }


    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required'
        ]);

        $usuario = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        // Cadastrar papel para o usuário
        $usuario->assignRole($request->roles);

        return redirect()->route('usuario.create')->with('success', 'Cadastrado com sucesso!');
    }


    public function edit(User $usuario){

        $roles = Role::pluck('name')->all();

        $usuarioRoles = $usuario->roles->pluck('name')->first();

        return view('usuario.edit', ['usuario' => $usuario, 'roles' => $roles, 'usuarioRoles' => $usuarioRoles]);
    }


    public function update(Request $request, User $usuario){

        $usuario->update([
            'nome' => $request->nome,
            'email' => $request->email,
        ]);

        $usuario->syncRoles($request->roles);

        return redirect()->route('usuario.show', ['usuario' => $request->usuario])->with('success', 'Usuário editado!');
    }


    public function editPassword(){

    }


    public function updatePassword(){

    }


    public function destroy(User $usuario){

        try{
            //Excluir registro
            $usuario->delete();

            // Remove todos os papéis atribuídos ao usuário
            $usuario->syncRoles([]);

            //Redirecionar o usuário
            return redirect()->route('usuario.index')->with('success', 'Usuário excluido com sucesso!');
        } catch(Exception $e){
            return redirect()->route('usuario.index')->with('error', 'Usuário não excluído!');
        }

    }
}
