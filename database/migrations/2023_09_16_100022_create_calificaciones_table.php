<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    public function up()
    {        
        Schema::table('calificaciones', function (Blueprint $table) {
            // $table->id('id_calificacion');
            // $table->timestamps();
            $table->foreignId('id_empleado')->constrained('empleados');
            // $table->foreignId('id_aspecto')->constrained('aspectos', 'id_aspecto');
            $table->foreignId('id_criterios')->constrained('competencias');
            $table->integer('calificacion');
        });
    }

    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}