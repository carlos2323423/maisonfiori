<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesCompetenciasTable extends Migration
{
    public function up()
    {
        Schema::create('evaluaciones_competencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('competencia_id');
            $table->integer('calificacion');
            $table->timestamps();

            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('competencia_id')->references('id')->on('competencias')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluaciones_competencias');
    }
}