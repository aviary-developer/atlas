<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteParientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_parientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('f_estudiante')->unsigned();
            $table->foreign('f_estudiante')->references('id')->on('estudiantes');
            $table->integer('f_pariente')->unsigned();
            $table->foreign('f_pariente')->references('id')->on('parientes');
            $table->string('parentesco');
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
        Schema::dropIfExists('estudiante_parientes');
    }
}
