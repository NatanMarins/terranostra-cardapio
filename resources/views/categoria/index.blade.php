@extends('layouts.admin')

@section('content')

    <h2>Lista de produtos</h2>
    <a href="{{ route('categoria.create') }}">
        <button>Cadastrar Nova Categoria</button>
    </a>

    <x-alert/>
    
    <br>


    @forelse ($categorias as $categoria)
        
        <h3>{{ $categoria->categoria }}</h3>

        <a href="{{ route('categoria.edit', ['categoria' => $categoria->id]) }}">
            <button>Editar</button>
        </a>
        <a href="{{ route('categoria.show', ['categoria' => $categoria->id]) }}">
            <button>Visualizar</button>
        </a>
        
    @empty
        <p style="color: red">Nenhuma categoria encontrada</p>
        
    @endforelse


    
@endsection