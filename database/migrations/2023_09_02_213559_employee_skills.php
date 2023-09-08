<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeSkills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('competency_id');
            $table->unsignedBigInteger('competency_level_id');
            $table->timestamps();
        
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('competency_id')->references('id')->on('competencies')->onDelete('cascade');
            $table->foreign('competency_level_id')->references('id')->on('competency_levels')->onDelete('cascade');
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
