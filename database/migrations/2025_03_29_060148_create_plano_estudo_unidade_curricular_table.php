<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('plano_estudo_unidade_curricular', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plano_estudo_id')->constrained('planos_estudo')->onDelete('cascade');
            $table->foreignId('unidade_curricular_id')->constrained('unidades_curriculares')->onDelete('cascade');
            $table->foreignId('ano_curricular_id')->constrained('anos_curriculares')->onDelete('cascade');

            $table->string('duracao')->nullable();          // Ex: 1, 2, A
            $table->integer('carga_horaria')->nullable();   // Total de horas
            $table->integer('ects')->nullable();            // Créditos

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plano_estudo_unidade_curricular');
    }
};
