<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Asignatura extends Model
{
    public static function nombre_asignaturas($i){
        switch($i){
            case 0: return "Lenguaje"; break;
            case 1: return "Matemáticas"; break;
            case 2: return "Ciencia, Salud y Medio Ambiente"; break;
            case 3: return "Estudios Sociales"; break;
            case 4: return "Inglés"; break;
            case 5: return "Educación Física"; break;
            case 6: return "Moral, Urbanistica y Cívica"; break;
            case 7: return "Informática"; break;
            case 8: return "Educación Artística"; break;
            case 9: return "Ortografía"; break;
            case 10: return "Caligrafía"; break;
            case 11: return "Música"; break;
            default: return null; break;
        }
    }

    public static function create_asignaturas(){
        DB::beginTransaction();

        try{
            for($i=0; $i < 12; $i++){
                $existe = Asignatura::where('indice',$i)->count();
                if($existe == 0){
                    $asignatura = new Asignatura;
                    $asignatura->nombre = Asignatura::nombre_asignaturas($i);
                    $asignatura->indice = $i;
                    if($i<11){
                        $asignatura->bloqueo = true;
                    }
                    $asignatura->save();
                }
            }
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }
    }

    public static function abrev($i){
        switch($i){
            case 0: return "LENG"; break;
            case 1: return "MATE"; break;
            case 2: return "CSMA"; break;
            case 3: return "EESS"; break;
            case 4: return "INGL"; break;
            case 5: return "EFIS"; break;
            case 6: return "MUYC"; break;
            case 7: return "INFO"; break;
            case 8: return "EART"; break;
            case 9: return "ORTG"; break;
            case 10: return "CALG"; break;
            case 11: return "MUSI"; break;
            default:
            {
                $asignatura = Asignatura::where($i)->first();
                return strtoupper(substr($asignatura->nombre,0,4));
            }
        }
    }
}
