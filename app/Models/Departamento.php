<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos'; // Nome correto da tabela

    protected $fillable = [
        'nome', 'created_at', 'updated_at'
    ];

    public function utilizadores()
    {
        return $this->hasMany(Utilizador::class, 'departamento_id');
    }
}
