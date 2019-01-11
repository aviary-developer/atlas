<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->boolean('sexo');
            $table->string('correo')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->text('direccion');
            $table->boolean('encargado')->default(0);
            $table->boolean('sabe_leer')->default(1);
            $table->boolean('sabe_escribir')->default(1);
            $table->string('ultimo_grado')->nullable();
            $table->string('ultimo_anio')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('lugar_trabajo')->nullable();
            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('parientes');
    }
}
