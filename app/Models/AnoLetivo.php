<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnoLetivo extends Model
{
    use SoftDeletes;

    protected $table = 'anos_letivos';

    protected $fillable = [
        'designacao',
        'data_inicio',
        'data_fim',
        'activo'
    ];
}

