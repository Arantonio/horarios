<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('turma_unidade_curricular', function (Blueprint $table) {
            $table->integer('carga_horaria_total')->nullable();
            $table->integer('blocos_semanais')->nullable();
        });
    }

    public function down()
    {
        Schema::table('turma_unidade_curricular', function (Blueprint $table) {
            $table->dropColumn('carga_horaria_total');
            $table->dropColumn('blocos_semanais');
            
        });
    }
};
