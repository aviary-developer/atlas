<?php

namespace App\Http\Controllers;

use App\Lectivo;
use App\Grado;
use App\Asignatura;
use App\Estudiante;
use App\AsignaturaGrado;
use App\User;
use App\Matricula;
use App\Nota;
use Illuminate\Http\Request;
use DB;
use Response;

class LectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Crear las asignaturas por defecto del sistema
        Asignatura::create_asignaturas();

        $lectivos = Lectivo::orderBy('anio','desc')->get();
        $anio_activo = Lectivo::where('estado',false)->first();
        $anio_now = date('Y');
        $count_anio = Lectivo::where('anio',$anio_now)->count();
        $count_anio_next = Lectivo::where('anio',($anio_now+1))->count();
        if($anio_activo == null && $lectivos->count() > 0){
            $anio_activo = $lectivos[0];
        }else if($anio_activo == null){
            $anio_activo = null;
        }

        $docentes = User::where('estado',true)->orderBy('apellido')->get();

        return view('Lectivos.index',compact(
            'lectivos',
            'anio_activo',
            'docentes',
            'count_anio',
            'count_anio_next',
            'anio_now'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $lectivo = Lectivo::create($request->All());
            /**Agregar los grados por cada año lectivo nuevo */
            for($i = 0; $i < 12; $i++){
                $grado = new Grado;
                $grado->grado = Lectivo::nombre_grado($i);
                $grado->numero = $i;
                $grado->seccion = "A";
                $grado->f_lectivo = $lectivo->id;
                $grado->save();

                if($i > 2){
                    for($j = 0; $j < 11; $j++){
                        $asignatura = Asignatura::where('indice',$j)->first();
                        $relacion = new AsignaturaGrado();
                        $relacion->f_asignatura = $asignatura->id;
                        $relacion->f_grado = $grado->id;
                        $relacion->save();
                    }
                }
            }

            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollback();
            return -1;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lectivo  $lectivo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grado = Grado::find($id);
        $asignaturas = Asignatura::where('estado',true)->orderBy('nombre')->get();
        $estudiantes = Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')
            ->where('matriculas.f_grado',$id)
            ->orderBy('estudiantes.apellido')
            ->select('estudiantes.*','matriculas.id as id_matricula','matriculas.estado as m_estado')
            ->get();
        $docentes = User::where('estado',true)->orderBy('apellido')->get();

        //Proceso para determinar lista de estudiantes que se pueden inscribir en este grado
        //Verificar año lectivo activo
        $a_lectivo = $grado->lectivo;
        $a_lectivo_past = Lectivo::where('anio',($a_lectivo->anio - 1))->first();

        if($a_lectivo_past != null){
            //Procesos que ocurren si existe el año anterior
            $no_matricula =Estudiante::orWhereNotExists(
                    function ($query) use ($a_lectivo_past){
                        $query->select(DB::raw(1))
                        ->from('matriculas')
                        ->join('grados','matriculas.f_grado','grados.id')
                        ->where('grados.f_lectivo',$a_lectivo_past->id)
                        ->whereRaw('estudiantes.id = matriculas.f_estudiante');
                    }
                )->select('estudiantes.nombre','estudiantes.apellido','estudiantes.nie','estudiantes.id','estudiantes.sexo');

            $p_matricula = Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')
                ->join('grados','matriculas.f_grado','grados.id')
                ->where(
                    function ($query) use ($grado,$a_lectivo_past){
                        $query->where('grados.f_lectivo',$a_lectivo_past->id)
                        ->where('grados.numero',($grado->numero -1))
                        ->where('matriculas.aprobado',true);
                    }
                )->orWhere(
                    function ($query) use ($grado,$a_lectivo_past){
                        $query->where('grados.f_lectivo',$a_lectivo_past->id)
                        ->where('grados.numero',($grado->numero))
                        ->where('matriculas.aprobado',false);
                    }
                )->union($no_matricula)->select('estudiantes.nombre','estudiantes.apellido','estudiantes.nie','estudiantes.id','estudiantes.sexo')
                ->orderBy('apellido')
                ->get();
        }else{
            $p_matricula = Estudiante::orderBy('apellido')->get(['nombre','apellido','nie','id','sexo']);
        }

        return view('Lectivos.show',compact(
            'grado',
            'asignaturas',
            'docentes',
            'estudiantes',
            'p_matricula'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lectivo  $lectivo
     * @return \Illuminate\Http\Response
     */
    public function edit(lectivo $lectivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lectivo  $lectivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lectivo $lectivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lectivo  $lectivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(lectivo $lectivo)
    {
        //
    }

    public function activar(Request $request){
        $id = $request->id;
        DB::beginTransaction();
        try{
            $lectivo = Lectivo::find($id);
            if($lectivo->estado != true){
                $lectivo->estado = false;
            }else{
                $activo = Lectivo::where('estado',false)->first();
                if($activo != null){
                    $activo->estado = true;
                    $activo->save();
                }
                $lectivo->estado = false;
            }
            $lectivo->save();
            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollback();
            return -1;
        }
    }

    public function grado(Request $request){
        $id = $request->id;
        $grados = Grado::where('f_lectivo',$id)->orderBy('numero','asc')->orderBy('seccion','asc')->get();
        $docentes = [];
        foreach($grados as $k => $grado){
            if($grado->f_profesor != null){
                $docentes[$k] = $grado->docente->nombre.' '.$grado->docente->apellido;
            }else{
                $docentes[$k] = null;
            }
        }
        return (compact('grados','docentes'));
    }

    public function editar_grado(Request $request){
        $id= $request->id;
        $turno = $request->turno;
        $docente = $request->docente;
        $grado = Grado::find($id);

        DB::beginTransaction();

        try{
            $grado->turno = $turno;
            $grado->f_profesor = $docente;
            $grado->save();

            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollback();
            return -1;
        }
    }

    public function nuevo_grado(Request $request){
        $turno = $request->turno;
        $docente = $request->docente;
        $numero = $request->grado;
        $seccion = $request->seccion;
        $lectivo = $request->lectivo;

        DB::beginTransaction();

        try{
            $grado = new Grado;
            $grado->numero = $numero;
            $grado->grado = Lectivo::nombre_grado($numero);
            $grado->turno = $turno;
            $grado->f_profesor = $docente;
            $grado->f_lectivo = $lectivo;
            $grado->seccion = $seccion;
            $grado->save();

            for($j = 0; $j < 11; $j++){
                $asignatura = Asignatura::where('indice',$j)->first();
                $relacion = new AsignaturaGrado();
                $relacion->f_asignatura = $asignatura->id;
                $relacion->f_grado = $grado->id;
                $relacion->save();
            }

            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollback();
            return -1;
        }
    }

    public function buscar_seccion(Request $request){
        $valor = $request->grado;
        $anio = $request->anio;

        $grado = Grado::where('numero',$valor)->where('f_lectivo',$anio)->orderBy('seccion','desc')->first();

        return (++$grado->seccion);
    }
    public function turno(Request $request){
      $grado=Grado::where('id',$request->id)->first();
      if($grado->turno==1){
        $turno="Matutino";
      }else {
        $turno="Vespertino";
      }
      if($grado->f_profesor!=null){
      $docentes=User::where('id',$grado->f_profesor)->first();
      $docente=$docentes->nombre." ".$docentes->apellido;
    }else {
      $docente="No asignado";
    }
    return (compact('docente','turno'));
        //return Response()->json(['nombre'=>$nombreDocente,'turno'=>$turno]);
    }

    public function matricula(Request $request){
        DB::beginTransaction();
        try {
            $matricula = new Matricula;
            $matricula->f_estudiante = $request->estudiante;
            $matricula->f_grado = $request->grado;
            $matricula->save();
            DB::commit();
            return 1;
        } catch (Exception $e) {
            DB::rollback();
            return 0;
        }
    }

    public function estado_estudiante(Request $request){
        $id = $request->id;

        DB::beginTransaction();

        try {
            $matricula = Matricula::find($id);
            $matricula->estado = !$matricula->estado;
            $matricula->save();
            DB::commit();
            return 1;
        } catch (Exception $e) {
            DB::rollback();
            return 0;
        }
    }

    public function promedio_notas (Request $request){
        //Buscar todas la matriculas del año
        $matriculas = Matricula::join('grados','grados.id','matriculas.f_grado')->where('grados.f_lectivo',$request->anio)->select('matriculas.*','grados.numero')->get();
        //Calcular las notas de cada una de las matriculas
        foreach($matriculas as $e => $matricula){
            //Determinar las asignaturas cursadas por el estudiante
            $asignaturas = AsignaturaGrado::where('f_grado',$matricula->f_grado)->get();

            $ins[$e]["notas"] = 0;
            $ins[$e]["bandera"] = true;
            $promedio_final[$e] = 0;

            foreach($asignaturas as $a => $materia){
                $notas = Nota::where('f_asignatura',$materia->id)->where('f_estudiante',$matricula->id)->first();

                if($notas != null){
                    $p1 = ($notas->n1p1 * 0.35) + ($notas->n2p1 * 0.35) + ($notas->n3p1 * 0.3);
                    $p2 = ($notas->n1p2 * 0.35) + ($notas->n2p2 * 0.35) + ($notas->n3p2 * 0.3);
                    $p3 = ($notas->n1p3 * 0.35) + ($notas->n2p3 * 0.35) + ($notas->n3p3 * 0.3);
                    $pf = ($p1 + $p2 + $p3) / 3;
                }else{
                    $p1 = $p2 = $p3 = $pf = 0;
                }

                if($materia->asignatura->indice < 4 && round($pf) < 5){
                    $ins[$e]["bandera"] = false;
                }

                $ins[$e]["notas"] += round($pf);
                $promedio_final[$e] = round($ins[$e]["notas"]/count($asignaturas));
            }

            //Crear una transacción de base de datos
            DB::beginTransaction();

            try {
                $reg = Matricula::find($matricula->id);
                //Verificar si el estudiante ha superado los criterios de aprobación
                if(($promedio_final[$e] >= 5 && $ins[$e]["bandera"]) || $matricula->numero < 3){
                    //Aprueba
                    $reg->aprobado = true;
                }else{
                    //Reprueba
                    $reg->aprobado = false;
                }
                $reg->save();
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                return 0;
            }

        }
        return 1;
    }
}
