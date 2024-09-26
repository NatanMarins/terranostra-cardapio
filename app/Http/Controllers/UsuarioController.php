<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function index(){

        $empresaId = Auth::user()->empresa_id;

        $usuarios = User::where('empresa_id', $empresaId)->get();

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
            'empresa_id' => $request->empresa_id,
        ]);

        // Cadastrar papel para o usuário
        $usuario->assignRole($request->roles);

        return redirect()->route('usuario.index')->with('success', 'Cadastrado com sucesso!');
    }


    public function edit(User $usuario){

        $roles = Role::pluck('name')->all();

        $usuarioRoles = $usuario->roles->pluck('name')->first();

        return view('usuario.edit', ['usuario' => $usuario, 'roles' => $roles, 'usuarioRoles' => $usuarioRoles]);
    }


    public function update(Request $request, User $usuario){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Atualiza os dados do usuário
        $usuario->name = $validatedData['name'];
        $usuario->email = $validatedData['email'];
        
        // Atualizar checkbox
        $usuario->situacao = $request->has('situacao');
        $usuario->save();

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
