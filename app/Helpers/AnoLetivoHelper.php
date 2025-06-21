<?php

use App\Models\AnoLetivo;

if (!function_exists('anos_letivos')) {
    function anos_letivos()
    {
        return AnoLetivo::where('activo', true)->first();
    }
}
