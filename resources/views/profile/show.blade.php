@extends('layouts.admin')

@section('content')
    <x-alert />

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <!-- Foto de Perfil -->
                <div class="card">
                    <div class="card-body text-center">

                        <!-- Último Acesso -->
                        <p class="small">
                            Último Acesso:
                            @if (Auth::user()->last_login_at)
                                {{ Auth::user()->last_login_at }}
                            @else
                                Nunca logado
                            @endif
                        </p>

                        <img src="{{ $user->foto_perfil ? asset('storage/' . $user->foto_perfil) : asset('images/default-avatar.png') }}"
                            alt="Foto de perfil" width="150" height="150" class="rounded-circle img-fluid">


                        <h4 class="mt-3">{{ Auth::user()->name }}</h4>

                        <p>{{ $empresa->nome }}</p>

                        @if (Auth::user()->situacao === 1)
                            <p class="text-primary"><i class="fa-solid fa-circle"></i> Ativo</p>
                        @else
                            <p class="text-danger"><i class="fa-solid fa-circle" style="color: #ff0000;"></i> Desativado</p>
                        @endif

                        <!-- Botão para alterar a foto de perfil -->
                        <a href="{{ route('profile.edit-foto') }}">
                            <button type="button" class="btn btn-primary mt-3">
                                Alterar Foto de Perfil
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Informações do Usuário -->
                <div class="card">
                    <div class="card-header">
                        <h4>Minhas Informações</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Nível de Usuário</label>
                                <input type="text" class="form-control" id="role"
                                    value="{{ ucfirst(Auth::user()->role) }}" readonly>
                            </div>
                        </form>
                        <div class="mb-3">
                            <a href="{{ route('profile.edit') }}">
                                <button class="btn btn-info">Editar Perfil</button>
                            </a>
                            <a href="{{ route('empresa_profile.show') }}">
                                <button class="btn btn-info">Perfil {{ $empresa->nome }}</button>
                            </a>
                            <a href="{{ route('profile.edit-password') }}">
                                <button class="btn btn-danger">Alterar Senha</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
