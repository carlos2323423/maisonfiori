<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompetencyLevels extends Migration
{
    public function up()
    {
        Schema::create('competency_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competency_id')->constrained('competencias')->onDelete('cascade');            
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('competency_levels');
    }
}