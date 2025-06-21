<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'professor_id',
        'ano_letivo_id',
        'semestre',
        'dia_semana',
        'faixa_horaria',
    ];

    public function professor()
    {
        return $this->belongsTo(Utilizador::class, 'professor_id');
    }

    public function anoLetivo()
    {
        return $this->belongsTo(AnoLetivo::class, 'ano_letivo_id');
    }

    
}
