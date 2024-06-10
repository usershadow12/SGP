<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consulta extends Model
{
    use HasFactory;
    protected $table = 'consultas';
    protected $fillable = [
        /*'tipo',
        'data_marcacao',
        'data_consulta',
        'status',*/
        'tipoconsulta_id',
        'paciente_id',
        'medico_id'
    ];
}
