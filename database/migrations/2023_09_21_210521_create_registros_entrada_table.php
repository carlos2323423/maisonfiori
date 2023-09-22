<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {                
        Schema::create('registros_entrada', function (Blueprint $table) {
            $table->id();            
            $table->date('fecha');
            $table->string('dia');
            $table->time('hora');
            $table->timestamps();

            $table->foreignId('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreignId('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros_entrada');
    }
}
