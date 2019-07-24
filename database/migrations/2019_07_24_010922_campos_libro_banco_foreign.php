<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CamposLibroBancoForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('libro_bancos', function (Blueprint $table) {
          $table->integer('f_banco')->unsigned();
          $table->foreign('f_banco')->references('id')->on('bancos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('libro_bancos', function (Blueprint $table) {
          $table->dropForeign('f_banco');
          $table->dropColumn('f_banco');
        });
    }
}
