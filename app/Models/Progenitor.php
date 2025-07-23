<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progenitor extends Model
{
    use HasFactory;

    protected $table = 'progenitores';

    protected $fillable = [
        'menor_id',
        'nombre',
        'apellido_paterno',
        'apellido_materno'
    ];

    public function menor() 
    {
        return $this->belongsTo(Menor::class, 'menor_id');
    }
}
