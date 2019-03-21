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
  public static function crearDias(){
    for($i=1;$i<=5;$i++) {
        $calendarioMenu= new CalendarioMenu();
        $calendarioMenu->dia=$i;
        $calendarioMenu->save();
    }
  }
}
