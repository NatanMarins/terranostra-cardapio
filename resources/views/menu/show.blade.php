@extends('layouts.admin')

@section('content')

    <x-alert/>

    <h2>Detalhes Item</h2>

    <a href="{{ route('menu.index') }}">
        <button>Produtos</button>
    </a>
    

    <p>Nome: {{ $menu->nome }}</p>
    <p>Preço: {{ $menu->preco }}</p>
    <p>Categoria: {{ $categoria->categoria->categoria }}</p>
    <p>Descrição: {{ $menu->descricao }}</p>

    @if($menu->product_file_name)
        <div class="product-image">
            <img src="{{ asset('storage/' . $menu->product_file_name) }}" alt="Imagem do Produto" style="max-width: 300px;">
        </div>
    @endif


    <form action="{{ route('menu.destroy', ['menu' => $menu->id]) }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Deseja excluir o item permanentemente?')">Excluir</button>
    </form>

    <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}">
        <button>Editar</button>
    </a>

    
@endsection