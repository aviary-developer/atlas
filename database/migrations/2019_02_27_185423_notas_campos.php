<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotasCampos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->integer('f_estudiante')->unsigned();
            $table->foreign('f_estudiante')->references('id')->on('matriculas');
            $table->integer('f_asignatura')->unsigned();
            $table->foreign('f_asignatura')->references('id')->on('asignatura_grados');
            $table->integer('n1p1')->nullable();
            $table->integer('n2p1')->nullable();
            $table->integer('n3p1')->nullable();
            $table->integer('rp1')->nullable();
            $table->integer('n1p2')->nullable();
            $table->integer('n2p2')->nullable();
            $table->integer('n3p2')->nullable();
            $table->integer('rp2')->nullable();
            $table->integer('n1p3')->nullable();
            $table->integer('n2p3')->nullable();
            $table->integer('n3p3')->nullable();
            $table->integer('rp3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->dropForeign('f_estudiante');
            $table->dropForeign('f_asignatura');
            $table->dropColumn('f_estudiante');
            $table->dropColumn('f_asignatura');
            $table->dropColumn('n1p1');
            $table->dropColumn('n2p1');
            $table->dropColumn('n3p1');
            $table->dropColumn('rp1');
            $table->dropColumn('n1p2');
            $table->dropColumn('n2p2');
            $table->dropColumn('n3p2');
            $table->dropColumn('rp2');
            $table->dropColumn('n1p3');
            $table->dropColumn('n2p3');
            $table->dropColumn('n3p3');
            $table->dropColumn('rp3');
        });
    }
}
