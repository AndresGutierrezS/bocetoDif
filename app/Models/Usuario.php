<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre_usuario',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}



