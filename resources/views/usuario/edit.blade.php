@extends('layouts.admin')

@section('content')
    <h1>Editar Usuário</h1>


    <x-alert />

    <form action="{{ route('usuario.update', ['usuario' => $usuario->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome: </label>
        <input type="text" name="name" id="name" value="{{ old('name', $usuario->name) }}" class="form-control">

        <label>E-mail: </label>
        <input type="text" name="email" id="email" value="{{ old('email', $usuario->email) }}" class="form-control">

        <label>Papel: </label>
        <select name="roles" id="roles" class="form-select">
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

        <!-- Situação (Ativo/Inativo) -->
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="situacao" name="situacao"
                {{ $usuario->situacao ? 'checked' : '' }}>
            <label class="form-check-label" for="situacao">Usuário Ativo</label>
        </div>

        <button type="submit" class="btn btn-success">Editar</button>
        <button type="reset" class="btn btn-danger">Cancel</button>

    </form>
@endsection
