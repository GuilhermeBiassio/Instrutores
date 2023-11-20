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
            $table->id('idinstrutores');
            $table->string('status');
            $table->integer('motorista');
            $table->integer('carro');
            $table->string('inicio_percurso');
            $table->string('final_percurso');
            $table->string('linha');
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
