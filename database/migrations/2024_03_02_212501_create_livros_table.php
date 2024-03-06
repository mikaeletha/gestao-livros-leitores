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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('genero');
            $table->string('autor');
            $table->string('ano');
            $table->string('paginas');
            $table->string('idioma');
            $table->string('edicao');
            $table->string('editora_nome');
            $table->string('editora_codigo');
            $table->string('editora_telefone');
            $table->string('isbn');
            $table->string('deleted')->default('0');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
