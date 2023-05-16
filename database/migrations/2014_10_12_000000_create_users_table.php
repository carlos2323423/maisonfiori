<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('users', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('LastName', 255); 
            $table->string('FirstName', 255); 
            $table->integer('CI'); 
            $table->string('Email', 255)->unique(); 
            $table->string('password', 60);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            // $table->string('remember_token', 100)->default(100);            
            $table->string('remember_token', 100)->nullable();
            // $table->string('img')->default('https://www.google.com/url?sa=i&url=http%3A%2F%2Fwww.stickpng.com%2Fimg%2Ficons-logos-emojis%2Fusers%2Fsimple-user-icon&psig=AOvVaw2D2V8bEv10fhLoL5laMMoQ&ust=1680935822867000&source=images&cd=vfe&ved=0CA4QjRxqFwoTCODBooiUl_4CFQAAAAAdAAAAABAD');
            $table->string('foto')->default('');
            $table->string('level')->default(100);                                    
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('users');
        Schema::dropIfExists('User');
    }
}
