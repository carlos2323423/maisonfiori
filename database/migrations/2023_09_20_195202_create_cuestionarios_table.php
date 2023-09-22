<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionariosTable extends Migration
{
    public function up()
    {
        Schema::create('cuestionarios', function (Blueprint $table) {
            $table->id();
            $table->string('keyunic')->unique();       
            $table->foreignId('empleado_id')->references('id')->on('empleados')->onDelete('cascade');     
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade'); 
            $table->foreignId('nivel_id')->constrained('niveles')->onDelete('cascade');                                                 
            $table->foreignId('cargo_id')->constrained('cargos')->onDelete('cascade');                                     
            $table->foreignId('manager_id')->constrained('empleados')->onDelete('cascade');
            $table->foreignId('area_id')->constrained('areas')->onDelete('cascade');                         
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuestionarios');
    }
}