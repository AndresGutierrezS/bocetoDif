<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UbicacionActual extends Model
{
    use HasFactory;
    protected $table = 'ubicacion_actual';

    protected $fillable = [
        'menor_id',
        'tipo_ubicacion',
        'nombre',
        'parentesco',
        'estatus',
        'direccion',
    ];

    public function menor()
    {
        return $this->belongsTo(Menor::class, 'menor_id');
    }

}
