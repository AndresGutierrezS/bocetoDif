<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedidasProteccion extends Model
{
    use HasFactory;
    protected $table = 'medidas_proteccion';

    protected $fillable = [
        'menor_id',
        'detalles_medida',
        'tipo_medida',
        'plan_restitucion',
        'fecha',
    ];

    public function menor()
    {
        return $this->belongsTo(Menor::class, 'menor_id');
    }

}
