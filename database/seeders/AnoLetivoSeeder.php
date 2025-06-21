<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnoLetivo;

class AnoLetivoSeeder extends Seeder
{
    public function run(): void
    {
        AnoLetivo::create([
            'designacao' => '2024-2025',
            'data_inicio' => '2024-09-01',
            'data_fim' => '2025-07-31',
            'activo' => true,
        ]);
    }
}
