<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;
    protected $table = 'facturas';
    protected $fillable = [
        'data', 'tipo_pagamento', 'total', 'troco', 'consulta_id',
    ];
}
