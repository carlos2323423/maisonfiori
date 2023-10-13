<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJornadasTable extends Migration
{
    public function up()
    {
        Schema::table('jornadas', function (Blueprint $table) {
            // $table->id();            
            // $table->timestamps();
            $table->string('dias_semana');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->foreignId('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreignId('area_id')->references('id')->on('areas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jornadas');
    }
}