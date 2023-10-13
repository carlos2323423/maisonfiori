<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompetencyLevels extends Migration
{
    public function up()
    {
        Schema::table('competency_levels', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->foreignId('competency_id')->constrained('competencias')->onDelete('cascade');            
            $table->string('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('competency_levels');
    }
}