<?php        
    use App\Models\QrGenerator;
    use App\Charts\Charts;
    use Illuminate\Http\Request;
    // use BaconQrCode\Encoder\QrCode;            
    use Endroid\QrCode\QrCode;        
    use Endroid\QrCode\Writer\PngWriter;

    $list = QrGenerator::all();
    $lelementos = $this->page_elements('qrgenerator');
    $stora_url = asset('storage/');
    $url = "https://www.ejemplo.com";
    $qrCode = new QrCode($url);            

    // Configura opciones adicionales (opcional)
    $qrCode->setSize(300); // Tamaño del código QR
    $qrCode->setMargin(10); // Margen alrededor del código QR        
    // Crea una instancia de PngWriter    
    $qrCodeSerializado = serialize($qrCode);
    // dd($qrCode,gettype($qrCode), $qrCodeSerializado);
    $writer = new PngWriter();
    // Genera la imagen del código QR en formato PNG
    $imagen = $writer->write($qrCode);
    // $imagenBase64 = 'data:image/png;base64,' . base64_encode($imagen);

    // Convierte el resultado en una representación de datos URI
    $imagenDataUri = 'data:image/png;base64,' . base64_encode($imagen->getString());                
    $viewvariables = [
        'title' => 'QR Generator',
        'list' => $list,
        'elementos' => $lelementos,                                                        
        'stora_url' => $stora_url,                        
        'imagenDataUri' => $imagenDataUri,
    ];
    return $viewvariables;