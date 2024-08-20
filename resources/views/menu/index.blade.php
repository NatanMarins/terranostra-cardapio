@extends('layouts.admin')

@section('content')

    <div class="products-header">
        <h2>Lista de produtos</h2>
        <a href="{{ route('menu.create') }}">&#43</a>
    </div>

    <x-alert/>
    
    <br>


    @forelse ($produtos as $produto)
        <div class="card-container">
            <div class="card">
                <img src="{{ asset("storage/{$produto->product_file_name}") }}" alt="[imagem]">
                <h3>{{ $produto->nome }}</h3>
                <p>{{ $produto->descricao }}</p>
                <div class="price">{{ $produto->preco }}</div> 
                <a href="{{ route('menu.show', ['menu' => $produto->id]) }}" class="details-button">Detalhes</a>
            </div>
        </div>      
    @empty
        <p style="color: red">Nenhum produto encontrado</p>
        
    @endforelse


    
@endsection