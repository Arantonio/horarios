<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnoCurricular;

class AnoCurricularSeeder extends Seeder
{
    public function run()
    {
        $anos = [
            ['nome' => '1º Ano', 'ordem' => 1],
            ['nome' => '2º Ano', 'ordem' => 2],
            ['nome' => '3º Ano', 'ordem' => 3],
            ['nome' => '4º Ano', 'ordem' => 2],
            ['nome' => '5º Ano', 'ordem' => 3],
        ];

        foreach ($anos as $ano) {
            AnoCurricular::create($ano); 
        }
    }
}
