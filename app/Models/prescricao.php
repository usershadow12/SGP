<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescricao extends Model
{
    use HasFactory;

    protected $table = 'prescricoes';

    protected $fillable = [
        'data',
        'medicamento',
        'duracao',
        'descricao',
        'indicacao_especial',
        'fk_consulta',
    ];
    
}
