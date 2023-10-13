<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetivosTable extends Migration
{
    public function up()
    {
        Schema::table('objetivos', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('nombre');
            $table->text('descripcion');
        });
    }

    public function down()
    {
        Schema::dropIfExists('objetivos');
    }
}