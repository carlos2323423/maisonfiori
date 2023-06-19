<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Competenciaslaborales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competenciaslaborales', function (Blueprint $table) {            
            $table->id('id')->unique();
            $table->timestamps();
            $table->integer('liderazgo');
            $table->integer('proactivo');
            $table->integer('dinámico');
            $table->integer('analítico');
            $table->integer('orientación al logro');
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
        Schema::dropIfExists('competenciaslaborales');
    }
}
