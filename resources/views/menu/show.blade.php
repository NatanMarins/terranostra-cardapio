@extends('layouts.admin')

@section('content')

    <h2>Detalhes Item</h2>

    <x-alert/>

    <a href="{{ route('menu.index') }}">
        <button type="button">Lista de produtos</button>
    </a>

    <img src="{{ asset("storage/{$menu->product_file_name}") }}" alt="[imagem]">
    <p>Nome: {{ $menu->nome }}</p>
    <p>Preço: {{ $menu->preco }}</p>
    <p>Descrição: {{ $menu->descricao }}</p>


    <form action="{{ route('menu.destroy', ['menu' => $menu->id]) }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Deseja excluir o item permanentemente?')">Excluir</button>
    </form>

    <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}">
        <button>Editar</button>
    </a>



    
@endsection