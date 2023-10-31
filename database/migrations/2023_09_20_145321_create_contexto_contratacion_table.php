<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContextoContratacionTable extends Migration
{
    public function up()
    {
        Schema::table('contexto_contratacion', function (Blueprint $table) {
            // $table->id();            
            // $table->timestamps();            
            $table->text('contexto');            
            $table->json('cualidades_positivas')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contexto_contratacion');
    }
}