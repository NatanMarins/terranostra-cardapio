@extends('layouts.admin')

@section('content')

 <!-- Cabeçalho -->
 <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h2 class="fw-bold mb-3">Editar Categoria</h2>
    </div>
    <!-- botao -->
    <div class="ms-md-auto py-2 py-md-0">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('categoria.index') }}">
                <button class="btn btn-secondary btn-sm" title="Categorias"><i class="fa-solid fa-eye"></i></button>
            </a>
        </div>
    </div>
</div>
<!-- Cabeçalho -->
   
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
                <div class="row">
                    <div class="col-md-12 col-lg-12">

                        <form action="{{ route('categoria.update', ['categoria' => $categoria->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Categoria</label>
                                    <input type="text" name="categoria" id="categoria" placeholder="Nova Categoria" value="{{ old('name') }}"  class="form-control">
                                </div>
                            </div>

                            <div class="row pt-4">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" onclick="return confirm('Confirmar alterações')" class="btn btn-secondary">Editar</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection