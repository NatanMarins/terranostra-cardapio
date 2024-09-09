<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
