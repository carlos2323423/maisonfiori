<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosAreasTable extends Migration
{
    public function up()
    {        
        Schema::table('empleados_areas', function (Blueprint $table) {            
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('area_id');
            $table->boolean('es_manager'); // Indicador de si el empleado es el manager del área

            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados_areas');
    }
}
