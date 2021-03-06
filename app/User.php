<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nombre',
        'apellido',
        'fechaNacimiento',
        'sexo',
        'dui',
        'email',
        'direccion',
        'tipoUsuario',
        'turnos'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function permiso()
    {
        return $this->hasMany('App\Permiso', 'f_profesor');
    }

    public function asignaturas(){
        return $this->hasMany('App\AsignaturaGrado','f_profesor');
    }
}
