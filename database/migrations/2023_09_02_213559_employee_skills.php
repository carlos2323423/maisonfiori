<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeSkills extends Migration
{
    public function up()
    {
        Schema::create('employee_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('empleados')->onDelete('cascade');
            $table->foreignId('competency_id')->constrained('competencias')->onDelete('cascade');
            $table->foreignId('competency_level_id')->constrained('competency_levels')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_skills');
    }
}