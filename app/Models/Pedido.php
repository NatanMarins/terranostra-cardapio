<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['empresa_id', 'numero_pedido', 'situacao', 'observacoes', 'preco_final', 'data_hora_pedido'];

    // Relacionamento com a empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    // Relacionamento com os itens do menu
    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'pedido_menu')
                    ->withPivot('quantidade', 'observacoes', 'preco_total')
                    ->withTimestamps();
    }
}
