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
            $table->morphs('areas_de_evaluacion');
            $table->string('valor', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}