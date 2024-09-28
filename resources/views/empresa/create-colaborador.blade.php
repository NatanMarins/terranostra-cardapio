@extends('layouts.admin')

@section('content')

    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Cadastrar Novo Usuário</h3> 
        </div>
        <!-- botao -->
        <div class="ms-md-auto py-2 py-md-0">
            <div class="btn-group" role="group" aria-label="Basic example">

                @can('create-usuario')
                    <a href="{{ route('empresa.colaboradores', ['empresa' => $empresa->id]) }}" class="btn btn-secondary btn-sm" title="Lista de Usuários">
                        <i class="fa-solid fa-list"></i>
                    </a>
                @endcan
            </div>
        </div>
        <!-- botao -->
    </div>
    <!-- Cabeçalho -->

    <x-alert />

    <!-- COnteudo -->
    <div class="container">
        <div class="row">
            <div class="col col-lg-12">
                <div class="card">
                    <div class="card-body">

                            <form action="{{ route('empresa.store-colaborador', ['empresa' => $empresa->id]) }}" method="POST">
                                @csrf
                                @method('POST')

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Nome</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>E-mail: </label>
                                        <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Senha: </label>
                                        <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Papel: </label>
                                        <select name="roles" id="roles" class="form-control">
                                            <option value="">Selecione</option>
                                            @forelse ($roles as $role)
                                                @if ($role != 'Super Admin')
                                                    <option {{ old('roles') == $role ? 'selected' : '' }} value="{{ $role }}">{{ $role }}</option>
                                                @else
                                                    @if (Auth::user()->hasRole('Super Admin'))
                                                        <option {{ old('roles') == $role ? 'selected' : '' }} value="{{ $role }}">{{ $role }}</option>
                                                    @endif
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="row pt-4">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-secondary">Editar</button>
                                                <button type="reset" class="btn btn-secondary">Cancelar</button>
                                            </div>
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