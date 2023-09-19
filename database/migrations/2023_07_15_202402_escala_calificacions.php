<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EscalaCalificacions extends Migration
{
    public function up()
    {
        Schema::create('escala_calificacions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('e1', 255);
            $table->string('e2', 255);
            $table->string('e3', 255);
            $table->string('e4', 255);
            $table->string('e5', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('escala_calificacions');
    }
}