@extends('layouts.admin')

@section('content')

    <h1>Empresas Cadastradas</h1>

    <a href="{{ route('empresa.create') }}">
        <button>Cadastrar Empresa</button>
    </a>

    <x-alert/>

    @if ($empresas->isEmpty())
        <p>Nenhuma empresa encontrado!</p>

    @else

        <table>

            <thead>
                <th>Nome da Empresa:</th>
                <th></th>
            </thead>
            
            <tbody>

                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->nome }}</td>
                        <td>
                            <a href="{{ route('empresa.edit', ['empresa' => $empresa->id]) }}">
                                <button>Editar</button>
                            </a>
                            <a href="{{ route('empresa.show', ['empresa' => $empresa->id]) }}">
                                <button>Detalhes</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        
        <a href="{{ route('empresa_profile.show') }}">Perfil</a>


            
        

    @endif


@endsection