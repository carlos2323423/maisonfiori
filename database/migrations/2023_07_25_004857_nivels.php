<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nivels extends Migration
{
    public function up()
    {
        Schema::create('nivels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('Deficiente', 255);
            $table->string('Mejorable', 255);
            $table->string('Aceptable', 255);
            $table->string('Bueno', 255);
            $table->string('Excelente', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nivels');
    }
}