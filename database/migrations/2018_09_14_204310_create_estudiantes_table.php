<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->string('nie')->nullable();
            $table->string('dui',10)->nullable();
            $table->boolean('sexo');
            /*Sexo
            true: Masculino
            false: Femenino*/
            $table->date('fechaNacimiento');
            $table->string('lugarNacimiento');
            $table->text('direccion');
            $table->boolean('zonaResidencia');
            /*Sexo
            true: Urbana
            false: Rural*/
            $table->string('centroEscolarProcedente')->nullable();
            $table->boolean('parvularia')->nullable();
            $table->boolean('libretaNotas')->nullable();
            $table->boolean('certificado')->nullable();
            $table->string('nacionalidad');
            $table->string('pais');
            $table->string('condicionExtranjeria')->nullable();
            $table->string('correo')->nullable();
            $table->boolean('seguroFamiliar');
            $table->string('estadoCivil');
            $table->string('educacionCurricular');
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
        Schema::dropIfExists('estudiantes');
    }
}
