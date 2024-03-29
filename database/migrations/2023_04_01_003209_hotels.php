<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hotels extends Migration
{
    public function up()
    {        
        Schema::table('hotels', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('name', 255);
            $table->string('direccion', 255);            
            $table->bigInteger('telefono');
            $table->boolean('activo')->default(false);            
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}