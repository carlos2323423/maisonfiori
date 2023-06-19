<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Factoresdesempeno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */    

    public function up()
    {        
        Schema::create('factoresdesempeno', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->timestamps();
            $table->integer('Integrar y coordinar el trabajo del personal');            
            $table->integer('responsable_decisiones_politicas_estrategias');
            $table->integer('Dirigir el mercado en el momento actual');
            $table->integer('Controlar el personal y el restaurante');
            $table->integer('Distribuir las funciones');
            $table->integer('Controlar los procesos');            
            $table->integer('control_actividades_areas');
            $table->integer('Llevar un reporte mensual');
            $table->string('personal', 255);
            $table->string('tiempo', 255);
            $table->string('lugar', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factoresdesempeno');
    }
}
