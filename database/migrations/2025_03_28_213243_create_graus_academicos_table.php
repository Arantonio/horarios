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
        Schema::create('graus_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Ex: Licenciatura, Mestrado, Doutoramento
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('graus_academicos');
    }
};
