@extends('layouts.admin')

@section('content')

    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Cadastrar Novo Item</h3> 
        </div>
        <!-- botao -->
        <div class="ms-md-auto py-2 py-md-0">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('categoria.index') }}" class="btn btn btn-secondary btn-sm" title="Categorias">
                    <i class="fa-solid fa-eye"></i>
                </a>
            </div>
        </div>
        <!-- botao -->
    </div>
    <!-- Cabeçalho -->

    <x-alert/>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('categoria.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Categoria</label>
                                    <input type="text" name="categoria" id="categoria" placeholder="Categoria do Produto" value="{{ old('name') }}" class="form-control">
                                </div>
                            </div>

                            <div class="row pt-4">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-secondary">Cadastrar</button>
                                    </div>
                                </div>
                            </div>                      

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection