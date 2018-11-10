<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncargadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encargados', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre',40);
          $table->string('apellido',40);
          $table->integer('f_estudiante')->unsigned();
          $table->foreign('f_estudiante')->references('id')->on('estudiantes');
          $table->string('dui',10)->nullable();
          $table->string('correo')->nullable();
          $table->string('telefono')->nullable();
          $table->string('celular')->nullable();
          $table->text('direccion');
          $table->boolean('estado')->default(true);
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
        Schema::dropIfExists('encargados');
    }
}
