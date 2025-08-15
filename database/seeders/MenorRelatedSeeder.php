<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenorRelatedSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // Expediente Judicial
        DB::table('expediente_judicial')->insert([
            'menor_id' => 1,
            'autoridad_judicial' => 'Juzgado de Menores No. 5',
            'estado_procesal' => 'En curso',
            'fecha_inicio_proceso' => '2024-01-15',
            'carpeta_investigacion' => 'CI-2024-001',
            'observaciones_judiciales' => 'El menor está bajo seguimiento judicial por incidente menor.',
            'created_at' => $now,
            'updated_at' => $now
        ]);

        // Fugas
        DB::table('fugas')->insert([
            [
                'menor_id' => 1,
                'fecha' => '2024-02-10',
                'detalles' => 'El menor salió del hogar sin autorización.',
                'estatus' => 'Resuelto',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'menor_id' => 1,
                'fecha' => '2024-03-05',
                'detalles' => 'El menor se ausentó durante la noche.',
                'estatus' => 'Pendiente',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);

        // Progenitores
        DB::table('progenitores')->insert([
            [
                'menor_id' => 1,
                'nombre' => 'Juan',
                'apellido_paterno' => 'Pérez',
                'apellido_materno' => 'García',
                'relacion' => 'Padre',
                'estado_actual' => 'Vivo',
                'telefono' => 5512345678,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'menor_id' => 1,
                'nombre' => 'María',
                'apellido_paterno' => 'López',
                'apellido_materno' => 'Ramírez',
                'relacion' => 'Madre',
                'estado_actual' => 'Vivo',
                'telefono' => 5598765432,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);

        DB::table('atenciones')->insert([
            [
                'menor_id' => 1,
                'seguimiento_juridico' => 1, // 1 = sí, 0 = no
                'seguimiento_psicologico' => 1,
                'seguimiento_trabajo_social' => 0,
                'detalles' => 'El menor recibe seguimiento jurídico y psicológico. Trabajo social no requerido actualmente.',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'menor_id' => 1,
                'seguimiento_juridico' => 0,
                'seguimiento_psicologico' => 1,
                'seguimiento_trabajo_social' => 1,
                'detalles' => 'Seguimiento psicológico y de trabajo social en curso. Jurídico no aplicable.',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);

        DB::table('medidas_proteccion')->insert([
            [
                'menor_id' => 1,
                'detalles_medida' => 'Medida de supervisión diaria por tutor asignado.',
                'tipo_medida' => 'Supervisión',
                'plan_restitucion' => 'Reforzar hábitos de estudio y conducta.',
                'fecha' => Carbon::now()->format('Y-m-d'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'menor_id' => 1,
                'detalles_medida' => 'Asistencia a taller de habilidades sociales.',
                'tipo_medida' => 'Educativa',
                'plan_restitucion' => 'Participar en 8 sesiones semanales.',
                'fecha' => Carbon::now()->subDays(7)->format('Y-m-d'),
                'created_at' => Carbon::now()->subDays(7),
                'updated_at' => Carbon::now()->subDays(7),
            ],
        ]);

        DB::table('ubicacion_actual')->insert([
            [
            'menor_id'       => 1, // vinculado al menor con id 1
            'tipo_ubicacion' => 'Albergue',
            'nombre'         => 'Albergue Infantil San Juan',
            'parentesco'     => null,
            'estatus'        => 'Activo',
            'direccion'      => 'Calle Falsa 123, Guadalajara, Jalisco',
            'created_at'     => now(),
            'updated_at'     => now(),
            ],
            [
                'menor_id'       => 1,
                'tipo_ubicacion' => 'Familiar',
                'nombre'         => 'Familia López',
                'parentesco'     => 'Tío',
                'estatus'        => 'Temporal',
                'direccion'      => 'Av. Central 456, Guadalajara, Jalisco',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}
