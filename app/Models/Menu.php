<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Invoca o nome da tabela
    protected $table = 'menu';

    // Colunas que podem ser cadastradas
    protected $fillable = ['nome', 'descricao', 'preco', 'product_file_name'];
}
