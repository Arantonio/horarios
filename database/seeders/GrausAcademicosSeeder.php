<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrausAcademicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('graus_academicos')->insert([
            ['nome' => 'Licenciatura', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Mestrado', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Doutoramento', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
