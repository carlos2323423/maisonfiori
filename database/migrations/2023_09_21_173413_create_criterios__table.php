<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriosTable extends Migration
{
    public function up()
    {
        // Tabla de criterios
        Schema::create('criterios', function (Blueprint $table) {                 
            $table->id();
            $table->string('nombre');
            $table->foreignId('cuestionario_id')->references('id')->on('cuestionarios')->onDelete('cascade');     
            $table->boolean('state')->nullable();
            $table->timestamps();            
        });        
    }

    public function down()
    {        
        Schema::dropIfExists('criterios');
    }
}