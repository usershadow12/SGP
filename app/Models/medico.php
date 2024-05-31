<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medico extends Model
{
    use HasFactory;
    protected $table = 'medicos';
    protected $fillable = [
        'bi',
        'nome',
        'sobrenome',
        'sexo',
        'ordem',
        'idade',
        'contacto1',
        'contacto2',
        'morada',
        'especialidade_id',
        'user_id'
    ];
}
