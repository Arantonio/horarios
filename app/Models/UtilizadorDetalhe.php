<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilizadorDetalhe extends Model
{
    use HasFactory;

    protected $table = 'utilizador_detalhes'; // Nome correto da tabela

    protected $fillable = [
        'utilizador_id', 'sexo', 'grau_academico', 'data_nascimento',
        'telemovel', 'created_at', 'updated_at'
    ];

    public function utilizador()
    {
        return $this->belongsTo(Utilizador::class, 'utilizador_id');
    }
}

