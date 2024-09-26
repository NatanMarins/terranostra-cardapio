@extends('layouts.admin')

@section('content')
    <x-alert />
    <div class="container mt-5">
        <h2>Editar Senha</h2>
        <form action="{{ route('profile.update-password', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nome do Usuário -->
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <!-- Botão para Salvar -->
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
@endsection
