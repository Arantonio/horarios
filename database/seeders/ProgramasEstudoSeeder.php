<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramasEstudoSeeder extends Seeder
{
    public function run(): void
    {
        $programas = [
            [
                'codigo' => 'PS1',
                'nome' => 'Enfermagem',
                'grau_academico_id' => 1,
            ],
            [
                'codigo' => 'PS2',
                'nome' => 'Fisioterapia',
                'grau_academico_id' => 1,
            ],
            [
                'codigo' => 'PS3',
                'nome' => 'Gestão e Contabilidade',
                'grau_academico_id' => 2,
            ],
        ];

        foreach ($programas as $programa) {
            DB::table('programas_estudo')->updateOrInsert(
                ['codigo' => $programa['codigo']],
                [
                    'nome' => $programa['nome'],
                    'grau_academico_id' => $programa['grau_academico_id'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}
