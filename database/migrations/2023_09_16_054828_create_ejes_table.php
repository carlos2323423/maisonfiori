<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjesTable extends Migration
{
    public function up()
    {
        Schema::create('ejes', function (Blueprint $table) {
            $table->id();            
            $table->string('vertical');
            $table->string('horizontal');            
            $table->foreignId('id_grafico')->constrained('graphics');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ejes');
    }
}