<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiempoLugarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiempo_lugar', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('evento', 255);
            $table->string('personal', 255);
            $table->string('tiempo', 255);
            $table->string('lugar', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiempo_lugar');
    }
}
