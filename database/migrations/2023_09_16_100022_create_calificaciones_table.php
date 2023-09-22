<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    public function up()
    {        
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id('id_calificacion');
            $table->foreignId('id_empleado')->constrained('empleados');
            // $table->foreignId('id_aspecto')->constrained('aspectos', 'id_aspecto');
            $table->foreignId('id_criterios')->constrained('criterios');
            $table->integer('calificacion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}