<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartidaNacimiento extends Model
{
  protected $fillable = [
  'numero','folio','tomo','libro','estado'
];
}
