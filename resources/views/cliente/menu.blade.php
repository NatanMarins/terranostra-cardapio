@extends('layouts.externo')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Escolha um Restaurante</h2>

        <!-- Grid de restaurantes -->
        <div class="row">
            @foreach ($empresas as $empresa)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('cliente.show', $empresa->id) }}" class="text-decoration-none">
                        <div class="card shadow-sm">
                            <!-- Imagem do Restaurante (substitua por uma imagem real) -->
                            <img src="{{ $empresa->logo ? asset('storage/' . $empresa->logo) : asset('images/default-logo.png') }}"
                                alt="Foto de perfil" width="150px" height="75px" class="img-fluid">

                            <!-- Detalhes do Restaurante -->
                            <div class="card-body">
                                <h5 class="card-title">{{ $empresa->nome }}</h5>
                                <p class="card-text">{{ $empresa->nome }}</p>
                                <p class="card-text"><strong>Endereço:</strong><small>
                                    {{ $empresa->bairro . ', ' . $empresa->cidade }}</small></p>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Caso não tenha restaurantes cadastrados -->
        @if ($empresas->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                Não há restaurantes disponíveis no momento.
            </div>
        @endif
    </div>
@endsection
