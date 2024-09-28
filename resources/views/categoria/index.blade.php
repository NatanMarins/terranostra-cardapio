@extends('layouts.admin')

@section('content')

    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h2 class="fw-bold mb-3">Categorias</h2>
        </div>
        <!-- botao -->
        <div class="ms-md-auto py-2 py-md-0">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('categoria.create') }}" class="btn btn-secondary btn-sm" title="Cadastrar Nova Categoria"><i class="fa-solid fa-plus"></i> </a>
            </div>
        </div>
    </div>
    <!-- Cabeçalho -->

    <x-alert/>
    
  
    <!-- COnteudo -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- se precisar de topo no card
                    <div class="card-header">
                        <div class="card-title">Listar Produtos</div>
                    </div>
                    se precisar de topo no card -->
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Categoria</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categorias as $categoria)
                                
                                <tr>
                                    <td>
                                        <p>{{ $categoria->categoria }}</p>
                                    </td>
                                    <td style="width:200px" class="text-center">
                                        <a href="{{ route('categoria.edit', ['categoria' => $categoria->id]) }}" class="btn btn-secondary btn-sm"  title="Editar Categoria">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="{{ route('categoria.show', ['categoria' => $categoria->id]) }}" class="btn btn-secondary btn-sm"  title="Visualizar Categoria">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-warning" role="alert">
                                    <p>Nenhuma categoria encontrada</p>
                                </div>
                                
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                            

                            
                            
                       


    
@endsection