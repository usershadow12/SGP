<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hpaciente extends Model
{
    use HasFactory;

    protected $table = 'hpacientes';
    protected $fillable = [
        'antecedente', 'historico_familiar', 'alergia', 'fk_paciente',
    ];
}
