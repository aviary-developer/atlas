<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',60);
            $table->integer('indice')->default(-1);
            $table->boolean('estado')->default(true);
            $table->boolean('bloqueo')->default(false);
            /**Bloqueo
             * 0: Se podrá borrar
             * 1: Propiedad bloqueada - No se podrá borrar
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
        Schema::dropIfExists('asignaturas');
    }
}
