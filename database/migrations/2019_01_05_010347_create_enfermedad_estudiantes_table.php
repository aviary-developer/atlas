<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfermedadEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermedad_estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('atencion_medica');
            $table->string('medicamentos');
            $table->date('fecha');
            $table->string('resultados')->nullable();
            $table->string('anio_vacuna')->nullable();
            $table->string('tipo_vacuna')->nullable();
            $table->string('refuerzo_vacuna')->nullable();
            $table->integer('f_estudiante')->unsigned();
            $table->foreign('f_estudiante')->references('id')->on('estudiantes');
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
        Schema::dropIfExists('enfermedad_estudiantes');
    }
}
