<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConductasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('f_estudiante')->unsigned();
            $table->foreign('f_estudiante')->references('id')->on('matriculas');
            //Respeto a si mismo y alos demás
            $table->integer('a11')->nullable();
            $table->integer('a12')->nullable();
            $table->integer('a13')->nullable();
            //Convivencia armínica y solidaria
            $table->integer('a21')->nullable();
            $table->integer('a22')->nullable();
            $table->integer('a23')->nullable();
            //Toma de decisiones responsablemente
            $table->integer('a31')->nullable();
            $table->integer('a32')->nullable();
            $table->integer('a33')->nullable();
            //Cumplimiento de deberes y correcto ejercicio de derechos
            $table->integer('a41')->nullable();
            $table->integer('a42')->nullable();
            $table->integer('a43')->nullable();
            //Práctica valores morales y civicos
            $table->integer('a51')->nullable();
            $table->integer('a52')->nullable();
            $table->integer('a53')->nullable();
            /**
             * 0: Bueno (5 y 6)
             * 1: Muy Bueno (7 y 8)
             * 2: Excelente (9 y 10)
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
        Schema::dropIfExists('conductas');
    }
}
