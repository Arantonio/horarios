<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ProfessoresSeeder extends Seeder
{
    public function run(): void
    {
        $professores = [
            ['Carlos João', 'carlos.joao@example.com'],
            ['Maria Lopes', 'maria.lopes@example.com'],
            ['João Pinto', 'joao.pinto@example.com'],
            ['Ana Silva', 'ana.silva@example.com'],
            ['Fernando Manuel', 'fernando.manuel@example.com'],
            ['Helena Dias', 'helena.dias@example.com'],
            ['Ricardo Gomes', 'ricardo.gomes@example.com'],
            ['Paula Tavares', 'paula.tavares@example.com'],
            ['André Mateus', 'andre.mateus@example.com'],
            ['Sofia Andrade', 'sofia.andrade@example.com'],
        ];

        foreach ($professores as [$nome, $email]) {
            DB::table('utilizadores')->insert([
                'departamento_id' => 1, // ajusta se necessário
                'nome' => $nome,
                'email' => $email,
                'password' => Hash::make('Aa123456'),
                'perfil' => 'professor',
                'permissions' => json_encode([]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
