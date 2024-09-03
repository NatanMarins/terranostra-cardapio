@extends('layouts.admin')

@section('content')

    <h1>Área do Usuário</h1>

    <a href="{{ route('usuario.create') }}">
        <button>Cadastrar Usuário</button>
    </a>

    <x-alert/>

    @if ($usuarios->isEmpty())
        <p>Nenhum usuário encontrado!</p>

    @else
        <p>Tem usuario</p>
    @endif


@endsection