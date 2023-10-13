<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosModelosTable extends Migration
{
    public function up()
    {
        Schema::table('empleados_modelos', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->boolean('evaluaciones_desempenio_activo')->default(true);
            $table->boolean('evaluaciones_competencias_activo')->default(true);
            $table->boolean('evaluaciones_360_activo')->default(true);
            $table->boolean('evaluaciones_objetivos_activo')->default(true);
            $table->boolean('evaluaciones_competencias_tecnicas_activo')->default(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados_modelos');
    }
}