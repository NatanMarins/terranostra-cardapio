@extends('layouts.admin')

@section('content')

    <h2>Lista de produtos</h2>
    <a href="{{ route('menu.create') }}">
        <button>Cadastrar Novo Produto</button>
    </a>

    <x-alert/>
    
    <br>


    @forelse ($produtos as $produto)

        <img src="{{ asset("storage/{$produto->product_file_name}") }}" alt="[imagem]">
        <h3>{{ $produto->nome }}</h3>
        <p>{{ $produto->descricao }}</p>
        <div class="price">{{ $produto->preco }}</div> 
        <a href="{{ route('menu.show', ['menu' => $produto->id]) }}">Detalhes</a>
        <a href="{{ route('menu.edit', ['menu' => $produto->id]) }}">Editar</a>
 
    @empty
        <p style="color: red">Nenhum produto encontrado</p>
        
    @endforelse
    
@endsection