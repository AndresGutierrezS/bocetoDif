<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenorSeeder extends Seeder
{
    public function run()
    {
        DB::table('menores')->insert([
            [
                'expediente_id' => 1,
                'nombre' => 'Juan',
                'apellido_paterno' => 'Pérez',
                'apellido_materno' => 'López',
                'iniciales' => 'JPL',
                'fecha_nacimiento' => '2010-05-15',
                'edad' => 15,
                'curp' => 'CURPJUANPEREZ1234',
                'sexo' => 'Masculino',
                'nacionalidad' => 'Mexicana',
                'discapacidad' => 0,
                'tipo_discapacidad' => null,
                'fecha_puesta' => '2025-08-01',
                'ubicacion_actual' => 'Albergue Infantil Esperanza',
                'autoridad_ingresa' => 'DIF Estatal',
                'motivo_ingreso' => 'Situación de vulnerabilidad',
                'albergue_id' => 1,
                'observaciones' => 'Ninguna observación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
