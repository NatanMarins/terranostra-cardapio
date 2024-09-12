<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class LoginController extends Controller
{
    // Login

    public function index(){

        return view('login.index');
    }


    public function loginProcess(LoginRequest $request){

        //dd($request);

        // Validar o formulário
        $request->validated();

        // Validar o usuário e a senha com as informações do  banco de dados
        $autenticado = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // Verifeicar se o usuário foi autenticado
        if(!$autenticado){

            // Redirecionar para página de login com mensagem de erro
            return back()->withInput()->with('error', 'E-mail ou senha inválido!');
        }

        // Obter o usuário autenticado
        $user = Auth::user();
        $user = User::find($user->id);

        // Verificar permições
        if($user->hasRole('Super Admin')){
            $permissions = Permission::pluck('name')->toArray();
        }else{
            $permissions = $user->getPermissionsViaRoles()->pluck('name')->toArray();
        }

        $user->syncPermissions($permissions);


        // Redirecionar o usuário
        return redirect()->route('menu.index');

    }


    public function destroy(){

        // Deslogar o usuário
        Auth::logout();

        // Redirecionar o usuário e enviar mensagem de sucesso
        return redirect()->route('login.index')->with('success', 'Deslogado com sucesso!');
    }
}
