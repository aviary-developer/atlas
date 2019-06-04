<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lectivo;
use App\Grado;
use App\Estudiante;
use App\AsignaturaGrado;
use Auth;

class InicioController extends Controller
{
  public function __construct() {
      $this->middleware('auth');
    }

  public function inicio(Request $request) {
      $ruta = $request->grado;
      $user = Auth::user();
      $lectivo = Lectivo::where('estado',0)->first();
      $grados_a = Grado::where('f_profesor',$user->id)->where('f_lectivo',$lectivo->id)->where('estado',0)->orderBy('numero')->get();

      $asignaturas_asignadas = $lectivo->asignaturas_asignadas;
        $auxiliar = [];
        foreach($asignaturas_asignadas as $k => $asignaturas){
            $auxiliar[$k] = $asignaturas->grado;
        }
        $unico = array_unique($auxiliar);
        $unico = collect($unico);
        $grados_prev = $grados_a->concat($unico);
        $aux2 = [];
        foreach($grados_prev as $k => $grados){
            $aux2[$k] = $grados;
        }
        $grados = array_unique($aux2);
        $grados = collect($grados);
        $grados = $grados->sortBy('numero');

        //Buscar el grado actual solo si ruta no es null
        if($ruta != null){
            $ga = Grado::find($ruta);
            //Estadisticas
            $count_estudiantes_m = Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')->where('matriculas.f_grado',$ga->id)->where('estudiantes.sexo',0)->where('matriculas.estado',1)->count();
            $count_estudiantes_f = Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')->where('matriculas.f_grado',$ga->id)->where('estudiantes.sexo',1)->where('matriculas.estado',1)->count();
            $count_estudiantes_total = $count_estudiantes_f + $count_estudiantes_m;

            $count_estudiantes_m_inicial = Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')->where('matriculas.f_grado',$ga->id)->where('estudiantes.sexo',0)->count();
            $count_estudiantes_f_inicial = Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')->where('matriculas.f_grado',$ga->id)->where('estudiantes.sexo',1)->count();
            $count_estudiantes_total_inicial = $count_estudiantes_f_inicial + $count_estudiantes_m_inicial;

            $estudiantes_a = Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')->where('matriculas.f_grado',$ga->id)->orderBy('estudiantes.apellido')->select('estudiantes.nombre','estudiantes.apellido','estudiantes.nie','estudiantes.fechaNacimiento','matriculas.estado','matriculas.id as matricula','estudiantes.sexo')->get();

            if($ga->f_profesor == $user->id){
                $materias = AsignaturaGrado::join('asignaturas','asignatura_grados.f_asignatura','asignaturas.id')->where('asignatura_grados.f_grado',$ga->id)->select('asignaturas.*','asignatura_grados.id as ag_id')->orderBy('indice')->get();
            }else{
                $materias = AsignaturaGrado::join('asignaturas','asignatura_grados.f_asignatura','asignaturas.id')->where('asignatura_grados.f_grado',$ga->id)->where('asignatura_grados.f_profesor',$user->id)->select('asignaturas.*','asignatura_grados.id as ag_id')->orderBy('indice')->get();
            }
        }else{
            $ga = $estudiantes_a = $materia = null;
            $count_estudiantes_m = $count_estudiantes_f = $count_estudiantes_total = $count_estudiantes_m_inicial = $count_estudiantes_f_inicial = $count_estudiantes_total_inicial = 0;
        }


      return view('Home.base',compact(
          'user',
          'lectivo',
          'grados_a',
          'ruta',
          'grados',
          'ga',
          'count_estudiantes_m',
          'count_estudiantes_f',
          'count_estudiantes_total',
          'count_estudiantes_m_inicial',
          'count_estudiantes_f_inicial',
          'count_estudiantes_total_inicial',
          'estudiantes_a',
          'materias'
      ));
    }
}
