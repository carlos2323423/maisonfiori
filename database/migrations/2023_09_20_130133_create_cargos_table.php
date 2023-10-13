<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    public function up()
    {
        Schema::table('cargos', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('nombre', 50);
            $table->string('descripcion', 100)->nullable();
            $table->decimal('salario', 10, 2);
            $table->foreignId('area_id')->constrained('areas')->onDelete('cascade');
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}