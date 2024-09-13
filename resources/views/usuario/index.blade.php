@extends('layouts.admin')

@section('content')

    <h1>Usuários</h1>

    <x-alert />

    @if ($usuarios->isEmpty())
        <p>Nenhum produto encontrado!</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('usuario.show', ['usuario' => $usuario->id]) }}"
                                        class="btn btn-primary" title="Visualizar Usuário"> <i
                                            class="fa-regular fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('usuario.edit', ['usuario' => $usuario->id]) }}"
                                        class="btn btn-info" title="Editar Usuário"> <i
                                            class="fa-solid fa-edit"></i>
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
