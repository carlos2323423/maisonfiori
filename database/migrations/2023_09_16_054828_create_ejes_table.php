<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejes', function (Blueprint $table) {
            $table->id('id_eje');
            $table->unsignedBigInteger('id_grafico');
            $table->string('vertical');
            $table->string('horizontal');

            // $table->foreign('id_grafico')->references('id_grafico')->on('graficos');
            $table->foreign('id_grafico')->references('id')->on('graphics');
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
        Schema::dropIfExists('ejes');
    }
}
