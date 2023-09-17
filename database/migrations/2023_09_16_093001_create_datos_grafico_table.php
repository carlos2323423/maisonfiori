<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosGraficoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('datos_grafico', function (Blueprint $table) {
            $table->id('id_dato');
            $table->unsignedBigInteger('id_grafico');
            $table->unsignedBigInteger('id_eje');
            $table->unsignedBigInteger('empleado')->nullable();
            $table->unsignedBigInteger('aspecto')->nullable();
            $table->integer('nivel');

            // $table->foreign('id_grafico')->references('id_grafico')->on('graficos');
            $table->foreign('id_grafico')->references('id')->on('graphics');            
            $table->foreign('id_eje')->references('id_eje')->on('ejes');
            $table->foreign('empleado')->references('id')->on('empleados');
            $table->foreign('aspecto')->references('id_aspecto')->on('aspectos');
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
        Schema::dropIfExists('datos_grafico');
    }
}
