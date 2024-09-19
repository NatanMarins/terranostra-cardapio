<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar uma empresa
        Empresa::create([
            'nome' => 'Dinerb',
            'razao_social' => 'Bruna Coutinho',
            'cnpj' => '12345678000190',
            'situacao' => 'ativa',
            'telefone' => '2140028922',
            'email' => 'contato@empresaexemplo.com',
            'cep' => '24440560',
            'numero_endereco' => '123',
            'rua' => 'Rua Exemplo',
            'bairro' => 'Bairro Exemplo',
            'cidade' => 'Cidade Exemplo',
            'estado' => 'Estado Exemplo',
            'complemento' => '',
            
        ]);

        Empresa::create([
            'nome' => 'Cântico',
            'razao_social' => 'Ronaldo Lucena',
            'cnpj' => '12345678000910',
            'situacao' => 'ativa',
            'telefone' => '21969726974',
            'email' => 'contato@empresaexemplo2.com',
            'cep' => '24440560',
            'numero_endereco' => '321',
            'rua' => 'Rua Exemplo 1',
            'bairro' => 'Bairro Exemplo 1',
            'cidade' => 'Cidade Exemplo 1',
            'estado' => 'Estado Exemplo 1',
            'complemento' => '',
            
        ]);
    }
}
