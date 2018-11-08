<?php

namespace App\Http\Controllers;

use App\Lectivo;
use App\Grado;
use App\Asignatura;
use App\AsignaturaGrado;
use App\User;
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
        if($anio_activo == null && $lectivos->count() > 0){
            $anio_activo = $lectivos[0];
        }else if($anio_activo == null){
            $anio_activo = null;
        }

        $docentes = User::where('estado',true)->orderBy('apellido')->get();

        return view('Lectivos.index',compact(
            'lectivos',
            'anio_activo',
            'docentes'
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

        $docentes = User::where('estado',true)->orderBy('apellido')->get();

        return view('Lectivos.show',compact(
            'grado',
            'asignaturas',
            'docentes'
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
      $docente=User::where('id',$grado->f_profesor)->first();
      $nombreDocente=$docente->nombre;
    }else {
      $nombreDocente="No asignado";
    }
    return (compact('nombreDocente','turno'));
        //return Response()->json(['nombre'=>$nombreDocente,'turno'=>$turno]);
    }
}
