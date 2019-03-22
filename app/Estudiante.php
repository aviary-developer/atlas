<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
      'nombre',
      'apellido',
      'nie',
      'dui',
      'sexo',
      'fechaNacimiento',
      'lugarNacimiento',
      'direccion',
      'zonaResidencia',
      'centroEscolarProcedente',
      'parvularia',
      'nacionalidad',
      'pais',
      'condicionExtranjeria',
      'correo',
      'seguroFamiliar',
      'estadoCivil',
      'educacionCurricular',
      'estado'.
      'talla_inicial',
      'talla_medio',
      'talla_final',
      'peso_inicial',
      'peso_medio',
      'peso_final',
      'tipo_educacion_curricular',
      'tipoVivienda',
      'estadoCasa',
      'pagoVivienda',
      'personasEnVivienda',
      'internet',
      'ingresoFamiliar',
      'beca',
      'bonoEscolar',
      'transporte',
      'prioridadComedor',
      'otro_tipo_ayuda',
      'trabaja',
      'tipo',
      'lugar',
      'jornadaLaboral'
    ];

    protected $dates = ['fechaNacimiento'];
}
