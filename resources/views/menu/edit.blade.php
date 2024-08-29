@extends('layouts.admin')

@section('content')


 <!-- Cabeçalho -->
 <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
    <div>
        <h3 class="fw-bold mb-3">Editar Produto</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home"><a href="#"> <i class="fa fa-home"></i> </a> </li>
            <li class="separator"> <i class="fa fa-arrow-right"></i> </li>
            <li class="nav-item"> Editar </li>

        </ul>
    </div>
    <!-- botao -->
    <div class="ms-md-auto py-2 py-md-0">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('menu.create') }}" class="btn btn-primary" title="Cadastrar Produto">
                <i class="fa-solid fa-plus"></i>
            </a>
            <a href="{{ route('menu.index') }}" class="btn btn-primary" title="Listar Produto">
                <i class="fa-solid fa-list"></i>
            </a>
        </div>
    </div>
    <!-- botao -->
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
                        <!--Inserir o COnteudo da página -->

                        <x-alert/>

                        <form action="{{ route('menu.update', ['menu' => $menu->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Nome</label>
                                    <input type="text" name="nome" id="nome" placeholder="Nome do Produto" value="{{ old('nome', $menu->nome) }}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Preço: </label>
                                    <input type="text" name="preco" id="preco" placeholder="Valor do Produto" value="{{ old('preco', $menu->preco) }}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Categoria: </label>
                                    <select id="categoria_id" name="categoria_id" class="form-select form-control">
                                        <option value="">Selecione uma Categoria</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id }}" {{ $menu->categoria_id == $categoria->id ? 'selected' : '' }}>
                                                {{ $categoria->categoria }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Descrição:</label>
                                    <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="4">{{ old('descricao', $menu->descricao) }}</textarea>
                                </div>
                            </div>   
                            
                            <label for="categoria_id">Categoria:</label>

                            <div class="row">
                                <div class="form-group col-md-12">
                                        <div class="mb-3">
                                            <label>Selecione a imagem:</label>
                                            <input type="file" name="product_file_name" id="product_file_name" class="form-control">

                                            @if ($menu->product_file_name)
                                                <img src="{{ asset("storage/{$menu->product_file_name}") }}" alt="[imagem]"  class="avatar-img rounded" style="max-width: 100px;">
                                            @endif
                                      </div>
                                </div>
                            </div>    
                            
                            <div class="card-action">
                                <button type="submit" onclick="return confirm('Confirmar Alterações')" class="btn btn-success">Editar</button>
                                <button class="btn btn-danger">Cancelar</button>
                            </div>                       
                         

                        </form>
                            
                   
                        <!--Inserir o COnteudo da página -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<!-- COnteudo -->