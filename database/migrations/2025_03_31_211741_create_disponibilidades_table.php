<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('disponibilidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professor_id')->constrained('utilizadores')->onDelete('cascade');
            $table->enum('semestre', ['I', 'II']);
            $table->enum('dia_semana', ['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado']);
            $table->string('faixa_horaria'); // Ex: "09:20 - 10:05"
            $table->timestamps();

            $table->unique(['professor_id', 'semestre', 'dia_semana', 'faixa_horaria'], 'disponibilidade_unica');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disponibilidades');
    }
};
