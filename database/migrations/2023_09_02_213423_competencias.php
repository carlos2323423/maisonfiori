<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Competencias extends Migration
{
    public function up()
    {
        Schema::table('competencias', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('name');
            $table->boolean('state')->nullable();
            $table->string('descripcion', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('competencias');
    }
}