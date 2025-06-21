<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('planos_estudo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programa_estudo_id')->constrained('programas_estudo')->onDelete('cascade');
            $table->string('ano_inicio');
            $table->string('ano_fim')->nullable();
            $table->integer('numero')->nullable(); // número da versão do plano
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('planos_estudo');
    }
};
