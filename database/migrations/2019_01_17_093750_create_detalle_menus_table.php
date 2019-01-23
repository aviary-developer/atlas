<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('f_menu')->unsigned();
            $table->foreign('f_menu')->references('id')->on('menus');
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
        Schema::dropIfExists('detalle_menus');
    }
}
