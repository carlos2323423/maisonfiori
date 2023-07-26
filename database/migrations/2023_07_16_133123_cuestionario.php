<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cuestionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuestionarios', function (Blueprint $table) {
            $table->id('id', 255)->unique();
            $table->string('keyunic')->unique();
            $table->string('name', 255);
            $table->string('firstname', 255);         
            $table->string('hotel', 255);
            $table->string('nivel', 255);                  
            $table->string('cargo', 255);
            $table->string('superior', 255);
            $table->string('area', 255);
            $table->string('foto', 255);               
            $table->integer('ci');            
            $table->string('email', 255); 
            $table->integer('celular');                    
            $table->date('ingreso');           
            $table->string('genero', 255);    
            $table->string('password', 60);            
            $table->timestamps();            
        });

        Schema::create('cuestionarios', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('name', 255);             
            $table->string('firstname', 255);         
            $table->string('hotel', 255);
            $table->string('nivel', 255);                  
            $table->string('cargo', 255);
            $table->string('superior', 255);
            $table->string('area', 255);
            $table->string('foto', 255);               
            $table->integer('ci');            
            $table->string('email', 255); 
            $table->integer('celular');                    
            $table->date('ingreso');           
            $table->string('genero', 255);    
            $table->string('password', 60);            
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
