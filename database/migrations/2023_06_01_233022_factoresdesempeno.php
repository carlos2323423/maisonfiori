<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Factoresdesempeno extends Migration
{
    public function up()
    {        
        Schema::table('factoresdesempeno', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();            
            $table->string('name')->unique();
            $table->boolean('state')->nullable();
            $table->string('descripcion', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('factoresdesempeno');
    }
}