<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpedienteJudicial extends Model
{
    use HasFactory;

    protected $table = 'expediente_judicial';

    // protected $fillable = [
    //     'id_menor',
    //     'estado_procesal',
    //     'archivo',
    //     'in_menor'
    // ];

    public function menor()
    {
        return $this->belongsTo(Menor::class, 'menor_id', 'id_menor');
    }
}
