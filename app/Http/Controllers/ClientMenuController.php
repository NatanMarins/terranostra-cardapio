<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class ClientMenuController extends Controller
{
    public function menu(){

        $empresas = Empresa::all();

        return view('cliente.menu', compact('empresas'));
    }

    public function show($empresa){

        // Buscar o restaurante pelo ID
        $empresa = Empresa::findOrFail($empresa);


        // Buscar todas as categorias da empresa
        $categorias = $empresa->menus()->with('categoria')->get()->groupBy('categoria_id');

        return view('cliente.show', compact('empresa', 'categorias'));
    }
}
