<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleTransaccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_transaccions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('f_transaccion')->unsigned();
            $table->foreign('f_transaccion')->references('id')->on('transaccions');
            $table->double('cantidad');
            $table->integer('f_insumo')->unsigned();
            $table->foreign('f_insumo')->references('id')->on('insumos');
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
        Schema::dropIfExists('detalle_transaccions');
    }
}
