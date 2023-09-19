<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspectosTable extends Migration
{
    public function up()
    {                
        Schema::create('aspectos', function (Blueprint $table) {
            $table->id('id_aspecto');
            $table->string('nombre_aspecto');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aspectos');
    }
}