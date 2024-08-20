@extends('layouts.admin')

@section('content')

    <h2>Cadastrar Novo Item</h2>

    <a href="{{ route('categoria.index') }}">
        <button type="button">Categorias</button>
    </a>

    <x-alert/>

    <form action="{{ route('categoria.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Categoria: </label>
        <input type="text" name="categoria" id="categoria" placeholder="Categoria do Produto" value="{{ old('name') }}">

        <button type="submit">Cadastrar</button>

    </form>
    
@endsection