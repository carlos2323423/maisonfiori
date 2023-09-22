<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresEmpleadoTable extends Migration
{
    public function up()
    {
        Schema::create('indicadores_empleado', function (Blueprint $table) {
            $table->id();            
            $table->float('valor');
            $table->smallInteger('porcentage')->nullable();                     
            $table->boolean('state')->nullable();
            $table->foreignId('cuestionario_id')->references('id')->on('cuestionarios')->onDelete('cascade');     
            $table->timestamps();

            $table->foreignId('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreignId('indicador_id')->references('id')->on('indicadores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('indicadores_empleado');
    }
}