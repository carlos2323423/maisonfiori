<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescripcionGraficoTable extends Migration
{
    public function up()
    {        
        Schema::create('descripcion_grafico', function (Blueprint $table) {
            $table->id('id_descripcion');
            $table->foreignId('id_grafico')->constrained('graphics');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('descripcion_grafico');
    }
}