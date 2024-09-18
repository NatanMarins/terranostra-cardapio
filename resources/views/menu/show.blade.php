@extends('layouts.admin')

@section('content')

    <x-alert/>

    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
        <div>
            <h3 class="fw-bold mb-3">Detalhes Produto</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home"><a href="#"> <i class="fa fa-home"></i> </a> </li>
                <li class="separator"> <i class="fa fa-arrow-right"></i> </li>
                <li class="nav-item"> Detalhes - {{ $menu->nome }} </li>

            </ul>
        </div>
        <!-- botao -->
        <div class="ms-md-auto py-2 py-md-0">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('menu.index') }}" class="btn btn-primary" title="Listar Produto">
                    <i class="fa-solid fa-list"></i>
                </a>
            </div>
        </div>
        <!-- botao -->
    </div>
    <!-- Cabeçalho -->

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover mt-3">
            <thead>
                <tr>
                    <th  scope="col">Nome do Produto</th>
                    <th  scope="col">Preço de Venda</th>
                    <th  scope="col">Preço Promocional</th>
                    <th  scope="col">Desconto Percentual</th>
                    <th scope="col">Descrição</th>
                    <th  scope="col">Categoria</th>
                    <th  scope="col">Foto</th>
                    <th  scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $menu->nome }}</td>
                    <td>R$ {{ number_format($menu->preco, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($menu->preco_promocional, 2, ',', '.') }}</td>
                    <td>{{ number_format($menu->desconto_percentual, 2, ',', '.') }}%</td>
                    <td>{{ $menu->descricao }}</td>
                    <td>{{ $categoria->categoria->categoria ?? 'Categoria não definida' }}</td>
                    <td>
                        @if($menu->product_file_name)
                            <div class="product-image">
                                <img src="{{ asset('storage/' . $menu->product_file_name) }}" alt="Imagem do Produto" class="avatar-img rounded" style="max-width: 100px;">
                            </div>
                        @endif
                    </td>
                        
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">

                            <form action="{{ route('menu.destroy', ['menu' => $menu->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                        
                                <button type="submit" class="btn btn-danger" title="Excluir Produto" onclick="return confirm('Deseja excluir o item permanentemente?')"><i class="fa-solid fa-trash"></i></button>
                            </form>

                            <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}" class="btn btn-info" title="Editar Produto"> <i class="fa-solid fa-edit"></i> </a>
                        </div> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    

@endsection