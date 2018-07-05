<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->text('direccion');
            $table->date('fechaNacimiento');
            $table->string('dui',10);
            $table->boolean('sexo');
            /*
            Sexo---------------------
            true: Masculino
            false: Femenino
            -------------------------
            */
            $table->enum('tipoUsuario',array('Dirección','Subdirección','Docente'));
            $table->boolean('estado')->default(true);
            /*
            Estado-------------------
            true: Activo
            false: Inactivo
            -------------------------
            */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
