@extends('layouts.admin')

@section('content')

    <h2>Editar Item</h2>

    <a href="{{ route('menu.index') }}">
        <button type="button">Lista de produtos</button>
    </a>


    <form action="{{ route('menu.update', ['menu' => $menu->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Descrição: </label>
        <input type="text" name="descricao" id="descricao" placeholder="Decriçao do Item" value="{{ old('name') }}" required>

        <button type="submit" onclick="return confirm('Confirmar alterações')">Confirmar Alteraçoes</button>
    </form>
    

    
@endsection