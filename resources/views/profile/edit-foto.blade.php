@extends('layouts.admin')

@section('content')
    <x-alert />
    
    <h1>Editar Foto Perfil</h1>

    <form action="{{ route('profile.update-foto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Exibir a foto de perfil ou uma imagem genérica -->
        <div>
            <img src="{{ $user->foto_perfil ? asset('storage/' . $user->foto_perfil) : asset('images/default-avatar.png') }}"
                alt="Foto de perfil" width="150" height="150">
        </div>

        <!-- Campo para upload da foto -->
        <div class="form-group">
            <label for="foto_perfil">Alterar foto de perfil:</label>
            <input type="file" class="form-control" name="foto_perfil" id="foto_perfil">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Foto</button>
    </form>
@endsection
