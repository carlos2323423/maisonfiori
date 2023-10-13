<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNivelesTable extends Migration
{
    public function up()
    {
        Schema::table('niveles', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('nombre', 50);
            $table->text('descripcion')->nullable();
            $table->integer('puntos_requeridos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('niveles');
    }
}