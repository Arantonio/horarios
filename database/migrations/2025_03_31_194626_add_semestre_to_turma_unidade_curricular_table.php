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
        Schema::table('turma_unidade_curricular', function (Blueprint $table) {
            $table->enum('semestre', ['I', 'II'])->nullable()->after('unidade_curricular_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('turma_unidade_curricular', function (Blueprint $table) {
            //
        });
    }
};
