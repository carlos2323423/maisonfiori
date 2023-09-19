<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Competenciaslaborales extends Migration
{
    public function up()
    {
        Schema::create('competenciaslaborales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('liderazgo');
            $table->integer('proactivo');
            $table->integer('dinamico');
            $table->integer('analitico');
            $table->integer('orientacion_logro');
            $table->string('personal', 255);
            $table->string('tiempo', 255);
            $table->string('lugar', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('competenciaslaborales');
    }
}