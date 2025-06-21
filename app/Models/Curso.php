<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'programa_estudo_id',
    ];

    public function programa()
    {
        return $this->belongsTo(ProgramaEstudo::class, 'programa_estudo_id');
    }
}
