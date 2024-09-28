@extends('layouts.admin')

@section('content')

    <x-alert />

    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Usuários</h3>
        </div>
        <!-- botao -->
        <div class="ms-md-auto py-2 py-md-0">
            <div class="btn-group" role="group" aria-label="Basic example">
                @can('create-usuario')
                    <a href="{{ route('usuario.create') }}" class="btn btn-secondary btn-sm" title="Cadastrar Colaborador">
                        <i class="fa-solid fa-edit"></i>
                    </a>
                @endcan
            </div>
        </div>
        <!-- botao -->
    </div>
    <!-- Cabeçalho -->

    @if ($usuarios->isEmpty())
        <div class="alert alert-warning" role="alert">
            <p>Nenhum produto encontrado!</p>
        </div>
    @else


    <!-- COnteudo -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- se precisar de topo no card
                    <div class="card-header">
                        <div class="card-title">Listar Produtos</div>
                    </div>
                    se precisar de topo no card -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <!--Inserir o COnteudo da página -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover mt-3">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Foto De Perfil</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td style="width:200px" class="text-center">
                                                    @if ($usuario->foto_perfil)
                                                        <div class="usuario-image">
                                                            <img src="{{ asset('storage/' . $usuario->foto_perfil) }}"
                                                                alt="Imagem Perfil do Usuário" class="rounded-circle"
                                                                style="max-width: 50px;">
                                                        </div>
                                                    @else
                                                        <div class="usuario-image">
                                                            <img src="{{ asset('images/default-avatar.png') }}"
                                                                alt="Imagem Perfil do Usuário" class="rounded-circle"
                                                                style="max-width: 50px;">
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $usuario->name }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td style="width:200px" class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ route('usuario.show', ['usuario' => $usuario->id]) }}"
                                                            class="btn btn-secondary btn-sm" title="Visualizar Usuário"> <i
                                                                class="fa-regular fa-eye"></i>
                                                        </a>
                                                    </div>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ route('usuario.edit', ['usuario' => $usuario->id]) }}"
                                                            class="btn btn-secondary btn-sm" title="Editar Usuário"> <i
                                                                class="fa-solid fa-edit"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        <!--Inserir o COnteudo da página -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
<!-- COnteudo -->





@endsection
