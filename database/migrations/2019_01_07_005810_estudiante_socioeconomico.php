<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstudianteSocioeconomico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->integer('tipoVivienda');
            $table->integer('estadoCasa');
            $table->double('pagoVivienda')->nullable();
            $table->integer('personasEnVivienda')->nullable();
            $table->boolean('internet')->default(0);
            $table->double('ingresoFamiliar')->nullable();
            $table->boolean('beca')->default(0);
            $table->boolean('bonoEscolar')->default(0);
            $table->boolean('transporte')->default(0);
            $table->boolean('prioridadComedor')->default(0);
            $table->string('otro_tipo_ayuda')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->dropColumn('tipoVivienda');
            $table->dropColumn('estadoCasa');
            $table->dropColumn('pagoVivienda');
            $table->dropColumn('personasEnVivienda');
            $table->dropColumn('internet');
            $table->dropColumn('ingresoFamiliar');
            $table->dropColumn('beca');
            $table->dropColumn('bonoEscolar');
            $table->dropColumn('transporte');
            $table->dropColumn('prioridadComedor');
            $table->dropColumn('otro_tipo_ayuda');
        });
    }
}
