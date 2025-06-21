<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TurmaUnidadeCurricular extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'turma_unidade_curricular';

    protected $fillable = [
        'turma_id',
        'unidade_curricular_id',
        'professor_regente_id',
        'outros_professores',
        'semestre',
        'blocos_semanais',
    ];

    protected $casts = [
        'outros_professores' => 'array',
    ];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function unidadeCurricular()
    {
        return $this->belongsTo(UnidadeCurricular::class);
    }

    public function professorRegente()
    {
        return $this->belongsTo(Utilizador::class, 'professor_regente_id');
    }
}
