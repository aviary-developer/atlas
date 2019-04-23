<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    /**Funciones por relación */
    public function docente(){
      return $this->belongsTo('App\User','f_profesor');
    }

    public function lectivo(){
      return $this->belongsTo('App\Lectivo','f_lectivo');
    }

    public function asignaturas(){
      return $this->hasMany('App\AsignaturaGrado','f_grado');
    }
}
