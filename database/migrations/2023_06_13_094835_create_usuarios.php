<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarios extends Migration
{
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('lastname', 255);
            $table->string('firstname', 255);
            $table->string('password', 60);
            $table->integer('ci');
            $table->string('email', 255)->unique();
            $table->string('remember_token', 100)->nullable();
            $table->string('foto')->default('');
            $table->string('nivel')->default(100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}