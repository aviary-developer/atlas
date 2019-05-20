<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
  protected $fillable = [
    'f_matricula','fecha','estado'
  ];

    public static function meses ($i){
        switch($i){
            case 0: return "Enero"; break;
            case 1: return "Febrero"; break;
            case 2: return "Marzo"; break;
            case 3: return "Abril"; break;
            case 4: return "Mayo"; break;
            case 5: return "Junio"; break;
            case 6: return "Julio"; break;
            case 7: return "Agosto"; break;
            case 8: return "Septiembre"; break;
            case 9: return "Octubre"; break;
            case 10: return "Noviembre"; break;
            case 11: return "Diciembre"; break;
            default: return null; break;
        }
    }
}
