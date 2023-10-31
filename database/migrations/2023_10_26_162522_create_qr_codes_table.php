<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {                
        Schema::table('qr_codes', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->string('name', 255);
            $table->longText('qr_code_data'); // Columna para almacenar el código QR serializado
            $table->longText('imageqr'); // Columna para almacenar la imagen
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qr_codes');
    }
}
