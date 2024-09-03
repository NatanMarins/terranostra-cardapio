@extends('layouts.admin')

@section('content')

    <h2>Editar Empresa</h2>

    <a href="{{ route('empresa.index') }}">
        <button type="button">Empresas</button>
    </a>

    <form action="{{ route('empresa.update', ['empresa' => $empresa->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Empresa: </label>
        <input type="text" name="nome" id="nome" placeholder="Nova nome" value="{{ old('name') }}">

        <button type="submit" onclick="return confirm('Confirmar alterações')">Confirmar Alteraçoes</button>
    </form>
    
@endsection
