@extends('layouts.admin')

@section('content')

    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Listar Produtos</h3>
            <!--
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home"><a href="#"> <i class="fa fa-home"></i> </a> </li>
                    <li class="separator"> <i class="fa fa-arrow-right"></i> </li>
                    <li class="nav-item"> Listar Produtos </li>

                </ul>
                -->
        </div>
        <!-- botao -->
        <div class="ms-md-auto py-2 py-md-0">
            <div class="btn-group" role="group" aria-label="Basic example">

                @can('create-cardapio')
                    <a href="{{ route('menu.create') }}" class="btn btn-secondary btn-sm" title="Cadastrar Produto">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                @endcan

            </div>
        </div>
        <!-- botao -->
    </div>
    <!-- Cabeçalho -->

    <!-- COnteudo -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- se precisar de topo no card
                                <div class="card-header">
                                    <div class="card-title">Listar Produtos</div>
                                </div>
                                se precisar de topo no card -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <!--Inserir o COnteudo da página -->
                            <x-alert />

                            @if ($menus->isEmpty())
                                <p>Nenhum produto encontrado!</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover mt-3">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Nome do Produto</th>
                                                <th scope="col">Preço de Venda</th>
                                                <th scope="col">Preço Promocional</th>
                                                <th scope="col">Categoria</th>
                                                <th scope="col">Foto</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($menus as $menu)
                                                <tr>
                                                    <td>{{ $menu->nome }}</td>
                                                    <td>R$ {{ number_format($menu->preco, 2, ',', '.') }}</td>
                                                    <td>R$ {{ number_format($menu->preco_promocional, 2, ',', '.') }}</td>
                                                    <td>{{ $menu->categoria->categoria ?? 'Categoria não definida' }}</td>
                                                    <td>
                                                        @if ($menu->product_file_name)
                                                            <div class="product-image">
                                                                <img src="{{ asset('storage/' . $menu->product_file_name) }}"
                                                                    alt="Imagem do Produto" class="avatar-img rounded"
                                                                    style="max-width: 100px;">
                                                            </div>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ route('menu.show', ['menu' => $menu->id]) }}"
                                                                class="btn btn-primary" title="Visualizar Produto"> <i
                                                                    class="fa-regular fa-eye"></i>
                                                            </a>

                                                            @can('edit-cardapio')
                                                                <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}"
                                                                    class="btn btn-info" title="Editar Produto"> <i
                                                                        class="fa-solid fa-edit"></i>
                                                                </a>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                            <!--Inserir o COnteudo da página -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
