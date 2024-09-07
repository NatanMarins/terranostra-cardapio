@extends('layouts.login')

@section('content')

<h3>Login</h3>

<form>
    <label for="email">E-mail</label>
    <input type="text" name="email" id="email" type="email" placeholder="E-mail de Usuário">

    <label for="password">Senha</label>
    <input type="password" name="password" id="password" placeholder="Senha">

    <a href="#" class="small">Esqueceu a Senha?</a>
    <button type="submit" class="btn btn-primary">Entrar</button>

    <div>
        <p>Criar conta: <a href="#">Criar</a></p>
    </div>
</form>


@endsection