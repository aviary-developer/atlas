<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaGrado extends Model
{
    public static function asignatura_grado($asignatura, $grado){
        $contador = AsignaturaGrado::where('f_asignatura',$asignatura)->where('f_grado',$grado)->count();
        if($contador > 0){
            return true;
        }else{
            return false;
        }
    }

    public static function id_relation($asignatura, $grado){
        $registro = AsignaturaGrado::where('f_asignatura',$asignatura)->where('f_grado',$grado)->first();
        if($registro != null){
            return $registro->id;
        }else{
            return false;
        }
    }

    public static function docente($asignatura, $grado){
        $contador = AsignaturaGrado::where('f_asignatura',$asignatura)->where('f_grado',$grado)->where('f_profesor','!=',null)->count();
        if($contador > 0){
            return true;
        }else{
            return false;
        }
    }

    public function docentes(){
      return $this->belongsTo('App\User','f_profesor');
    }
}
