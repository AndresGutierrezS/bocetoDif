<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;
    protected $table = 'atenciones';

    protected $fillable = [
        'tipo_atencion_id',
        'menor_id',
        'detalles'
    ];

    public function menor()
    {
        return $this->belongsTo(Menor::class, 'menor_id', 'id_menor');
    }
}
