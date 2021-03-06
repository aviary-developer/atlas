<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturaGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura_grados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('f_grado')->unsigned();
            $table->foreign('f_grado')->references('id')->on('grados');
            $table->integer('f_asignatura')->unsigned();
            $table->foreign('f_asignatura')->references('id')->on('asignaturas');
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
        Schema::dropIfExists('asignatura_grados');
    }
}
