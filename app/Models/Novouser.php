<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Novouser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "novouser";
    protected $fillable = [
        'name',
        'email',
        'password',
        'paciente',
        'medico'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
