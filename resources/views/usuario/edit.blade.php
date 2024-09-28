@extends('layouts.admin')

@section('content')

    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Editar Usuário</h3>
        </div>
        
    </div>
    <!-- Cabeçalho -->

    <x-alert />

    <!-- COnteudo -->
    <div class="container">
        <div class="row">
            <div class="col col-lg-12">
                <div class="card">
                    <div class="card-body">

                            <form action="{{ route('usuario.update', ['usuario' => $usuario->id]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Nome</label>
                                        <input type="text" name="name" id="name" value="{{ old('name', $usuario->name) }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>E-mail</label>
                                        <input type="text" name="email" id="email" value="{{ old('email', $usuario->email) }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Perfil do Usuário</label>
                                        <select name="roles" id="roles" class="form-control">
                                            <option value="">Selecione</option>
                                            @forelse ($roles as $role)
                                                @if ($role != 'Super Admin')
                                                    <option {{ old('roles', $usuarioRoles) == $role ? 'selected' : '' }} value="{{ $role }}">
                                                        {{ $role }}</option>
                                                @else
                                                    @if (Auth::user()->hasRole('Super Admin'))
                                                        <option {{ old('roles', $usuarioRoles) == $role ? 'selected' : '' }} value="{{ $role }}">
                                                            {{ $role }}</option>
                                                    @endif
                                                @endif
                                            @empty
                                                <option value="">Nenhum papel disponível</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Situação (Ativo/Inativo) -->
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="situacao" name="situacao"
                                            {{ $usuario->situacao ? 'checked' : '' }}>
                                        <label class="form-check-label" for="situacao">Usuário Ativo</label>
                                    </div>
                                </div>

                                <div class="row pt-4">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-secondary">Editar</button>
                                            <button type="reset" class="btn btn-secondary">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                                                              
                            </form>
                       
                            <!--Inserir o COnteudo da página -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
<!-- COnteudo -->