<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrabajoEstudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->boolean('trabaja')->default(0);
            $table->string('tipo')->nullable();
            $table->string('lugar')->nullable();
            $table->string('jornadaLaboral')->nullable();
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
            $table->dropColumn('trabaja');
            $table->dropColumn('tipo');
            $table->dropColumn('lugar');
            $table->dropColumn('jornadaLaboral');
        });
    }
}
