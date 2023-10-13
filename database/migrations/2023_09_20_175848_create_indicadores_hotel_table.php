<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresHotelTable extends Migration
{
    public function up()
    {
        Schema::table('indicadores_hotel', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('indicador_id');
            $table->float('valor');
            $table->smallInteger('porcentage')->nullable();
            $table->boolean('state')->nullable();
            $table->foreignId('cuestionario_id')->references('id')->on('cuestionarios')->onDelete('cascade');     

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('indicador_id')->references('id')->on('indicadores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('indicadores_hotel');
    }
}