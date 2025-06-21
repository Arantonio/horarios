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
        Schema::create('utilizador_detalhes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('utilizador_id');
            $table->string('sexo', 100);
            $table->string('grau_academico', 100);
            $table->date('data_nascimento');
            $table->string('telemovel', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilizador_detalhes');
    }
};
