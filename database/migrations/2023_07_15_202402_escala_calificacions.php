<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EscalaCalificacions extends Migration
{
    public function up()
    {
        Schema::table('escala_calificacions', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('name')->unique();            
            $table->foreignId('e1')->constrained('escala_atributo')->onDelete('cascade');
            $table->foreignId('e2')->constrained('escala_atributo')->onDelete('cascade');
            $table->foreignId('e3')->constrained('escala_atributo')->onDelete('cascade');
            $table->foreignId('e4')->constrained('escala_atributo')->onDelete('cascade');
            $table->foreignId('e5')->constrained('escala_atributo')->onDelete('cascade');            
        });
    }

    public function down()
    {
        Schema::dropIfExists('escala_calificacions');
    }
}