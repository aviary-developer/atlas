<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Lectivo extends Model
{
    protected $fillable = ['anio'];

    /**Funcion para imprimir el nombre del grado dependiendo del entero ingresado */
    public static function nombre_grado($i){
        switch($i){
            case 0: return "Parvularia 4"; break;
            case 1: return "Parvularia 5"; break;
            case 2: return "Parvularia 6"; break;
            case 3: return "Primero"; break;
            case 4: return "Segundo"; break;
            case 5: return "Tercero"; break;
            case 6: return "Cuarto"; break;
            case 7: return "Quinto"; break;
            case 8: return "Sexto"; break;
            case 9: return "Septimo"; break;
            case 10: return "Octavo"; break;
            case 11: return "Noveno"; break;
            default: return null; break;
        }
    }
    /**Funciones por relacion */
    public function grados(){
      return $this->hasMany('App\Grado','f_lectivo')->orderBy('numero')->orderBy('seccion');
    }

    public static function activo(){
        $lectivo = Lectivo::where('estado',false)->first();
        return $lectivo->id;
    }

    public function asignaturas_asignadas(){
        return $this->hasManyThrough('App\AsignaturaGrado', 'App\Grado','f_lectivo','f_grado')->where('asignatura_grados.f_profesor',Auth::user()->id);
    }

    public function asignaturas_asignadas_grados(){
        return $this->hasManyThrough('App\AsignaturaGrado', 'App\Grado','f_lectivo','f_grado')->where('asignatura_grados.f_profesor',Auth::user()->id);
    }

    public static function procedencia($anio, $estudiante){
        //Revisar si fue inscrito
        $registro = Matricula::join('grados','grados.id','matriculas.f_grado')->where('matriculas.f_estudiante',$estudiante)->where('grados.f_lectivo',$anio)->count();
        if($registro == 0){
            return 2;
        }else{
            $estado = Matricula::join('grados', 'grados.id', 'matriculas.f_grado')->where('matriculas.f_estudiante', $estudiante)->where('matriculas.aprobado',1)->where('grados.f_lectivo', $anio)->count();
            if($estado == 1){
                return 1;
            }else{
                return 0;
            }
        }
    }
}
