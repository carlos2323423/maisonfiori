<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    public function up()
    {
        Schema::table('areas', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->foreignId('manager_id')->constrained('empleados')->onDelete('cascade');
            $table->string('ah_nombre', 20)->nullable();
            $table->string('ah_descripcion', 50)->nullable();
            $table->string('ah_ah_activo', 255)->nullable();
            $table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade');             
            // $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('areas');
    }
}