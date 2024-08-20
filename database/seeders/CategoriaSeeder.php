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
        Categoria::create(['categoria' => 'Pizza']);
        Categoria::create(['categoria' => 'Bebidas']);
        Categoria::create(['categoria' => 'Sobremesas']);
        Categoria::create(['categoria' => 'Vegetariano']);
        Categoria::create(['categoria' => 'Japonês']);
        Categoria::create(['categoria' => 'Carnes']);
        Categoria::create(['categoria' => 'Saladas']);
        Categoria::create(['categoria' => 'Adicionais']);
        Categoria::create(['categoria' => 'Drinks']);
        Categoria::create(['categoria' => 'Infantil']);

    }
}
