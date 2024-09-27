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
                            @if ($user->last_login_at)
                                {{ $user->last_login_at }}
                            @else
                                Nunca logado
                            @endif
                        </p>

                        <img src="{{ $user->foto_perfil ? asset('storage/' . $user->foto_perfil) : asset('images/default-avatar.png') }}"
                            alt="Foto de perfil" width="150" height="150" class="rounded-circle img-fluid">


                        <h4 class="mt-3">{{ $user->name }}</h4>

                        <p>{{ $empresa->nome }}</p>

                        @if ($user->situacao === 1)
                            <p class="text-primary"><i class="fa-solid fa-circle"></i> Ativo</p>
                        @else
                            <p class="text-danger"><i class="fa-solid fa-circle" style="color: #ff0000;"></i> Desativado</p>
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Informações do Usuário -->
                <div class="card">
                    <div class="card-header">
                        <h4>Dados Usuário</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                @forelse ($user->getRoleNames() as $role)
                                    <label for="role" class="form-label">Nível de Usuário</label>
                                    <input type="text" class="form-control" id="role" value="{{ $role }}"
                                        readonly>
                                @empty
                                    <label for="role" class="form-label">Nível de Usuário</label>
                                    <input type="text" class="form-control" id="role" value="{{ '-' }}"
                                        readonly>
                                @endforelse
                            </div>
                        </form>
                        <div class="mb-3">
                            <a href="{{ route('usuario.edit', ['usuario' => $user->id]) }}">
                                <button class="btn btn-info">Editar Perfil</button>
                            </a>
                            <a href="{{ route('usuario.edit-password', ['usuario' => $user->id]) }}">
                                <button class="btn btn-danger">Alterar Senha</button>
                            </a>

                            <form action="{{ route('usuario.destroy', ['usuario' => $user->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                        
                                <button type="submit" class="btn btn-danger" title="Excluir Produto" onclick="return confirm('Deseja excluir o item permanentemente?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
