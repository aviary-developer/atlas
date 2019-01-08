<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfermedadFamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermedad_familias', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('asma')->default('0');
            $table->boolean('drogas')->default('0');
            $table->boolean('diabetes')->default('0');
            $table->boolean('tabaco')->default('0');
            $table->boolean('presion_alta')->default('0');
            $table->boolean('alcohol')->default('0');
            $table->boolean('renales')->default('0');
            $table->string('otros')->nullable();
            $table->integer('pariente');
            /**
             * Pariente:
             * 0 - Madre
             * 1 - Padre
             * 2 - Hermanos
             * 3 - Tios
             * 4 - Abuelos
             * 5 - Otros
             */
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
        Schema::dropIfExists('enfermedad_familias');
    }
}
