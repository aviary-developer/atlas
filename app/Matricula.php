<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
  protected $fillable = [
    'f_estudiante','f_grado'
  ];
}
