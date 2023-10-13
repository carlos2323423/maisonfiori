<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosSalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::table('registros_salida', function (Blueprint $table) {
            // $table->id();            
            // $table->timestamps();
            $table->date('fecha');
            $table->string('dia');
            $table->time('hora');

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
        Schema::dropIfExists('registros_salida');
    }
}
