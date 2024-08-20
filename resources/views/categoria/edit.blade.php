@extends('layouts.admin')

@section('content')

    <h2>Editar Item</h2>

    <a href="{{ route('categoria.index') }}">
        <button type="button">Categorias</button>
    </a>


    <form action="{{ route('categoria.update', ['categoria' => $categoria->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Categoria: </label>
        <input type="text" name="categoria" id="categoria" placeholder="Nova Categoria" value="{{ old('name') }}">

        <button type="submit" onclick="return confirm('Confirmar alterações')">Confirmar Alteraçoes</button>
    </form>
    
@endsection