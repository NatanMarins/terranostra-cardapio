@extends('layouts.admin')

@section('content')

    <h2>Cadastrar Novo Item</h2>

    <a href="{{ route('empresa.index') }}">
        <button type="button">Empresas</button>
    </a>

    <x-alert/>

    <form action="{{ route('empresa.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome da Empresa" value="{{ old('name') }}">

        <label>Razão Social: </label>
        <input type="text" name="razao_social" id="razao_social" placeholder="Razão Social" value="{{ old('name') }}">

        <label>CNPJ: </label>
        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" value="{{ old('name') }}">

        <label>Telefone: </label>
        <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{ old('name') }}">

        <label>E-mail: </label>
        <input type="text" name="email" id="email" placeholder="E-mail" value="{{ old('name') }}">

        <label>CEP: </label>
        <input type="text" name="cep" id="cep" placeholder="CEP" value="{{ old('name') }}">

        <label>UF: </label>
        <input type="text" name="estado" id="estado" placeholder="UF" value="{{ old('name') }}">

        <label>Cidade: </label>
        <input type="text" name="cidade" id="cidade" placeholder="Cidade" value="{{ old('name') }}">

        <label>Bairro: </label>
        <input type="text" name="bairro" id="bairro" placeholder="Bairro" value="{{ old('name') }}">

        <label>Rua: </label>
        <input type="text" name="rua" id="rua" placeholder="Nome da Rua" value="{{ old('name') }}">

        <label>Número: </label>
        <input type="text" name="numero_endereco" id="numero_endereco" placeholder="Número" value="{{ old('name') }}">

        <label>Complemento: </label>
        <textarea name="complemento" id="complemento" cols="30" rows="10">{{ old('name') }}</textarea>

        

        

        

        



        <button type="submit">Cadastrar</button>

    </form>
    
@endsection
