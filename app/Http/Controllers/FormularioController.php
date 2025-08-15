<?php

namespace App\Http\Controllers;

use App\Models\Menor;
use Illuminate\Http\Request;
use App\Models\ExpedienteJudicial;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Seguimiento;
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
            'expediente_id' => ['required'],
            'nombre' => ['required', 'max:40', 'string'],
            'apellido_paterno' => ['required', 'max:30', 'string'],
            'apellido_materno' => ['max:30', 'string', 'required'],
            'fecha_nacimiento' => ['required', 'date'],
            'edad'  => ['required', 'numeric'],
            'curp'  => ['required'],
            'sexo'  => ['required'],
            // 'discapacidad' => ['required'],
            // 'tipo_discapacidad' => ['required'],
            // 'equipo_id' => ['required'],
            // 'fecha_puesta' => ['required'],
            // 'ubicacion actual',
            // 'albergue_id' => ['required'],
            // 'estatus_id' => ['required'],
            // 'observaciones',
            // 'created_at'
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
        
        //todo: $menor->nacionalidad = $request->nacionalidad;
        
        // Datos de ingreso

        $menor->fecha_puesta = $request->fecha_ingreso;
        $menor->ubicacion_actual = $request->albergue;
        //todo: $menor->autoridad = $request->autoridad;
        //todo: $menor->motivo_ingreso = $request->motivo_ingreso;


        $menor->iniciales = strtoupper(
            substr($request->nombre, 0, 1) .
            substr($request->apellido_paterno, 0, 1) .
            substr($request->apellido_materno, 0, 1)
        );

        $menor->expediente_id = 1;
        $menor->discapacidad = 1;
        $menor->equipo_id = 1;
        $menor->albergue_id = 1;
        $menor->estatus_id = 1;

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
                    
                    //todo: 'parentesco' => $relaciones[$index] ?? null,
                    //todo: 'estado' => $estados[$index] ?? null,
                    //todo: 'telefono' => $telefonos[$index] ?? null,
                ]);
            }
        }

        // dd($menor->id_menor);
        //expediente judicial
        
        $expediete_judicial = new ExpedienteJudicial();
        
        // ExpedienteJudicial::create([
        $expediete_judicial->menor_id = $menor->id_menor;
        $expediete_judicial->autoridad_judicial = $request->autoridad_judicial;
        $expediete_judicial->estado_procesal = $request->estado_procesal;
        $expediete_judicial->fecha_inicio_proceso = $request->fecha_inicio_proceso;
        $expediete_judicial->carpeta_investigacion = $request->carpeta_investigacion;
        $expediete_judicial->observaciones_judiciales = $request->observaciones_judiciales;
        // ]);
        $expediete_judicial->save();

        // DB::commit();


        // seguimiento
        if ( $request->has('medida_tipo')) {
            $tipos = (array) $request->medida_tipo;
            $fechas = (array) $request->medida_fecha;
            $estados = (array) $request->medida_estado;
            // dd($tipos);
            $plan_restitucion = '';
            if ( $request->juridico === 'Si' ) {
                $plan_restitucion .= 'seguimiento juridico';
            } elseif ( $request->psicologico === 'Si' ) {
                $plan_restitucion .= 'seguimiento psicologico';
            } elseif ( $request->social === 'Si' ) {
                $plan_restitucion .= 'seguimiento social';
            }
            

            foreach ($tipos as $index => $tipo) {
                $menor->medidasProteccion()->create([
                // 'tipo_atencion_id' => $tipo_atencion_id,
                // 'detalles' => $tipos[$index] ?? '',
                // 'fecha' => $fechas[$index] ?? '',
                // 'estadp' => $estados[$index] ?? '',
                    'detalles_medida' => $estados[$index],
                    'tipo_medida' => $tipos[$index],
                    'plan_restitucion' => $plan_restitucion,
                    'fecha' => $fechas[$index],
                ]);
            }
        }


        //fugas
        if ($request->has('fuga_fecha')) {
            $fechas = ( array ) $request->fuga_fecha;
            $descripciones = ( array ) $request->fuga_descripcion;
            $estatus = ( array ) $request->fuga_estatus;

            foreach ($fechas as $index => $fecha) {
                $menor->fugas()->create([
                    'fecha' => $fecha ?? null,
                    'detalles'=> $descripciones[$index] ?? null,
                    //todo: 'estatus' => $estatus[$index];
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

    public function show(Menor $menor)
    {
        return view('visualizar', [
            'menor' => $menor
        ]);
    }
}
