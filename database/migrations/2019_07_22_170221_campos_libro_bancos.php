<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CamposLibroBancos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('libro_bancos', function (Blueprint $table) {
            $table->string('cheque')->nullable();
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
            $table->dropColumn('banco');
            $table->dropColumn('cheque');
        });
    }
}
