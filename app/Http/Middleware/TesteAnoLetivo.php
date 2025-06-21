<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TesteAnoLetivo
{
    public function handle(Request $request, Closure $next)
    {
        dd('Middleware de teste carregado ✅');
    }
}
