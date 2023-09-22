<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContextoContratacionTable extends Migration
{
    public function up()
    {
        Schema::create('contexto_contratacion', function (Blueprint $table) {
            $table->id();            
            $table->text('contexto');
            $table->text('cualidades_positivas');
            $table->timestamps();            
        });
    }

    public function down()
    {
        Schema::dropIfExists('contexto_contratacion');
    }
}