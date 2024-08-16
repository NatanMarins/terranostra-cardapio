@extends('layouts.admin')

@section('content')

    <h2>Cadastrar Novo Item</h2>

    <a href="{{ route('menu.index') }}">
        <button type="button">Lista de produtos</button>
    </a>

    <x-alert/>

    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Descrição: </label>
        <input type="text" name="descricao" id="descricao" placeholder="Decriçao do Item" value="{{ old('name') }}" required>


        <button type="submit">Cadastrar</button>

    </form>


    
@endsection