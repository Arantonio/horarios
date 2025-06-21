<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'codigo',
        'nome',
        'ano_letivo_id',
        'curso_id',
        'programa_estudo_id',
        'periodo', // manhã, tarde, noite
        'ano_letivo_id',
        

    ];

    public function anoLetivo()
    {
        return $this->belongsTo(AnoLetivo::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function programaEstudo()
    {
        return $this->belongsTo(ProgramaEstudo::class);
    }
    public function unidadesCurriculares()
    {
        return $this->hasMany(TurmaUnidadeCurricular::class);
    }
}
