<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoconsulta extends Model
{
    use HasFactory;
    protected $table = 'tipoconsultas';
    protected $fillable = ['nome', 'valor'];
}

