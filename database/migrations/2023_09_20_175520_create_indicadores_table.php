<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresTable extends Migration
{
    public function up()
    {
        Schema::table('indicadores', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('nombre');
        });
    }

    public function down()
    {
        Schema::dropIfExists('indicadores');
    }
}