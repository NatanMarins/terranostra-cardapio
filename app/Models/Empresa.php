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
    protected $fillable = ['nome'];

}

