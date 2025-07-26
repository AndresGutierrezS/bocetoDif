<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menor extends Model
{
    use HasFactory;

    protected $table = 'menores';
    protected $primaryKey = 'id_menor';
    public $incrementing = true;
    protected $keyType = 'int';

    // protected $fillable = [
    //     // 'expediente_id',
    //     'nombre',
    //     'apellido_paterno',
    //     'apellido_materno',
    //     // 'iniciales',
    //     'fecha_nacimiento',
    //     'edad',
    //     'curp',
    //     'sexo',
    //     // 'discapacidad',
    //     // 'tipo_discapacidad',
    //     // 'equipo_id',
    //     // 'fecha_puesta',
    //     // 'ubicacion actual',
    //     // 'albergue_id',
    //     // 'estatus_id',
    //     // 'observaciones',
    //     // 'created_at'
    // ];

    public function progenitores()
    {
        return $this->hasMany(Progenitor::class, 'menor_id', 'id_menor');
    }

    public function expedienteJudicial()
    {
        return $this->hasOne(ExpedienteJudicial::class, 'menor_id', 'id_menor');
    }

    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class, 'menor_id', 'id_menor');
    }

    public function medidasProteccion()
    {
        return $this->hasMany(MedidasProteccion::class, 'menor_id');
    }

    public function fugas()
    {
        return $this->hasMany(Fuga::class, 'menor_id');
    }

}
