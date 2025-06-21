<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramaEstudo extends Model
{
    use SoftDeletes;

    protected $table = 'programas_estudo';

    protected $fillable = [
        'codigo',
        'nome',
        'grau_academico_id',
    ];

    /**
     * Relação com grau académico
     */
    public function grau()
    {
        return $this->belongsTo(GrauAcademico::class, 'grau_academico_id');
    }
}
