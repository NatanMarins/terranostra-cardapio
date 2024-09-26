@extends('layouts.admin')

@section('content')

    <x-alert />

    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h2 class="fw-bold mb-3">Empresas Cadastradas</h2>
        </div>
        <!-- botao -->
        <div class="ms-md-auto py-2 py-md-0">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('empresa.create') }}">
                    <button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
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
                            @if ($empresas->isEmpty())
                                <p>Nenhuma empresa encontrado!</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover mt-3">
                                        <thead>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">E-mail</th>
                                            <th>Colaboradores</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @foreach ($empresas as $empresa)
                                                <tr>
                                                    <td>
                                                        <img src="{{ $empresa->logo ? asset('storage/' . $empresa->logo) : asset('images/default-logo.png') }}"
                                                            alt="Foto de perfil" width="70" height="70"
                                                            class="img-fluid">
                                                    </td>
                                                    <td>{{ $empresa->nome }}</td>
                                                    <td>{{ $empresa->email }}</td>
                                                    <td>
                                                        <a href="{{ route('empresa.colaboradores', $empresa->id) }}"
                                                            title="Editar">
                                                            <button class="btn btn-info"><i
                                                                    class="fa-solid fa-users"></i></button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('empresa.edit', ['empresa' => $empresa->id]) }}"
                                                            title="Editar">
                                                            <button class="btn btn-info"><i
                                                                    class="fa-solid fa-pen-to-square"></i></button>
                                                        </a>
                                                        <a href="{{ route('empresa.show', ['empresa' => $empresa->id]) }}"
                                                            title="Detalhes">
                                                            <button class="btn btn-info"><i
                                                                    class="fa-solid fa-eye"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
