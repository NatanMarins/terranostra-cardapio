<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use Exception;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(){

        $empresas = Empresa::get();

        return view('empresa.index', compact('empresas'));
    }


    public function show(Empresa $empresa){

        return view('empresa.show', ['empresa' => $empresa]);
    }


    public function create(Request $request){

        return view('empresa.create');
    }


    public function store(Request $request, Empresa $empresa){

        Empresa::create([
            'nome' => $request->nome,
            'razao_social' => $request->razao_social,
            'cnpj' => $request->cnpj,
            'responsavel' => $request->responsavel,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'cep' => $request->cep,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero_endereco' => $request->numero_endereco,
            'complemento' => $request->complemento,

        ]);

        return redirect()->route('empresa.index')->with('success', 'Categoria cadastrada com sucesso!');
    }


    public function edit(Empresa $empresa){

        return view('empresa.edit', ['empresa' => $empresa]);
    }


    public function update(Request $request, Empresa $empresa){

        $empresa->update([
            'nome' => $request->nome
        ]);

        return redirect()->route('empresa.index')->with('success', 'Empresa editada com sucesso!');

    }


    public function destroy(Empresa $empresa){

        try{
            //Excluir registro
            $empresa->delete();
    
            //Redirecionar o usuário
            return redirect()->route('empresa.index')->with('success', 'Empresa excluida com sucesso!');
    
            } catch(Exception $e){
                return redirect()->route('empresa.index')->with('error', ' A Empresa não pode ser excluida!');
            }

    }
}
