<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosGraficoTable extends Migration
{
    public function up()
    {        
        Schema::table('datos_grafico', function (Blueprint $table) {
            // $table->id('id_dato');
            // $table->timestamps();
            $table->foreignId('id_grafico')->constrained('graphics');
            $table->foreignId('id_eje')->constrained('ejes');
            $table->foreignId('empleado')->nullable()->constrained('empleados');            
            $table->foreignId('id_competencias')->nullable()->constrained('competencias');
            $table->integer('nivel');
        });
    }

    public function down()
    {
        Schema::dropIfExists('datos_grafico');
    }
}