<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstadoMatricula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->boolean('estado')->default(1);
            /**
             * Estado:
             * 0: Inactivo
             * 1: Activo
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
}
