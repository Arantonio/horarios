<?php

// app/Models/UnidadeCurricular.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnidadeCurricular extends Model
{
    use SoftDeletes;

    protected $table = 'unidades_curriculares';

    protected $fillable = [
        'codigo',
        'nome',
        'descricao',
        'tipo',
        'carga_horaria',
        'ects',
        'ano_curricular_id',
        'programa_estudo_id',
    ];

    public function planos()
    {
        return $this->hasMany(PlanoEstudoUnidadeCurricular::class, 'unidade_curricular_id');
    }

    public function anoCurricular()
    {
        return $this->belongsTo(\App\Models\AnoCurricular::class, 'ano_curricular_id');
    }

    public function programaEstudo()
    {
        return $this->belongsTo(\App\Models\ProgramaEstudo::class, 'programa_estudo_id');
    }

    public function turmas()
    {
        return $this->hasMany(TurmaUnidadeCurricular::class);
    }
}
