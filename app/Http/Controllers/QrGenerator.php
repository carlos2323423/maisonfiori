<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BaconQrCode\Encoder\QrCode;

class QrGenerator extends Controller
{
    //
    public function generarCodigoQR()
    {
        // Crea un objeto QrCode con la URL que deseas
        $url = "https://www.ejemplo.com";
        $qrCode = new QrCode($url);

        // Genera la imagen del código QR
        $imagen = $qrCode->writeDataUri();

        // Puedes pasar la imagen a una vista
        return view('nombre_de_la_vista', ['imagen' => $imagen]);
    }
}
