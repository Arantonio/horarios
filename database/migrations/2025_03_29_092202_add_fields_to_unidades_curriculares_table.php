<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('unidades_curriculares', function (Blueprint $table) {
            $table->text('descricao')->nullable()->after('nome');
            $table->bigInteger('ano_curricular_id')->unsigned()->nullable()->after('descricao');
            $table->bigInteger('programa_estudo_id')->unsigned()->nullable()->after('ano_curricular_id');

            // Foreign Keys (opcional com ON DELETE SET NULL ou CASCADE)
            $table->foreign('ano_curricular_id')->references('id')->on('anos_curriculares')->onDelete('set null');
            $table->foreign('programa_estudo_id')->references('id')->on('programas_estudo')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('unidades_curriculares', function (Blueprint $table) {
            $table->dropForeign(['ano_curricular_id']);
            $table->dropForeign(['programa_estudo_id']);
            $table->dropColumn(['descricao', 'ano_curricular_id', 'programa_estudo_id']);
        });
    }
};
