<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CamposDeEvaluacions extends Migration
{
    public function up()
    {
        Schema::create('campos_de_evaluacions', function (Blueprint $table) {
            $table->id();
            $table->string('campo', 255);
            $table->string('escala', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campos_de_evaluacions');
    }
}