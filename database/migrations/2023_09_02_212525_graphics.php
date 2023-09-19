<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Graphics extends Migration
{
    public function up()
    {
        Schema::create('graphics', function (Blueprint $table) {
            $table->id();
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

    public function down()
    {
        Schema::dropIfExists('graphics');
    }
}