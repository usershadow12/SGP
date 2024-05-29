<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    use HasFactory;
    protected $table = 'pacientes';
    protected $fillable = [
        'bi', 'nome', 'sobrenome', 'sexo', 'peso',
        'idade', 'contacto1', 'contacto2', 'morada'];
}
