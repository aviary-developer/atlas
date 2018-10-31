<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
  protected $fillable = [
    'nombre','apellido','f_estudiante','dui','correo','direccion','telefono','celular','estado'
  ];
}
