<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesDesempenioTable extends Migration
{
    public function up()
    {
        Schema::table('evaluaciones_desempenio', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->unsignedBigInteger('empleado_id');
            $table->date('fecha_evaluacion');
            $table->integer('calidad_servicio');
            $table->integer('trabajo_equipo');
            $table->integer('puntualidad');
            $table->integer('resolucion_problemas');

            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluaciones_desempenio');
    }
}