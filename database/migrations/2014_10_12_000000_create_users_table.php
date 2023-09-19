<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('LastName', 255);
            $table->string('FirstName', 255);
            $table->integer('CI');
            $table->string('Email', 255)->unique();
            $table->string('password', 60);
            $table->timestamps();
            $table->string('remember_token', 100)->nullable();
            $table->string('foto')->default('');
            $table->string('nivel')->default(100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}