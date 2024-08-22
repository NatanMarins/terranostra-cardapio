@extends('layouts.admin')

@section('content')

    <h2>Detalhes Item</h2>

    <x-alert/>

    <a href="{{ route('categoria.index') }}">
        <button type="button">Lista de produtos</button>
    </a>

    <p>Categoria: {{ $categoria->categoria }}</p>

    @foreach ($categorias_count as $categoria_count)
        @if ($categoria_count->categoria == $categoria->categoria)
            <p>Foram cadastrados {{ $categoria_count->menus_count}} produtos na categoria {{ $categoria->categoria }}</p>
        @endif
    @endforeach
    

    <a href="{{ route('categoria.edit', ['categoria' => $categoria->id]) }}">
        <button>Editar</button>
    </a>

    <form action="{{ route('categoria.destroy', ['categoria' => $categoria->id]) }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Deseja excluir o item permanentemente?')">Excluir</button>
    </form>


    
@endsection