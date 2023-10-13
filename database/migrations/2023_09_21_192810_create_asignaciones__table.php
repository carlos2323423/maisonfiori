<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionesTable extends Migration
{
    public function up()
    {
        Schema::table('asignaciones', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->foreignId('tarea_id')->constrained('tareas')->onDelete('cascade');
            $table->date('fecha');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asignaciones');
    }
}