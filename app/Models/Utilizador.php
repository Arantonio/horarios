<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Utilizador extends Authenticable
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'utilizadores'; // Definir a tabela correta

    protected $fillable = [
        'departamento_id',
        'nome',
        'email',
        'email_verificado_em',
        'password',
        'perfil',
        'permissions',
        'created_at',
        'updated_at'
    ];

    public function detalhes()
    {
        return $this->hasOne(UtilizadorDetalhe::class, 'utilizador_id');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function turmasRegidas()
    {
        return $this->hasMany(TurmaUnidadeCurricular::class, 'professor_regente_id');
    }
}
