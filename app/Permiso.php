<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable = [
        'fecha_inicio',
        'fecha_final',
        'catergoria',
        'horas',
        'f_profesor',
        'f_lectivo'
    ];

    protected $dates = [
        'fecha_inicio',
        'fecha_final'
    ];
}
