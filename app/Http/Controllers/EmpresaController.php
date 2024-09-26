<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class EmpresaController extends Controller
{
    public function index()
    {

        $empresas = Empresa::all();

        return view('empresa.index', compact('empresas'));
    }


    public function show($empresa)
    {


        $empresa = Empresa::findOrFail($empresa);

        return view('empresa.show', compact('empresa'));
    }


    public function create(Request $request)
    {

        return view('empresa.create');
    }


    public function store(Request $request, Empresa $empresa)
    {

        Empresa::create([
            'nome' => $request->nome,
            'razao_social' => $request->razao_social,
            'cnpj' => $request->cnpj,
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

        return redirect()->route('empresa.index')->with('success', 'Empresa cadastrada com sucesso!');
    }


    public function edit(Empresa $empresa)
    {

        return view('empresa.edit', ['empresa' => $empresa]);
    }


    public function update(Request $request, Empresa $empresa)
    {

        $empresa->update([
            'nome' => $request->nome
        ]);

        return redirect()->route('empresa.index')->with('success', 'Empresa editada com sucesso!');
    }


    public function destroy(Empresa $empresa)
    {

        try {
            //Excluir registro
            $empresa->delete();

            //Redirecionar o usuário
            return redirect()->route('empresa.index')->with('success', 'Empresa excluida com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('empresa.index')->with('error', ' A Empresa não pode ser excluida!');
        }
    }


    public function colaboradores(Empresa $empresa) {

        // Busca todos os colaboradores (usuários) da empresa
        $colaboradores = User::where('empresa_id', $empresa->id)->get();

        // Retorna a view com a lista de colaboradores
        return view('empresa.colaboradores', compact('colaboradores', 'empresa'));
    }


    public function createColaborador(Empresa $empresa) {

        // Busca todos os colaboradores (usuários) da empresa
        $colaboradores = User::where('empresa_id', $empresa->id)->get();

        $roles = Role::pluck('name')->all();

        return view('empresa.create-colaborador', ['empresa' => $empresa, 'colaborador' => $colaboradores, 'roles' => $roles]);
    }


    public function storeColaborador(Request $request, Empresa $empresa) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required',
        ]);

        $usuario = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'empresa_id' => $empresa->id,
        ]);

        // Cadastrar papel para o usuário
        $usuario->assignRole($request->roles);

        return redirect()->route('empresa.colaboradores', ['empresa' => $empresa->id])->with('success', 'Cadastrado com sucesso!');
    }

}
