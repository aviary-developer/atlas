<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocenteAsignatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignatura_grados', function (Blueprint $table) {
            $table->integer('f_profesor')->unsigned()->nullable();
            $table->foreign('f_profesor')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asignatura_grados', function (Blueprint $table) {
            $table->dropForeign('f_profesor');
        });
    }
}
