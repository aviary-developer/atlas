<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarioMenu extends Model
{
  protected $fillable = [
    'dia','f_menu'
  ];

  public function menu()
  {
      return $this->belongsTo('App\Menu', 'f_menu');
  }
}
