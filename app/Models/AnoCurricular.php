<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnoCurricular extends Model
{
    use SoftDeletes;

    protected $table = 'anos_curriculares';

    protected $fillable = [
        'nome',
        'ordem',
    ];

    /**
     * Relacionamento com unidades curriculares no plano de estudo
     */
    public function unidadesCurriculares()
    {
        return $this->hasMany(PlanoEstudoUnidadeCurricular::class, 'ano_curricular_id');
    }
}
