@extends('layouts.admin')

@section('content')


    <h1>Usuários</h1>

    <x-alert />


    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Papel</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        @forelse ($usuario->getRoleNames() as $role)
                            {{ $role }}
                        @empty
                            {{ '-' }}
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <form action="{{ route('usuario.destroy', ['usuario' => $usuario->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                
                        <button type="submit" class="btn btn-danger" title="Excluir Produto" onclick="return confirm('Deseja excluir o item permanentemente?')"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
