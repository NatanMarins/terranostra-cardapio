@extends('layouts.admin')

@section('content')

    <h2>Cadastrar Novo Item</h2>

    <a href="{{ route('menu.index') }}">
        <button type="button">Lista de produtos</button>
    </a>

    <x-alert/>

    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome do Produto" value="{{ old('name') }}">

        <label>Descrição: </label>
        <textarea name="descricao" id="descricao" cols="30" rows="4">{{ old('name') }}</textarea>

        <label>Preço: </label>
        <input type="text" name="preco" id="preco" placeholder="Valor do Produto" value="{{ old('name') }}">

        <label for="categoria_id">Categoria:</label>
        <select id="categoria_id" name="categoria_id">
            <option value="">Selecione uma Categoria</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->categoria }}
                </option>
            @endforeach
        </select>

        <label for="product_file_name">Selecione o arquive de imagem:</label>
        <input type="file" name="product_file_name" id="product_file_name">

        <button type="submit">Cadastrar</button>

    </form>

@endsection