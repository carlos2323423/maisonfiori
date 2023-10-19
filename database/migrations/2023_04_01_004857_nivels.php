<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nivels extends Migration
{
    public function up()
    {
        Schema::table('nivels', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();            
            $table->foreignId('name')->constrained('competencias')->onDelete('cascade');
            $table->foreignId('Deficiente')->nullable()->constrained('competencias')->onDelete('cascade');
            $table->foreignId('Mejorable')->nullable()->constrained('competencias')->onDelete('cascade');
            $table->foreignId('Aceptable')->nullable()->constrained('competencias')->onDelete('cascade');
            $table->foreignId('Bueno')->nullable()->constrained('competencias')->onDelete('cascade');
            $table->foreignId('Excelente')->nullable()->constrained('competencias')->onDelete('cascade');                                                
        });
    }

    public function down()
    {
        Schema::dropIfExists('nivels');
    }
}