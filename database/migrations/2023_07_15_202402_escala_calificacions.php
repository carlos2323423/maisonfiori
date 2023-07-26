<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EscalaCalificacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escala_calificacions', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('name', 255); 
            $table->string('e1', 255);
            $table->string('e2', 255);
            $table->string('e3', 255);
            $table->string('e4', 255);
            $table->string('e5', 255);            
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
