<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instrutores', function (Blueprint $table) {
            $table->id('id');
            $table->string('status');
            $table->integer('motorista')->nullable();
            $table->integer('carro')->nullable();
            $table->string('inicio_percurso')->nullable();
            $table->string('final_percurso')->nullable();
            $table->string('linha')->nullable();
            $table->string('observacoes', 400)->nullable();
            $table->integer('usuario');
            $table->date('data_instrucao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrutores');
    }
};
