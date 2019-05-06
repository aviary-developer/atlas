<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grado;
use App\Lectivo;
use App\Matricula;
use App\Asistencia;
use DB;
use Auth;

class AsistenciaController extends Controller
{
  public function index()
  {
    $lectivo = Lectivo::where('estado',0)->first();
    $grados= Grado::where('f_profesor',Auth::user()->id)->where('f_lectivo',$lectivo->id)->get();
    foreach ($grados as $key => $grado) {
      $matriculadosEnGrados= Matricula::where('f_grado',$grado->id)->count();
      $matriculados[$key]=$matriculadosEnGrados;
    }
    return view('Asistencia.index',compact(
        'grados',
        'lectivo',
        'matriculados'
    ));
  }
  public function guardarAsistencia(Request $request)
  {
    DB::beginTransaction();
    try{
      foreach ($request->idMatricula as $key => $matricula) {
        $asistencia= new Asistencia;
        $asistencia->f_matricula=$request->idMatricula[$key];
        $asistencia->fecha=$request->fechaAsistencia;
        $asistencia->estado=$request->selectAsistencia[$key];
        $asistencia->save();
      }

      DB::commit();
    }catch(Exception $e){
        DB::rollback();
    }
    return redirect('/asistencia')->with('msg', '¡Guardado!');
  }
  public function verEstudiantes(Request $request)
  {
    $estudiantes= DB::table('estudiantes')
            ->join('matriculas', 'estudiantes.id', '=', 'matriculas.f_estudiante')
            ->join('asistencias', 'matriculas.id', '=', 'asistencias.f_matricula')
            ->where('matriculas.f_grado',$request->grado)
            ->where('asistencias.fecha',$request->fecha)
            ->where('matriculas.estado',true)
            ->select('matriculas.id','estudiantes.nombre','estudiantes.apellido','asistencias.estado')
            ->orderBy('estudiantes.apellido', 'ASC')
            ->get();
            if(count($estudiantes)==0){
              $estudiantes= DB::table('estudiantes')
                      ->join('matriculas', 'estudiantes.id', '=', 'matriculas.f_estudiante')
                      ->where('matriculas.f_grado',$request->grado)
                      ->where('matriculas.estado',true)
                      ->select('matriculas.id','estudiantes.nombre','estudiantes.apellido')
                      ->orderBy('estudiantes.apellido', 'ASC')
                      ->get();
            }
    return response()->json($estudiantes);
  }

    public function grafica_estudiante(Request $request){
        $id = $request->id;
        $anio = $request->anio;

        if($id != null){
            //Asistio
            $asistencia[0] = Asistencia::where('f_matricula',$id)->where('estado',1)->whereYear('fecha',$anio)->count();
            //No asistio sin permiso
            $asistencia[1] = Asistencia::where('f_matricula',$id)->where('estado',0)->whereYear('fecha',$anio)->count();
            //No asistio con permiso
            $asistencia[2] = Asistencia::where('f_matricula',$id)->where('estado',2)->whereYear('fecha',$anio)->count();
        }else{
            $asistencia[0] = $asistencia[1] = $asistencia[2] = 0;
        }

        $label[0] = "Asitío";
        $label[1] = "Falta sin permiso";
        $label[2] = "Falta con permiso";

        $color[0] = "#E74C3C";
        $color[1] = "#8E44AD";
        $color[2] = "#3498DB";

        return (compact('asistencia','label','color'));
    }
}
