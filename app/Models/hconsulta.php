<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hconsulta extends Model
{
    use HasFactory;
    protected $table = 'hconsultas';
    protected $fillable = [
        'exame', 'diagnostico', 'obsevacoes', 'consulta_id',
    ];
}
