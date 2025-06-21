<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministradorSeeder extends Seeder
{
    public function run(): void
    {
        $email = 'administrador@gestaohorarios.com';

        $utilizadorExistente = DB::table('utilizadores')->where('email', $email)->first();

        if ($utilizadorExistente) {
            $administradorId = $utilizadorExistente->id;
        } else {
            // Corrigido: criar departamento só se não existir
            $departamento = DB::table('departamentos')->where('nome', 'Administração')->first();

            if ($departamento) {
                $departamentoId = $departamento->id;
            } else {
                $departamentoId = DB::table('departamentos')->insertGetId([
                    'nome' => 'Administração',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Criar utilizador
            $administradorId = DB::table('utilizadores')->insertGetId([
                'departamento_id' => $departamentoId,
                'nome' => 'Administrador',
                'email' => $email,
                'email_verified_at' => now(),
                'password' => Hash::make('Aa123456'),
                'perfil' => 'administrador',
                'permissions' => json_encode(["administrador"]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Verificar se os detalhes já existem
        $detalhes = DB::table('utilizador_detalhes')->where('utilizador_id', $administradorId)->exists();

        if (!$detalhes) {
            DB::table('utilizador_detalhes')->insert([
                'utilizador_id' => $administradorId,
                'sexo' => 'Masculino',
                'grau_academico' => 'Mestre',
                'data_nascimento' => '1980-12-12',
                'telemovel' => '900000001',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
