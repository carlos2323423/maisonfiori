<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Preguntas extends Migration
{
    public function up()
    {
        Schema::table('preguntas', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('type', 255);
            $table->string('areas_de_evaluacion', 255);
            $table->string('valor', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}