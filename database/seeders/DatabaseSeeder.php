<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Chamar o seeder do administrador
        $this->call(AdministradorSeeder::class);

        $this->call(GrausAcademicosSeeder::class);

        $this->call([
            GrausAcademicosSeeder::class,
            ProgramasEstudoSeeder::class,
        ]);

        $this->call([
            AnoCurricularSeeder::class,
        ]);

        $this->call([
            AnoLetivoSeeder::class,
        ]);

        $this->call([
            ProfessoresSeeder::class,
        ]);

    }




}
