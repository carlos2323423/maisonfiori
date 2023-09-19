<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Factoresdesempeno extends Migration
{
    public function up()
    {
        Schema::create('factoresdesempeno', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('integrar_coordinar_personal');
            $table->integer('responsable_decisiones_politicas_estrategias');
            $table->integer('dirigir_mercado_actual');
            $table->integer('controlar_personal_restaurante');
            $table->integer('distribuir_funciones');
            $table->integer('controlar_procesos');
            $table->integer('control_actividades_areas');
            $table->integer('llevar_reporte_mensual');
            $table->string('personal', 255);
            $table->string('tiempo', 255);
            $table->string('lugar', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('factoresdesempeno');
    }
}