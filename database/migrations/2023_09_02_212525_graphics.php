<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Graphics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('graphics', function (Blueprint $table) {                    
            $table->id('id')->unique();   
            $table->string('nombre_grafico');                                  
            $table->string('graphical_representation', 255); 
            $table->string('competencies', 255);                         
            $table->string('competency_levels', 255);             
            $table->string('employee_skills', 255); 
            $table->string('representacion_grafica', 255);
            $table->string('descripcion', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
