@extends('layouts.admin')

@section('content')

    <h2>Menu</h2>

    <x-alert/>

    <a href="{{ route('menu.create') }}">
        <button type="button">Cadastrar Novo Item</button>
    </a>
    <br>


    @forelse ($produtos as $produto)

        <a href="{{ route('menu.show', ['menu' => $produto->id]) }}">
            <button>Detalhes</button>
        </a>

        {{ $produto->descricao }} <br>
        
    @empty
        <p style="color: red">Nenhum produto encontrado</p>
        
    @endforelse


    
@endsection