<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
  protected $fillable = [
    'f_matricula','fecha','estado'
  ];
}
