<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'categoria';

    // Colunas que podem ser cadastradas
    protected $fillable = ['categoria'];

    public function menus(){
        return $this->hasMany(Menu::class, 'categoria_id');
    }
}