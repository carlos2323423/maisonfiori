<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompetencyLevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competency_levels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competency_id');
            $table->string('name');
            $table->timestamps();
        
            $table->foreign('competency_id')->references('id')->on('competencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
