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
        Schema::table('disponibilidades', function (Blueprint $table) {
            $table->unsignedBigInteger('ano_letivo_id')->nullable()->after('professor_id');

            $table->foreign('ano_letivo_id')
                ->references('id')->on('anos_letivos')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('disponibilidades', function (Blueprint $table) {
            //
        });
    }
};
