@extends('layouts.admin')

@section('content')

    <x-alert/>


    <h1>Meu Perfil</h1>

    <div>
        <p>Nome: {{ $user->name }}</p>
        <p>E-mail: {{ $user->email }}</p>
    </div>
 
@endsection