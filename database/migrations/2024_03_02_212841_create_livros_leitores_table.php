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
        Schema::create('livros_leitores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leitor_id')->constrained('leitores');
            $table->foreignId('livro_id')->constrained('livros');
            $table->string('deleted')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros_leitores');
    }
};
