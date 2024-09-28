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
    protected $fillable = ['nome', 'descricao', 'preco', 'categoria_id','product_file_name', 'preco_promocional', 'desconto_percentual', 'empresa_id'];

    protected $guarded = [];


    // Criar relacionamento

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }


    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    // Relacionamento com pedidos
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_menu')
                    ->withPivot('quantidade', 'observacoes', 'preco_total')
                    ->withTimestamps();
    }
}
