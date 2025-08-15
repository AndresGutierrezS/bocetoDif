<?php

namespace App\Http\Controllers;

use App\Models\Menor;
use Illuminate\Http\Request;
use App\Models\ExpedienteJudicial;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Seguimiento;
use App\Models\UbicacionActual;
use Illuminate\Support\Facades\Date;

class FormularioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('formulario');
    }

    public function store(Request $request)
    {

        // DB::beginTransaction();

        // try {

        $request->validate([
            // 1. Menor
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|integer|min:0|max:18',
            'curp' => 'required|string|max:18',
            'sexo' => 'required',
            'nacionalidad' => 'nullable|string|max:255',
            'fecha_ingreso' => 'required|date',
            'albergue' => 'required|string|max:255',
            'autoridad' => 'required|string|max:255',
            'motivo_ingreso' => 'nullable|string',

            // 2. Progenitores (arrays)
            'progenitor_nombre.*' => 'nullable|string|max:255',
            'progenitor_apellido_paterno.*' => 'nullable|string|max:255',
            'progenitor_apellido_materno.*' => 'nullable|string|max:255',
            'progenitor_relacion.*' => 'nullable|string|max:255',
            'progenitor_estado.*' => 'nullable|string|max:255',
            'progenitor_telefono.*' => 'nullable|string|max:20',

            // 3. Expediente judicial
            'autoridad_judicial' => 'nullable|string|max:255',
            'estado_procesal' => 'nullable|string|max:255',
            'fecha_inicio_proceso' => 'nullable|date',
            'carpeta_investigacion' => 'nullable|string|max:255',
            'observaciones_judiciales' => 'nullable|string',

            // 4. Seguimiento
            'juridico' => 'required',
            'psicologico' => 'required',
            'social' => 'required',

            // 5. Medidas de protección
            'medida_tipo.*' => 'nullable|string|max:255',
            'medida_estado.*' => 'nullable|string|max:255',
            'medida_fecha.*' => 'nullable|date',

            // 6. Ubicación actual
            'ubicacion_tipo' => 'nullable|string|max:255',
            'ubicacion_nombre' => 'nullable|string|max:255',
            'ubicacion_parentesco' => 'nullable|string|max:255',
            'ubicacion_estatus' => 'nullable|string|max:255',
            'ubicacion_direccion' => 'nullable|string',

            // 7. Fugas
            'fuga_fecha.*' => 'nullable|date',
            'fuga_descripcion.*' => 'nullable|string',
            'fuga_estatus.*' => 'nullable|string|max:255', 
        ]);

        $menor = new Menor();

        // Datos Personales del Menor
        $menor->nombre = $request->nombre;
        $menor->apellido_paterno = $request->apellido_paterno;
        $menor->apellido_materno = $request->apellido_materno;
        $menor->fecha_nacimiento = $request->fecha_nacimiento;
        $menor->edad = $request->edad;
        $menor->curp = $request->curp;
        $menor->sexo = $request->sexo;
        $menor->nacionalidad = $request->nacionalidad;
        
        // Datos de ingreso

        $menor->fecha_puesta = $request->fecha_ingreso;
        $menor->ubicacion_actual = $request->albergue;
        $menor->autoridad_ingresa = $request->autoridad;
        $menor->motivo_ingreso = $request->motivo_ingreso;


        $menor->iniciales = strtoupper(
            substr($request->nombre, 0, 1) .
            substr($request->apellido_paterno, 0, 1) .
            substr($request->apellido_materno, 0, 1)
        );

        $menor->expediente_id = 1;
        $menor->discapacidad = 0;
        // $menor->equipo_id = 1;
        $menor->albergue_id = 1;
        // $menor->estatus_id = 1;
        
        $menor->save();


        // Progenitores
        if ($request->has('progenitor_nombre')) {
            $nombres = (array) $request->progenitor_nombre;
            $apellidosP = (array) $request->progenitor_apellido_paterno;
            $apellidosM = (array) $request->progenitor_apellido_materno;
            $relaciones = (array) $request->progenitor_relacion;
            $estados = (array) $request->progenitor_estado;
            $telefonos = (array) $request->progenitor_telefono;

            foreach ($nombres as $index => $nombre) {
                $menor->progenitores()->create([
                    'nombre' => $nombre,
                    'apellido_paterno' => $apellidosP[$index] ?? null,
                    'apellido_materno' => $apellidosM[$index] ?? null,            
                    'relacion' => $relaciones[$index] ?? null,
                    'estado_actual' => $estados[$index] ?? null,
                    'telefono' => $telefonos[$index] ?? null,
                ]);
            }
        }

        // dd($menor->id_menor);
        //expediente judicial
        
        $expediente_judicial = new ExpedienteJudicial();
        
        // ExpedienteJudicial::create([
        $expediente_judicial->menor_id = $menor->id_menor;
        $expediente_judicial->autoridad_judicial = $request->autoridad_judicial;
        $expediente_judicial->estado_procesal = $request->estado_procesal;
        $expediente_judicial->fecha_inicio_proceso = $request->fecha_inicio_proceso;
        $expediente_judicial->carpeta_investigacion = $request->carpeta_investigacion;
        $expediente_judicial->observaciones_judiciales = $request->observaciones_judiciales;
        // ]);
        $expediente_judicial->save();

        // DB::commit();

        // seguimiento
        $menor->seguimientos()->create([
                'menor_id' => $menor->id_menor,
                'seguimiento_juridico' => $request->juridico,
                'seguimiento_psicologico' => $request->psicologico,
                'seguimiento_trabajo_social' => $request->social,
            ]);

        // atenciones
        if ( $request->has('medida_tipo')) {
            $tipos = (array) $request->medida_tipo;
            $fechas = (array) $request->medida_fecha;
            $estados = (array) $request->medida_estado;
            // dd($tipos);
            
            
            // $plan_restitucion = '';
            // if ( $request->juridico === 'Si' ) {
            //     $plan_restitucion .= 'seguimiento juridico';
            // } elseif ( $request->psicologico === 'Si' ) {
            //     $plan_restitucion .= 'seguimiento psicologico';
            // } elseif ( $request->social === 'Si' ) {
            //     $plan_restitucion .= 'seguimiento social';
            // }
            

            foreach ($tipos as $index => $tipo) {
                $menor->medidasProteccion()->create([
                // 'tipo_atencion_id' => $tipo_atencion_id,
                // 'detalles' => $tipos[$index] ?? '',
                // 'fecha' => $fechas[$index] ?? '',
                // 'estadp' => $estados[$index] ?? '',
                    'detalles_medida' => $estados[$index],
                    'tipo_medida' => $tipos[$index],
                    // 'plan_restitucion' => $plan_restitucion,
                    'fecha' => $fechas[$index],
                ]);
            }
        }

        //ubicacion actual
        $ubicacion_actual = new UbicacionActual();
        $ubicacion_actual->menor_id = $menor->id_menor;
        $ubicacion_actual->tipo_ubicacion = $request->ubicacion_tipo;
        $ubicacion_actual->nombre = $request->ubicacion_nombre;
        $ubicacion_actual->parentesco = $request->ubicacion_parentesco;
        $ubicacion_actual->estatus = $request->ubicacion_estatus;
        $ubicacion_actual->direccion = $request->ubicacion_direccion;
        $ubicacion_actual->save();



        //fugas
        if ($request->has('fuga_fecha')) {
            $fechas = ( array ) $request->fuga_fecha;
            $descripciones = ( array ) $request->fuga_descripcion;
            $estatus = ( array ) $request->fuga_estatus;

            foreach ($fechas as $index => $fecha) {
                $menor->fugas()->create([
                    'fecha' => $fecha ?? null,
                    'detalles'=> $descripciones[$index] ?? null,
                    'estatus' => $estatus[$index] ?? 'No localizado',
                ]);
            }
        }
        





        return redirect()->route('inicio');

        // } catch (\Exception $e) {
        // DB::rollBack(); 
        // dd($e->getMessage());
        // return back()->withErrors(['error' => 'Hubo un error al guardar los datos: ' . $e->getMessage()]);
    // }
    }

    public function edit(Menor $menor)
    {
        return view('editar_menor', [
            'menor' => $menor
        ]);
    }

    public function update(Request $request, Menor $menor)
    {
        $request->validate([
            // 1. Menor
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|integer|min:0',
            'curp' => 'required|string|max:18',
            'sexo' => 'required',
            'nacionalidad' => 'nullable|string|max:255',
            'fecha_ingreso' => 'required|date',
            'albergue' => 'required|string|max:255',
            'autoridad' => 'required|string|max:255',
            'motivo_ingreso' => 'nullable|string',

            // 2. Progenitores (arrays)
            'progenitor_nombre.*' => 'nullable|string|max:255',
            'progenitor_apellido_paterno.*' => 'nullable|string|max:255',
            'progenitor_apellido_materno.*' => 'nullable|string|max:255',
            'progenitor_relacion.*' => 'nullable|string|max:255',
            'progenitor_estado.*' => 'nullable|string|max:255',
            'progenitor_telefono.*' => 'nullable|string|max:20',

            // 3. Expediente judicial
            'autoridad_judicial' => 'required|string|max:255',
            'estado_procesal' => 'required|string|max:255',
            'fecha_inicio_proceso' => 'required|date',
            'carpeta_investigacion' => 'required|string|max:255',
            'observaciones_judiciales' => 'nullable|string',

            // 4. Seguimiento
            'juridico' => 'required',
            'psicologico' => 'required',
            'social' => 'required',

            // 5. Medidas de protección
            'medida_tipo.*' => 'nullable|string|max:255',
            'medida_estado.*' => 'nullable|string|max:255',
            'medida_fecha.*' => 'nullable|date',

            // 6. Ubicación actual
            'ubicacion_tipo' => 'nullable|string|max:255',
            'ubicacion_nombre' => 'nullable|string|max:255',
            'ubicacion_parentesco' => 'nullable|string|max:255',
            'ubicacion_estatus' => 'nullable|string|max:255',
            'ubicacion_direccion' => 'nullable|string',

            // 7. Fugas
            'fuga_fecha.*' => 'nullable|date',
            'fuga_descripcion.*' => 'nullable|string',
            'fuga_estatus.*' => 'nullable|string|max:255', 
        ]);


        // 1. Actualizar tabla `menores`
        $menor->update([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'edad' => $request->edad,
            'curp' => $request->curp,
            'sexo' => $request->sexo,
            'nacionalidad' => $request->nacionalidad,
            'fecha_puesta' => $request->fecha_ingreso,
            'ubicacion_actual' => $request->albergue,
            'autoridad_ingresa' => $request->autoridad,
            'motivo_ingreso' => $request->motivo_ingreso,
            'iniciales' => strtoupper(
                substr($request->nombre, 0, 1) .
                substr($request->apellido_paterno, 0, 1) .
                substr($request->apellido_materno, 0, 1)
            ),
        ]);

        // 2. Progenitores
        foreach ((array)$request->progenitor_id as $i => $id) {
            $data = [
                'nombre' => $request->progenitor_nombre[$i],
                'apellido_paterno' => $request->progenitor_apellido_paterno[$i] ?? null,
                'apellido_materno' => $request->progenitor_apellido_materno[$i] ?? null,
                'relacion' => $request->progenitor_relacion[$i] ?? null,
                'estado_actual' => $request->progenitor_estado[$i] ?? 'No localizado',
                'telefono' => $request->progenitor_telefono[$i] ?? null,
            ];

            $menor->progenitores()->find($id)->update($data);
        }
        
        // $progenitor_ids = [];
        // if ($request->has('progenitor_nombre')) {
        //     foreach ((array) $request->progenitor_nombre as $i => $nombre) {
        //         $id = $request->progenitor_id[$i] ?? null;
        //         $data = [
        //             'nombre' => $nombre,
        //             'apellido_paterno' => $request->progenitor_apellido_paterno[$i] ?? null,
        //             'apellido_materno' => $request->progenitor_apellido_materno[$i] ?? null,
        //             'relacion' => $request->progenitor_relacion[$i] ?? null,
        //             'estado_actual' => $request->progenitor_estado[$i] ?? 'No localizado',
        //             'telefono' => $request->progenitor_telefono[$i] ?? null,
        //         ];

        //         if ($id) {
        //             $progenitor = $menor->progenitores()->find($id);
        //             if ($progenitor) {
        //                 $progenitor->update($data);
        //             } else {
        //                 $progenitor = $menor->progenitores()->create($data);
        //             }
        //         } else {
        //             $progenitor = $menor->progenitores()->create($data);
        //         }

        //         $progenitor_ids[] = $progenitor->id_progenitor;
        //     }

        //     // Eliminar los progenitores que no están en el formulario
        //     $menor->progenitores()->whereNotIn('id_progenitor', $progenitor_ids)->delete();
        // }

        // 3. Expediente judicial
        $menor->expedienteJudicial()->updateOrCreate(
            ['menor_id' => $menor->id_menor],
            [
                'autoridad_judicial' => $request->autoridad_judicial,
                'estado_procesal' => $request->estado_procesal,
                'fecha_inicio_proceso' => $request->fecha_inicio_proceso,
                'carpeta_investigacion' => $request->carpeta_investigacion,
                'observaciones_judiciales' => $request->observaciones_judiciales,
            ]
        );

        // 4. Seguimiento
        $menor->seguimientos()->updateOrCreate(
            ['menor_id' => $menor->id_menor],
            [
                'seguimiento_juridico' => $request->juridico,
                'seguimiento_psicologico' => $request->psicologico,
                'seguimiento_trabajo_social' => $request->social,
            ]
        );

        // 5. Medidas de protección
        foreach ((array)$request->medida_id as $i => $id) {
            $data = [
                'detalles_medida' => $request->medida_estado[$i] ?? null,
                'tipo_medida' => $request->medida_tipo[$i] ?? null,
                'fecha' => $request->medida_fecha[$i] ?? null,
            ];

            $menor->medidasProteccion()->find($id)->update($data);
        }

        // $medida_ids = [];
        //     if ($request->has('medida_tipo')) {
        //         foreach ((array) $request->medida_tipo as $i => $tipo) {
        //             $id = $request->medida_id[$i] ?? null;
        //             $data = [
        //                 'detalles_medida' => $request->medida_estado[$i] ?? null,
        //                 'tipo_medida' => $tipo,
        //                 'fecha' => $request->medida_fecha[$i] ?? null,
        //             ];

        //             if ($id) {
        //                 $medida = $menor->medidasProteccion()->find($id);
        //                 if ($medida) {
        //                     $medida->update($data);
        //                 } else {
        //                     $medida = $menor->medidasProteccion()->create($data);
        //                 }
        //             } else {
        //                 $medida = $menor->medidasProteccion()->create($data);
        //             }

        //             $medida_ids[] = $medida->id_medida;
        //         }

        //         $menor->medidasProteccion()->whereNotIn('id_medida', $medida_ids)->delete();
        //     }

        // 6. Ubicación actual
        $menor->ubicacionActual()->updateOrCreate(
            ['menor_id' => $menor->id_menor],
            [
                'tipo_ubicacion' => $request->ubicacion_tipo,
                'nombre' => $request->ubicacion_nombre,
                'parentesco' => $request->ubicacion_parentesco,
                'estatus' => $request->ubicacion_estatus,
                'direccion' => $request->ubicacion_direccion,
            ]
        );

        // 7. Fugas
        foreach ((array)$request->fuga_id as $i => $id) {
            $data = [
                'fecha' => $request->fuga_fecha[$i] ?? null,
                'detalles' => $request->fuga_descripcion[$i] ?? null,
                'estatus' => $request->fuga_estatus[$i] ?? 'Localizado',
            ];

            $menor->fugas()->find($id)->update($data);
        }
        // $fuga_ids = [];
        //     if ($request->has('fuga_fecha')) {
        //         foreach ((array) $request->fuga_fecha as $i => $fecha) {
        //             $id = $request->fuga_id[$i] ?? null;
        //             $data = [
        //                 'fecha' => $fecha ?? null,
        //                 'detalles' => $request->fuga_descripcion[$i] ?? null,
        //                 'estatus' => $request->fuga_estatus[$i] ?? 'Localizado',
        //             ];

        //             if ($id) {
        //                 $fuga = $menor->fugas()->find($id);
        //                 if ($fuga) {
        //                     $fuga->update($data);
        //                 } else {
        //                     $fuga = $menor->fugas()->create($data);
        //                 }
        //             } else {
        //                 $fuga = $menor->fugas()->create($data);
        //             }

        //             $fuga_ids[] = $fuga->id_fuga;
        //         }

        //         $menor->fugas()->whereNotIn('id_fuga', $fuga_ids)->delete();
        //     }

        return redirect()->route('inicio')->with('mensaje', 'Menor actualizado correctamente');
    }

    public function show(Menor $menor)
    {
        return view('visualizar', [
            'menor' => $menor
        ]);
    }

    public function destroy(Menor $menor)
    {
        try {

            // Progenitores
            $menor->progenitores()->delete();

            // Expediente judicial
            $menor->expedienteJudicial()->delete();

            // Seguimientos
            $menor->seguimientos()->delete();

            // Medidas de protección
            $menor->medidasProteccion()->delete();

            // Ubicación actual
            $menor->ubicacionActual()->delete();

            // Fugas
            $menor->fugas()->delete();


            $menor->delete();

            return redirect()->route('inicio')->with('mensaje', 'Menor eliminado correctamente');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al eliminar el menor: ' . $e->getMessage()]);
        }
    }
}
