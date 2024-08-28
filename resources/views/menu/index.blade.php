@extends('layouts.admin')

@section('content')

    
    <h1>Lista de Produtos</h1>

    <a href="{{ route('menu.create') }}">
        <button>Cadastrar Novo Produto</button>
    </a>
    <a href="{{ route('categoria.index') }}">
        <button>Categoria</button>
    </a>

    <x-alert/>

    @if($menus->isEmpty())
        <p>Nenhum produto encontrado.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Produto</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Imagem</th>
                    <th>Detalhes</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->nome }}</td>
                        <td>R$ {{ number_format($menu->preco, 2, ',', '.') }}</td>
                        <td>{{ $menu->categoria->categoria ?? 'Categoria não definida' }}</td>
                        <td>
                            @if($menu->product_file_name)
                                <div class="product-image">
                                    <img src="{{ asset('storage/' . $menu->product_file_name) }}" alt="Imagem do Produto" style="max-width: 300px;">
                                </div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('menu.show', ['menu' => $menu->id]) }}">
                                <button>Detalhes</button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}">
                                <button>Editar</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
@endsection