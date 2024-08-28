@extends('layouts.admin')

@section('content')

    <h2>Detalhes Item</h2>

    <x-alert/>


    <a href="{{ route('categoria.index') }}">
        <button type="button">Categorias</button>
    </a>

    <h1>Detalhes da Categoria: {{ $categorias_names->categoria }}</h1>

    <p>Foram cadastrados {{ $categorias_names->menus->count() }} produtos nesta categoria.</p>

    @if($categorias_names->menus->isEmpty())
        <p>Nenhum produto cadastrado nesta categoria.</p>
    @else
        <h2>Produtos Associados:</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Produto</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias_names->menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->nome }}</td>
                        <td>{{ $menu->descricao }}</td>
                        <td>R$ {{ number_format($menu->preco, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    

    <a href="{{ route('categoria.edit', ['categoria' => $categorias_names->id]) }}">
        <button>Editar</button>
    </a>

    <form action="{{ route('categoria.destroy', ['categoria' => $categorias_names->id]) }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" onclick="return confirm('Deseja excluir o item permanentemente?')">Excluir</button>
    </form>


    
@endsection