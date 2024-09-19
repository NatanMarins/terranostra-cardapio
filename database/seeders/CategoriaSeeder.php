<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'categoria' => 'Pizza',
            'empresa_id' => '1',
        ]);

        Categoria::create([
            'categoria' => 'Bebidas',
            'empresa_id' => '1',
        ]);

        Categoria::create([
            'categoria' => 'Sobremesas',
            'empresa_id' => '1',
        ]);

        Categoria::create([
            'categoria' => 'Vegetariano',
            'empresa_id' => '1',
        ]);
       
        Categoria::create([
            'categoria' => 'Japonês',
            'empresa_id' => '2',
        ]);

        Categoria::create([
            'categoria' => 'Carnes',
            'empresa_id' => '2',
        ]);

        Categoria::create([
            'categoria' => 'Saladas',
            'empresa_id' => '2',
        ]);

        Categoria::create([
            'categoria' => 'Adicionais',
            'empresa_id' => '2',
        ]);
    }
}
