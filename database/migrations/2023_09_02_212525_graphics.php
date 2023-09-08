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
            $table->string('competencies', 255); 
            $table->string('competency_levels', 255); 
            $table->string('employee_skills', 255); 
            $table->string('graphical_representation', 255); 
            $table->string('description', 255);             
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
