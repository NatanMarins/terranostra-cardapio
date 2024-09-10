@extends('layouts.login')

@section('content')

<h3>Recuperar Senha</h3>

<x-alert/>

<form action="{{ route('forgot-password.submit') }}" method="POST">

    @csrf

    <label for="email">E-mail</label>
    <input type="text" name="email" id="email" type="email" placeholder="E-mail de Usuário">

    <button type="submit" class="btn btn-primary">Recuperar</button>

</form>


@endsection