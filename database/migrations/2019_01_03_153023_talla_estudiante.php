<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TallaEstudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->double('talla_inicial')->nullable();
            $table->double('talla_medio')->nullable();
            $table->double('talla_final')->nullable();
            $table->double('peso_inicial')->nullable();
            $table->double('peso_medio')->nullable();
            $table->double('peso_final')->nullable();
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
            $table->dropColumn('talla_inicial');
            $table->dropColumn('talla_medio');
            $table->dropColumn('talla_final');
            $table->dropColumn('peso_inicial');
            $table->dropColumn('peso_medio');
            $table->dropColumn('peso_final');
        });
    }
}
