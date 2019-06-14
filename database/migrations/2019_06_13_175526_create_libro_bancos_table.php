<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibroBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_bancos', function (Blueprint $table) {
          $table->increments('id');
          $table->double('egreso')->nullable();
          $table->double('ingreso')->nullable();
          $table->double('saldo');
          $table->date('fecha');
          $table->string('concepto');
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
        Schema::dropIfExists('libro_bancos');
    }
}
