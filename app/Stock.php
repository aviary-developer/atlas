<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $fillable = [
      'tipoMovimiento','saldo','cantidad','f_insumo','fecha'
  ];
}
