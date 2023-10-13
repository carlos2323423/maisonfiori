<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjesTable extends Migration
{
    public function up()
    {
        Schema::table('ejes', function (Blueprint $table) {
            // $table->id();            
            // $table->timestamps();
            $table->string('vertical');
            $table->string('horizontal');            
            $table->foreignId('id_grafico')->constrained('graphics');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ejes');
    }
}