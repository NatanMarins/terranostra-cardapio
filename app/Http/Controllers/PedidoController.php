<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PedidoController extends Controller
{

    public function index(){

        
        return view('pedido.index');
    }

    public function store(Request $request){
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'itens' => 'required|array',
            'itens.*.id' => 'exists:menu,id',
            'itens.*.quantidade' => 'required|integer|min:1',
        ]);

        // Gera um número de pedido aleatório e único
        $numeroPedido = Str::random(10);

        // Calcula o preço final somando o preço de cada item
        $precoFinal = 0;
        foreach ($request->itens as $item) {
            $menu = Menu::find($item['id']);
            $precoFinal += $menu->preco * $item['quantidade'];
        }

        // Cria o pedido
        $pedido = Pedido::create([
            'empresa_id' => $request->empresa_id,
            'numero_pedido' => $numeroPedido,
            'situacao' => 1, // Pedido em aberto
            'preco_final' => $precoFinal,
            'observacoes' => $request->observacoes ?? null,
        ]);

        // Relaciona os itens ao pedido na tabela pivot
        foreach ($request->itens as $item) {
            $menu = Menu::find($item['id']);
            $pedido->menus()->attach($menu, [
                'quantidade' => $item['quantidade'],
                'preco_total' => $menu->preco * $item['quantidade'],
                'observacoes' => $item['observacoes'] ?? null,
            ]);
        }

        return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso!');
    }
}
