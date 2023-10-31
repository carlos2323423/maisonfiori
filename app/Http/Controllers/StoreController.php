<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MainparentController;
use Illuminate\Http\Request;
//START MODELOS
use App\Models\Empleado;
use App\Models\User;
use App\Models\Pregunta;
use App\Models\QrGenerator;
//END MODELOS
//START TRAITS
use App\Traits\CrudmodalTrait;
use App\Traits\RedirectorTrait;
//END TRAITS
use App\Helpers\ValidationHelper;
// START QR
// use BaconQrCode\Encoder\QrCode;            
use Endroid\QrCode\QrCode;        
use Endroid\QrCode\Writer\PngWriter;
// END QR

class StoreController extends Controller
{
    use CrudmodalTrait;
    use RedirectorTrait;
    
    public function store(Request $request, $tipo_tabla)
    {        
        $modeTable = '';
        $redir = '';
        switch ($tipo_tabla) {
            case 'empleado_registersent':
                // $request->merge(['foto' => $request->filled('foto') ? $request->file('foto') : null]);
                $modeTable = new Empleado;
                $validator = ValidationHelper::validator('empleado', $request->all(), true, $request);
                $viewvariables = $this->traitempleados();
                $redir = 'empleados';
                break;
            case 'usuario_registersent':
                $modeTable = new User;
                $validator = ValidationHelper::validator('usuario', $request->all(), true, $request);
                $viewvariables = $this->traitusuarios();
                $redir = 'usuarios';
                break;
            case 'preguntas_registersent':
                $modeTable = new Pregunta;
                $validator = ValidationHelper::validator('pregunta', $request->all());
                $viewvariables = $this->traitpreguntas();
                $redir = 'preguntas';
                break;
            case 'qrgenerator_registersent':
                $modeTable = new QrGenerator;
                $qrCode = new QrCode($request->qr_code_data);  
                // Configura opciones adicionales (opcional)
                $qrCode->setSize(300); // Tamaño del código QR
                $qrCode->setMargin(10); // Margen alrededor del código QR
                // Crea una instancia de PngWriter    
                $qrCodeSerializado = serialize($qrCode);
                // Crea una instancia de PngWriter    
                $writer = new PngWriter();
                $imagen = $writer->write($qrCode);
                $nombreArchivo = $request->name;
                $rutaDestino = storage_path('app/public/qrpagesimg/') . $nombreArchivo;  // Ubicación donde se guardará
                // Guardar la imagen en el sistema de archivos
                file_put_contents($rutaDestino, $imagen->getString());                
                $imageqr = 'qrpagesimg/' . $request->name;
                // $request = $request->request->all() + ['imageqr' => $imageqr];
                $request = $request->duplicate(null, $request->request->all() + ['imageqr' => $imageqr]);                
                $validator = ValidationHelper::validator('qr_codes', $request->all(), true, $request, false);
                $viewvariables = $this->traitqrgenerator();                
                // dd($validator);
                $redir = 'qrgenerator';                
                break;
            default:
                dd("Store calling method invalid table");
                break;
        }
        if (isset($validator)) {
            if ($validator->fails()) {
                dd('hola perri');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        } else {
            dd("NO EXISTE EL VALIDATOR PARA " . $tipo_tabla . " EN EL CONTROLADOR");
        }
        // START CONPROBACIONES
        if ($modeTable == '') {
          dd('NO EXISTE MODETABLE');
        }
        if ($redir == '') {
          dd('No EXISTE REDIR');
        }
        // END CONPROBACIONES
        $this->storeTrait($request, $modeTable);
        // return view($redir, $viewvariables);
        return redirect($redir);
    }
}
