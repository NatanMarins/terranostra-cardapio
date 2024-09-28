<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'empresas';

    // Colunas que podem ser cadastradas
    protected $fillable = [
        'nome',
        'razao_social',
        'cnpj',
        'situacao',
        'telefone',
        'responsavel',
        'email',
        'cep',
        'numero_endereco',
        'rua',
        'bairro',
        'cidade',
        'estado',
        'complemento',
        'logo'
    ];

    // Relacionamento com categorias
    public function categorias()
    {
        return $this->hasMany(Categoria::class);
    }

    // Relacionamento com menu
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    // Relacionamento com usuarios
    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    // Relacionamento com pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
