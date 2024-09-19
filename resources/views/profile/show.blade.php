@extends('layouts.admin')

@section('content')
    <x-alert />

    <div class="container">
        <h1>Perfil do Usuário</h1>


        <div>
            <img src="{{ asset('storage/' . $user->foto_perfil) }}"
                 alt="Foto de perfil" width="150" height="150">

                 <a href="{{ route('profile.edit-foto') }}">Alterar foto de perfil</a>
        </div>

        <p>Nome: {{ $user->name }}</p>
        <p>E-mail: {{ $user->email }}</p>
    </div>

@endsection
