<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    /**Funciones por relación */
    public function docente(){
      return $this->belongsTo('App\User','f_profesor');
    }
}
