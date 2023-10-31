<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScalenivelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table ('scaleniveles', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();                        
            $table->foreignId('empleado')->constrained('empleados')->onDelete('cascade');
            $table->foreignId('Deficiente')->nullable()->constrained('competencias')->onDelete('cascade');
            $table->foreignId('Mejorable')->nullable()->constrained('competencias')->onDelete('cascade');
            $table->foreignId('Aceptable')->nullable()->constrained('competencias')->onDelete('cascade');
            $table->foreignId('Bueno')->nullable()->constrained('competencias')->onDelete('cascade');
            $table->foreignId('Excelente')->nullable()->constrained('competencias')->onDelete('cascade');                                                
        });
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scaleniveles');
    }
}
