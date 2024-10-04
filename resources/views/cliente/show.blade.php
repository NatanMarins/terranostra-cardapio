@extends('layouts.externo')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">{{ $empresa->nome }}</h2>

        <!-- Barra de categorias -->
        <nav class="nav nav-pills mb-4">
            @foreach ($categorias as $categoria_id => $produtos)
                <a class="nav-link" href="#categoria-{{ $categoria_id }}">{{ $produtos->first()->categoria->categoria }}</a>
            @endforeach
        </nav>

        <!-- Listagem de produtos por categoria -->
        @foreach ($categorias as $categoria_id => $produtos)
            <div class="mb-5">
                <h4 id="categoria-{{ $categoria_id }}" class="mb-3">{{ $produtos->first()->categoria->categoria }}</h4>
                <div class="row">
                    @foreach ($produtos as $produto)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if ($produto->product_file_name)
                                    <div class="product-image">
                                        <img src="{{ asset('storage/' . $produto->product_file_name) }}"
                                            alt="Imagem do Produto" class="avatar-img rounded" style="max-width: 100px;">
                                    </div>
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $produto->nome }}</h5>
                                    <p class="card-text">{{ $produto->descricao }}</p>
                                    <p class="card-text"><strong>Preço:</strong> R$
                                        {{ number_format($produto->preco, 2, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
