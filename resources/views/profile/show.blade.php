@extends('layouts.admin')

@section('content')
    <x-alert />


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <!-- Foto de Perfil -->
                <div class="card">
                    <div class="card-body text-center">

                        <img src="{{ $user->foto_perfil ? asset('storage/' . $user->foto_perfil) : asset('images/default-avatar.png') }}"
                            alt="Foto de perfil" width="150" height="150" class="rounded-circle img-fluid">


                        <h4 class="mt-3">{{ Auth::user()->name }}</h4>

                        @if (Auth::user()->situacao === 'ativo')
                            <p class="text-primary">{{ Auth::user()->situacao }}</p>
                        @else
                            <p class="text-danger">{{ Auth::user()->situacao }}</p>
                            
                        @endif


                        <!-- Último Acesso -->
                        <p class="text-muted">
                            Último Acesso:
                            @if (Auth::user()->last_login_at)
                                {{ Auth::user()->last_login_at }}
                            @else
                                Nunca logado
                            @endif
                        </p>

                        <!-- Botão para alterar a foto de perfil -->
                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                            data-bs-target="#editProfileModal">
                            Alterar Foto de Perfil
                        </button>
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
                                <label for="role" class="form-label">Papel</label>
                                <input type="text" class="form-control" id="role"
                                    value="{{ ucfirst(Auth::user()->role) }}" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
