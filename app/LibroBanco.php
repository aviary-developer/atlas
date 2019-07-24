<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibroBanco extends Model
{
  protected $fillable = [
      'tipoMovimiento','saldo','cantidad','concepto','fecha','cheque'
  ];
}
