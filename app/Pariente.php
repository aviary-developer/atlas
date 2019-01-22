<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pariente extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'sexo',
        'correo',
        'telefono_fijo',
        'telefono_celular',
        'direccion',
        'sabe_leer',
        'sabe_escribir',
        'ultimo_grado',
        'ultimo_anio',
        'fecha_nacimiento',
        'nacionalidad',
        'estado_civil',
        'ocupacion',
        'lugar_trabajo',
        'dui'
    ];
}
