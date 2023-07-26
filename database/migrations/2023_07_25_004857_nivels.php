<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nivels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nivels', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('name', 255); 
            $table->string('Deficiente', 255); 
            $table->string('Mejorable', 255);         
            $table->string('Aceptable', 255);         
            $table->string('Bueno', 255);         
            $table->string('Exelente', 255);                             
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
