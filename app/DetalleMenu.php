<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleMenu extends Model
{
  protected $fillable = [
    'f_menu','cantidad','f_insumo'
  ];
}
