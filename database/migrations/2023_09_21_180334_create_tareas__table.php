<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    public function up()
    {
        Schema::table('tareas', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('nombre');
            $table->string('descripcion');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}