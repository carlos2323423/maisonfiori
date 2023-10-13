<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluaciones360Table extends Migration
{
    public function up()
    {
        Schema::table('evaluaciones_360', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('evaluador_id');
            $table->date('fecha_evaluacion');
            $table->integer('calidad_servicio');
            $table->integer('trabajo_equipo');
            $table->integer('puntualidad');
            $table->integer('resolucion_problemas');

            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('evaluador_id')->references('id')->on('empleados')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluaciones_360');
    }
}