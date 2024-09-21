@extends('layouts.admin')

@section('content')
    <x-alert />
    
    <h1>Alterar Senha</h1>

    <form action="{{ route('profile.update-foto') }}" method="POST">
        @csrf
        @method('PUT')

        <button type="submit" class="btn btn-primary">Confirmar Alteração</button>
    </form>
@endsection
