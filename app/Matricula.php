<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
  protected $fillable = [
    'f_estudiante','f_grado'
  ];
  public function grado(){
    return $this->belongsTo('App\Grado','f_grado');
  }
  public function estudianteMatriculado(){
    return $this->belongsTo('App\Estudiante','f_estudiante');
  }
}
