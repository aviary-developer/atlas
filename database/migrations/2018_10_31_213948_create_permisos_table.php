<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->integer('categoria')->unsigned();
            $table->integer('horas')->unsigned();
            $table->integer('f_profesor')->unsigned();
            $table->foreign('f_profesor')->references('id')->on('users');
            $table->integer('f_lectivo')->unsigned();
            $table->foreign('f_lectivo')->references('id')->on('lectivos');
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
        Schema::dropIfExists('permisos');
    }
}
