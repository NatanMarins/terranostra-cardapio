<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Adicionando coluna categoria (chave estrangeira)
        Schema::table('menu', function(Blueprint $table){
            $table->foreignId('categoria_id')->constrained('categorias')->after('preco');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu', function (Blueprint $table) {
            // Primeiro, remova a chave estrangeira
            $table->dropForeign(['categoria_id']);

            // Depois, remova a coluna
            $table->dropColumn('categoria_id');
        });
    }
};