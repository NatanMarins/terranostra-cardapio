<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaPerfilController extends Controller
{
    public function show(){

        // Recuperar do banco de dados as informações do usuário logado
        $empresaId = Auth::user()->empresa_id;
        $empresa = Empresa::where('id', $empresaId)->get()->first();

        $colaboradores = Empresa::with('usuarios')->findOrFail($empresaId);

        // Carrega a view
        return view('empresa_profile.show', ['empresa' => $empresa, 'colaboradores' => $colaboradores]);
        
    }
}
