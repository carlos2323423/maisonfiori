<?php        
    use App\Models\QrGenerator;
    use App\Charts\Charts;
    use Illuminate\Http\Request;                   

    $list = QrGenerator::all();    
    $lelementos = $this->page_elements('qrgenerator');
    $stora_url = asset('storage/');                        
    // Convierte el resultado en una representación de datos URI    
    $viewvariables = [
        'title' => 'QR Generator',
        'list' => $list,
        'elementos' => $lelementos,                                                        
        'stora_url' => $stora_url,
    ];
    return $viewvariables;