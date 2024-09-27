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
    public function index(){

        // Atribuindo a variável empresas os valores que estão no banco de dados
        $empresas = Empresa::all();

        // Retorna a view e envia a variável empresas
        return view('empresa.index', compact('empresas'));
    }


    public function show($empresa){

        // Atribuindo a variável empresa os valores para empresa com id específico
        $empresa = Empresa::findOrFail($empresa);

        // Retorna a view e envia a variável empresa
        return view('empresa.show', compact('empresa'));
    }


    public function create(){

        // Retorna a view 
        return view('empresa.create');
    }


    public function store(Request $request, Empresa $empresa){

        // Validação do formulário
        $request->validate([
            'nome' => 'required',
            'razao_social' => 'required',
            'cnpj' => 'required|cnpj',
            'telefone' => 'required',
            'email' => 'required|email|unique:empresas',
            'cep' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'rua' => 'required',
            'numero_endereco' => 'required',
        ],[
            // Mensagens de erro
            'nome.required' => 'O campo Nome é obrigatório.',
            'razao_social.required' => 'O campo Razão Social é obrigatório.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.cnpj' => 'Cnpj inválido.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'Cnpj inválido.',
            'email.unique' => 'Esse E-mail já está sendo usado.',
            'cep.required' => 'O campo CEP é obrigatório.',
            'estado.required' => 'O campo Estado é obrigatório.',
            'cidade.required' => 'O campo Cidade é obrigatório.',
            'bairro.required' => 'O campo Bairro é obrigatório.',
            'rua.required' => 'O campo Rua é obrigatório.',
            'numero_endereco.required' => 'O campo Número é obrigatório.',
        ]);

        // Criando os registros no banco de dados
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

        // Redireciona o usuário com mensagem de sucesso
        return redirect()->route('empresa.index')->with('success', 'Empresa cadastrada com sucesso!');
    }


    public function edit(Empresa $empresa)
    {
        // Retorna a view e envia a variável empresa
        return view('empresa.edit', ['empresa' => $empresa]);
    }


    public function update(Request $request, Empresa $empresa){

        // Atualizando os campos no banco de dados
        $empresa->update([
            'nome' => $request->nome
        ]);

        // Redireciona o usuário com mensagem de sucesso
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
            //Redirecionar o usuário
            return redirect()->route('empresa.index')->with('error', ' A Empresa não pode ser excluida!');
        }
    }


    public function colaboradores(Empresa $empresa) {

        // Busca todos os colaboradores da empresa
        $colaboradores = User::where('empresa_id', $empresa->id)->get();

        // Retorna a view com a lista de colaboradores
        return view('empresa.colaboradores', compact('colaboradores', 'empresa'));
    }


    public function createColaborador(Empresa $empresa) {

        // Busca todos os colaboradores da empresa
        $colaboradores = User::where('empresa_id', $empresa->id)->get();

        // Atribui a variável roles os papéis
        $roles = Role::pluck('name')->all();

        // Retorna a view com algumas variáveis
        return view('empresa.create-colaborador', ['empresa' => $empresa, 'colaborador' => $colaboradores, 'roles' => $roles]);
    }


    public function storeColaborador(Request $request, Empresa $empresa) {

        // Validacão do formulário
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required',
        ],[
            // Mensagens de erro
            'name.required' => 'Campo Nome obrigatório.',
            'email.required' => 'Campo E-mail obrigatório.',
            'email.email' => 'Insira um E-mail válido.',
            'email.unique' => 'Esse E-mail já está sendo usado.',
            'password.required' => 'Campo Senha obrigatório.',
            'password.min' => 'A senha deve conter no mínimo :min caracteres.',
            'roles.required' => 'Campo Nome obrigatório.',
        ]);

        // Criando os registros no banco de dados
        $usuario = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'empresa_id' => $empresa->id,
        ]);

        // Cadastrar papel para o usuário
        $usuario->assignRole($request->roles);

        // Retorna a view com algumas variáveis
        return redirect()->route('empresa.colaboradores', ['empresa' => $empresa->id])->with('success', 'Cadastrado com sucesso!');
    }

}
