<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleTransaccion extends Model
{
  protected $fillable = [
    'f_transaccion','cantidad','f_insumo'
  ];
  public function insumo(){
    return $this->belongsTo('App\Insumo','f_insumo');
  }
}
