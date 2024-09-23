@extends('layouts.admin')

@section('content')
    <x-alert />

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h2 class="fw-bold mb-3">Quadro de Colaboradores</h2>
        </div>
        <!-- botao -->
        <div class="ms-md-auto py-2 py-md-0">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('empresa_profile.show') }}">
                    <button class="btn btn-primary"><i class="fa-solid fa-backward"></i></button>
                </a>
            </div>
        </div>
    </div>







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

                            @if ($colaboradores->isEmpty())
                                <p>Nenhum Colaborador encontrado!</p>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover mt-3">
                                    <thead>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Nível de Usuário</th>
                                        <th scope="col"></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($colaboradores as $colaborador)
                                            <tr>
                                                <td>
                                                    @if ($colaborador->foto_perfil)
                                                        <div class="colaborador-image">
                                                            <img src="{{ asset('storage/' . $colaborador->foto_perfil) }}"
                                                                alt="Imagem Perfil do Usuário" class="rounded-circle"
                                                                style="max-width: 70px;">
                                                        </div>
                                                    @else
                                                        <div class="colaborador-image">
                                                            <img src="{{ asset('images/default-avatar.png') }}"
                                                                alt="Imagem Perfil do Usuário" class="rounded-circle"
                                                                style="max-width: 70px;">
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $colaborador->name }}</td>
                                                <td>{{ $colaborador->email }}</td>
                                                <td></td>
                                                <td>
                                                    @can('usuario.show')
                                                        <a href="{{ route('usuario.show', ['usuario' => $colaborador->id]) }}">
                                                            <button class="btn btn-primary">Ver</button>
                                                        </a>
                                                    @endcan
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
