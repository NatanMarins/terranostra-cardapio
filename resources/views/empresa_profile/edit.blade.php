@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Editar Perfil {{ $empresa->nome }}</h2>

        <x-alert />

        <form action="{{ route('empresa_profile.update', $empresa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nome do Usuário -->
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome"
                    value="{{ old('nome', $empresa->nome) }}">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Razão Social</label>
                <input type="text" class="form-control" id="razao_social" name="razao_social"
                    value="{{ old('razao_social', $empresa->razao_social) }}">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj"
                    value="{{ old('cnpj', $empresa->cnpj) }}">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $empresa->email) }}">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone"
                    value="{{ old('telefone', $empresa->telefone) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Endereço</label>
                <div class="mb-2">
                    <label class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep"
                        value="{{ old('cep', $empresa->cep) }}">
                </div>
                <div class="mb-2">
                    <label class="form-label">UF</label>
                    <input type="text" class="form-control" id="estado" name="estado"
                        value="{{ old('estado', $empresa->estado) }}">
                </div>
                <div class="mb-2">
                    <label class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade"
                        value="{{ old('cidade', $empresa->cidade) }}">
                </div>
                <div class="mb-2">
                    <label class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro"
                        value="{{ old('bairro', $empresa->bairro) }}">
                </div>
                <div class="mb-2">
                    <label class="form-label">Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua"
                        value="{{ old('rua', $empresa->rua) }}">
                </div>
                <div class="mb-2">
                    <label class="form-label">Número</label>
                    <input type="text" class="form-control" id="numero_endereco" name="numero_endereco"
                        value="{{ old('numero_endereco', $empresa->numero_endereco) }}">
                </div>
                <div class="mb-2">
                    <label class="form-label">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento"
                        value="{{ old('complemento', $empresa->complemento) }}">
                </div>

            </div>

            <!-- Situação (Ativo/Inativo) -->
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="situacao" name="situacao"
                    {{ $empresa->situacao ? 'checked' : '' }}>
                <label class="form-check-label" for="situacao">Empresa Ativo</label>
            </div>

            <!-- Botão para Salvar -->
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
@endsection
