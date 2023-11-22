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
            $table->decimal('valor', 5, 2); // Utiliza el tipo de dato decimal para valores con decimales
            $table->foreignId('id_competencia')->constrained('competencias')->onDelete('cascade');
            // Otras columnas si son necesarias            
        });
    }

    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}