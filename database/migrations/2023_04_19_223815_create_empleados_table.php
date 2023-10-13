<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('lastname', 255);
            $table->string('firstname', 255);            
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade');                         
            $table->foreignId('nivel_id')->constrained('niveles')->onDelete('cascade');             
            $table->foreignId('cargo_id')->constrained('cargos')->onDelete('cascade');                         
            $table->foreignId('area_id')->constrained('areas')->onDelete('cascade');             
            $table->string('foto', 255);
            $table->integer('ci');
            $table->string('email', 255);
            $table->integer('celular');            
            $table->foreignId('contratacion_id')->constrained('contrataciones')->onDelete('cascade');
            $table->string('genero', 255);
            $table->string('password', 60);
        });        
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}