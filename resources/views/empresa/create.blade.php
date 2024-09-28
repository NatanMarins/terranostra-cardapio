@extends('layouts.admin')

@section('content')
    <!-- Cabeçalho -->
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Cadastro</h3>
        </div>
        <!-- botao -->
        <div class="ms-md-auto py-2 py-md-0">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('empresa.index') }}" class="btn btn btn-secondary btn-sm" title="Listar Empresas">
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

                            <form action="{{ route('empresa.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Dados da Empresa</h5><hr />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Nome da Empresa</label>
                                        <input type="text" name="nome" id="nome" placeholder="Nome da Empresa" value="{{ old('name') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Razão Social</label>
                                        <input type="text" name="razao_social" id="razao_social" placeholder="Razão Social" value="{{ old('name') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>CNPJ</label>
                                        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{ old('name') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>E-mail</label>
                                        <input type="text" name="email" id="email" placeholder="E-mail" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Endereço</h5><hr />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>CEP</label>
                                        <input type="text" name="cep" id="cep" placeholder="CEP" value="{{ old('name') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>UF</label>
                                        <input type="text" name="estado" id="estado" placeholder="UF" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Cidade</label>
                                        <input type="text" name="cidade" id="cidade" placeholder="Cidade" value="{{ old('name') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Bairro</label>
                                        <input type="text" name="bairro" id="bairro" placeholder="Bairro" value="{{ old('name') }}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Rua</label>
                                        <input type="text" name="rua" id="rua" placeholder="Nome da Rua" value="{{ old('name') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Número</label>
                                        <input type="text" name="numero_endereco" id="numero_endereco" placeholder="Número" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Complemento</label>
                                        <textarea name="complemento" id="complemento" cols="30" rows="10" class="form-control">{{ old('name') }}</textarea>
                                    </div>
                                </div>
                               

                                <div class="row pt-4">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-secondary">Cadastrar</button>
                                            <button type="reset" class="btn btn-secondary">Cancelar</button>
                                        </div>
                                    </div>
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

