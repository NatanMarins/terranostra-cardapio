@extends('layouts.admin')

@section('content')
    <x-alert />

    <h1>Perfil {{ $empresa->nome }}</h1>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <!-- Foto de Perfil -->
                <div class="card">
                    <div class="card-body text-center">

                        <img src="{{ $empresa->logo ? asset('storage/' . $empresa->logo) : asset('images/default-logo.png') }}"
                            alt="Foto de perfil" width="150" height="150" class="rounded-circle img-fluid">


                        <h4 class="mt-3">{{ $empresa->nome }}</h4>

                        <p>{{ $empresa->nome }}</p>

                        @if ($empresa->situacao === 1)
                            <p class="text-primary"><i class="fa-solid fa-circle"></i> Ativo</p>
                        @else
                            <p class="text-danger"><i class="fa-solid fa-circle" style="color: #ff0000;"></i> Desativado</p>
                        @endif

                        <!-- Botão para alterar a foto de perfil -->
                        <a href="{{ route('profile.edit-foto') }}">
                            <button type="button" class="btn btn-primary mt-3">
                                Alterar Logo
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Informações do Usuário -->
                <div class="card">
                    <div class="card-header">
                        <h4>Informações {{ $empresa->nome }}</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" value="{{ $empresa->nome }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Razão Social</label>
                                <input type="email" class="form-control" id="email"
                                    value="{{ $empresa->razao_social }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">CNPJ</label>
                                <input type="email" class="form-control" id="email" value="{{ $empresa->cnpj }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">E-mail</label>
                                <input type="text" class="form-control" id="role" value="{{ $empresa->email }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">telefone</label>
                                <input type="text" class="form-control" id="role" value="{{ $empresa->telefone }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Colaboradores</label>
                                <input type="email" class="form-control" id="email"
                                    value="{{ $colaboradores->usuarios->count() }}" readonly>
                            </div>
                        </form>
                        <div class="mb-3">
                            <a href="{{ route('profile.edit') }}">
                                <button class="btn btn-info">Editar Perfil</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
