<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpedienteJudicial extends Model
{
    use HasFactory;

    protected $table = 'expediente_judicial';

    protected $fillable = [
        'menor_id',
        'autoridad_judicial',
        'estado_procesal',
        'fecha_inicio_proceso',
        'carpeta_investigacion',
        'observaciones_judiciales',
    ];

    public function menor()
    {
        return $this->belongsTo(Menor::class, 'menor_id', 'id_menor');
    }
}
