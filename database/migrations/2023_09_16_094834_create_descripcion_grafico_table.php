<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescripcionGraficoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('descripcion_grafico', function (Blueprint $table) {
            $table->id('id_descripcion');
            $table->unsignedBigInteger('id_grafico');
            $table->text('descripcion');

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
        Schema::dropIfExists('descripcion_grafico');
    }
}
