<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresAreaTable extends Migration
{
    public function up()
    {
        Schema::create('indicadores_area', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('indicador_id');
            $table->float('valor');
            $table->smallInteger('porcentage')->nullable();
            $table->boolean('state')->nullable();
            $table->foreignId('cuestionario_id')->references('id')->on('cuestionarios')->onDelete('cascade');     
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('indicador_id')->references('id')->on('indicadores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('indicadores_area');
    }
}