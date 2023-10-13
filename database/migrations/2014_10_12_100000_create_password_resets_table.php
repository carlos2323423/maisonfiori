<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('password_resets', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('email')->index();
            $table->string('token');
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
};