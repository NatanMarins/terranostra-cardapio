@extends('layouts.admin')

@section('content')

    <x-alert/>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover mt-3">
            <thead>
                <tr>
                    <th  scope="col">Nome do Produto</th>
                    <th  scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $empresa->nome }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">

                            <form action="{{ route('empresa.destroy', ['empresa' => $empresa->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                        
                                <button type="submit" class="btn btn-danger" title="Excluir Produto" onclick="return confirm('Deseja excluir o item permanentemente?')"><i class="fa-solid fa-trash"></i></button>
                            </form>

                            <a href="{{ route('empresa.edit', ['empresa' => $empresa->id]) }}" class="btn btn-info" title="Editar Produto"> <i class="fa-solid fa-edit"></i> </a>
                        </div> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
 
@endsection