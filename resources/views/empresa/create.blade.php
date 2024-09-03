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

        <label>Empresa: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome da Empresa" value="{{ old('name') }}">

        <button type="submit">Cadastrar</button>

    </form>
    
@endsection
