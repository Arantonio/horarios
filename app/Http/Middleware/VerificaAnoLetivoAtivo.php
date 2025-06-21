<?php

// Caminho: app/Http/Middleware/VerificaAnoLetivoAtivo.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AnoLetivo;

class VerificaAnoLetivoAtivo
{
    public function handle(Request $request, Closure $next)
    {
        $anoAtivo = \App\Models\AnoLetivo::where('activo', true)->first();

        if (!$anoAtivo) {
            return redirect()->route('anos-letivos.index')
                ->with('error', 'Não existe um ano letivo ativo.');
        }

        // Atualiza sempre a sessão com o ID do ano letivo ativo
        session(['ano_letivo_ativo_id' => $anoAtivo->id]);

        return $next($request);
    }
}
