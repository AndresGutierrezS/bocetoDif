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

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'edad',
        'curp',
        'sexo',
        'nacionalidad',
        'fecha_puesta',
        'ubicacion_actual',
        'autoridad_ingresa',
        'motivo_ingreso',
        'iniciales',
    ];

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
        return $this->hasOne(Seguimiento::class, 'menor_id', 'id_menor');
    }

    public function medidasProteccion()
    {
        return $this->hasMany(MedidasProteccion::class, 'menor_id');
    }

    public function fugas()
    {
        return $this->hasMany(Fuga::class, 'menor_id');
    }

    // public function albergue()
    // {
    //     return $this->hasOne(Albergue::class, 'menor_id');
    // }
    
    public function ubicacionActual()
   {
        return $this->hasOne(UbicacionActual::class, 'menor_id');
   } 
    
}
