<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consulta extends Model
{
    use HasFactory;
    protected $table = 'consultas';
    protected $fillable = [
        'tipo', 'custo', 'data_marcacao', 'data-consulta', 'fk_paciente', 'fk_medico'
    ];
}
