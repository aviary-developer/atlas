<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grado');
            $table->string('seccion');
            $table->boolean('turno')->default(true);
            /**Turno:
             * 1: Matutino
             * 0: Vespertino
             */
            $table->integer('f_profesor')->unsigned()->nullable();
            $table->foreign('f_profesor')->references('id')->on('users');
            $table->integer('f_lectivo')->unsigned();
            $table->foreign('f_lectivo')->references('id')->on('lectivos');
            $table->boolean('estado')->default(false);
            /**Estado
             * 0: Inactivo
             * 1: Activo
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
        Schema::dropIfExists('grados');
    }
}
