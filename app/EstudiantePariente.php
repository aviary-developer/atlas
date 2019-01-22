<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstudiantePariente extends Model
{
    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante', 'f_estudiante');
    }


    public function pariente()
    {
        return $this->belongsTo('App\Pariente', 'f_pariente');
    }

}
