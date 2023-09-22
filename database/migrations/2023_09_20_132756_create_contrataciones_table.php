<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratacionesTable extends Migration
{
    public function up()
    {
        Schema::create('contrataciones', function (Blueprint $table) {
            $table->id();            
            $table->date('fecha_contratacion');
            $table->foreignId('contexto_id')->references('id')->on('contexto_contratacion')->onDelete('cascade');            
            $table->timestamps();            
        });
    }

    public function down()
    {
        Schema::dropIfExists('contrataciones');
    }
}