<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaPerfilController extends Controller
{
    public function show(){

        // Recuperar do banco de dados as informações do usuário logado
        $empresa_id = User::where('empresa_id', Auth::id())->first();

        // Carrega a view
        return view('empresa_profile.show', ['empresa' => $empresa_id]);
        
    }
}
