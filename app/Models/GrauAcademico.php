<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrauAcademico extends Model
{
    use SoftDeletes;

    protected $table = 'graus_academicos';

    protected $fillable = [
        'nome',
    ];

    /**
     * Relação: um grau académico pode ter vários programas de estudo
     */
    public function programas()
    {
        return $this->hasMany(ProgramaEstudo::class, 'grau_academico_id');
    }
}
