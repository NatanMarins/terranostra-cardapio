@extends('layouts.admin')

@section('content')

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">colaboradores</h3>
        </div>
        <!-- botao -->
        <div class="ms-md-auto py-2 py-md-0">
            <div class="btn-group" role="group" aria-label="Basic example">

                @can('create-usuario')
                    <a href="{{ route('empresa.create-colaborador', ['empresa' => $empresa->id]) }}" class="btn btn-primary" title="Cadastrar Colaborador">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                @endcan
            </div>
        </div>
        <!-- botao -->
    </div>

    <x-alert />

    @if ($colaboradores->isEmpty())
        <p>Nenhum Colaborador encontrado!</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">Foto De Perfil</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colaboradores as $colaborador)
                        <tr>
                            <td>
                                @if ($colaborador->foto_perfil)
                                    <div class="usuario-image">
                                        <img src="{{ asset('storage/' . $colaborador->foto_perfil) }}"
                                            alt="Imagem Perfil do Usuário" class="rounded-circle" style="max-width: 50px;">
                                    </div>
                                @else
                                    <div class="usuario-image">
                                        <img src="{{ asset('images/default-avatar.png') }}" alt="Imagem Perfil do Usuário"
                                            class="rounded-circle" style="max-width: 50px;">
                                    </div>
                                @endif
                            </td>
                            <td>{{ $colaborador->name }}</td>
                            <td>{{ $colaborador->email }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('usuario.show', ['usuario' => $colaborador->id]) }}"
                                        class="btn btn-primary" title="Visualizar Usuário"> <i
                                            class="fa-regular fa-eye"></i>
                                    </a>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('usuario.edit', ['usuario' => $colaborador->id]) }}"
                                        class="btn btn-info" title="Editar Usuário"> <i class="fa-solid fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
