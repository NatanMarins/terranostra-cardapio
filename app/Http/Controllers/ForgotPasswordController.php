<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForgotPassword(){

        return view('login.forgotPassword');
    }


    public function submitForgotPassword(Request $request){

        // Validar formulário
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'O campo E-mail é obrigatório!',
            'email.email' => 'Deve conter um E-mail válido!'
        ]);

        // Verificar se o usuário existe no banco de dados
        $usuario = User::where('email', $request->email)->first();

        if (!$usuario) {

            return back()->withInput()->with('error', 'E-mail não encontrado!');
        }

        try {

            $status = Password::sendResetLink(
                $request->only('email')
            );

            return redirect()->route('login.index')->with('success', 'E-mail de recuperação de senha enviado!');

        } catch (Exception $e) {

            return back()->withInput()->with('error', 'Tente Novamente mais tarde!');
        }
    }


    public function showResetPassword(Request $request)
    {
        dd($request->token);
    }
}
