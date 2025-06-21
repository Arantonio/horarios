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
        Schema::create('anos_curriculares', function (Blueprint $table) {
            $table->id();
            $table->string('nome');         // ← Este campo precisa existir
            $table->integer('ordem');       // ← Para definir a ordem dos anos (1, 2, 3)
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anos_curriculares');
    }
};
