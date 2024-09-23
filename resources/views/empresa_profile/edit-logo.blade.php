@extends('layouts.admin')

@section('content')
    <form action="{{ route('empresa_profile.update-logo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Exibir a foto de perfil ou uma imagem genérica -->
        <div>
            <img src="{{ $empresa->logo ? asset('storage/' . $empresa->logo) : asset('images/default-logo.png') }}"
                alt="Logo" width="150" height="150">
        </div>

        <!-- Campo para upload da foto -->
        <div class="form-group">
            <label for="logo">Alterar Logo:</label>
            <input type="file" class="form-control" name="logo" id="logo">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Logo</button>
    </form>
@endsection
