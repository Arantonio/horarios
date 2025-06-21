<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanoEstudoUnidadeCurricular extends Model
{
    use SoftDeletes;

    protected $table = 'plano_estudo_unidade_curricular';

    protected $fillable = [
        'plano_estudo_id',
        'unidade_curricular_id',
        'ano_curricular_id',
        'duracao',
        'carga_horaria',
        'ects',
    ];

    public function plano()
    { 
        return $this->belongsTo(PlanoEstudo::class, 'plano_estudo_id');
    }

    public function unidade()
    {
        return $this->belongsTo(UnidadeCurricular::class, 'unidade_curricular_id');
    }

    public function ano()
    {
        return $this->belongsTo(AnoCurricular::class, 'ano_curricular_id');
    }
}
