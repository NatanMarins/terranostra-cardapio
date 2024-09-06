@extends('layouts.admin')

@section('content')

    <h1>Cadastrar Novo Usuário</h1>

    <x-alert/>

    <form action="{{ route('usuario.store') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nome: </label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">

        <label>E-mail: </label>
        <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control">

        <label>Senha: </label>
        <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control">

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <button type="reset" class="btn btn-danger">Cancel</button>

    </form>

@endsection