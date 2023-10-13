<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    public function up()
    {
        Schema::table('failed_jobs', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
        });
    }

    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}