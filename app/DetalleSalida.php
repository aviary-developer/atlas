<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleSalida extends Model
{
  protected $fillable = [
    'f_salida','cantidad','f_insumo'
  ];
  public function insumo(){
    return $this->belongsTo('App\Insumo','f_insumo');
  }
}
