<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscalaAtributo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escala_atributo', function (Blueprint $table) {        
            // $table->id();
            // $table->timestamps();
            $table->string('name')->unique();
            $table->boolean('state')->nullable();
            $table->string('descripcion', 1000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escala_atributo');
    }
}
