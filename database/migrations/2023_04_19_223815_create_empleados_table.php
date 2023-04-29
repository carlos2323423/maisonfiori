<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('hotel', 255);
            $table->string('nivel', 255);      
            $table->string('rol', 255);
            $table->string('foto', 255);               
            $table->string('nombre', 255);            
            $table->integer('ci');            
            $table->string('email', 255); 
            $table->integer('celular');                    
            $table->date('ingreso');           
            $table->string('genero', 255);    
            $table->string('password', 60);            
            $table->timestamps();
            // $table->string('apellido', 255);            
            // $table->string('edad', 255);                                    
            // $table->date('fecha_nacimiento');
            // $table->string('direccion', 255);                                                                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}