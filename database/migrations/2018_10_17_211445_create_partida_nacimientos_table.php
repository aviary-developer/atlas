<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidaNacimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partida_nacimientos', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('numero');
          $table->integer('folio');
          $table->integer('tomo');
          $table->integer('libro');
          $table->integer('f_estudiante')->unsigned();
          $table->foreign('f_estudiante')->references('id')->on('estudiantes');
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
        Schema::dropIfExists('partida_nacimientos');
    }
}
