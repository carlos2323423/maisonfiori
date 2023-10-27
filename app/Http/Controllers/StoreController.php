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
                // Utiliza parse_url para descomponer la URL
                // $parsed_url = parse_url($request->url);                
                // Accede al segmento que necesitas
                // $path_segments = explode('/', $parsed_url['path']);
                // $segment_you_need = end($path_segments);
                // $request->request->add(['name' => $segment_you_need]);
                // dd($request->all());
                // dd('estpy dentreo dew gnerator qr');                
                $validator = ValidationHelper::validator('qr_codes', $request->all(), true, $request);
                $viewvariables = $this->traitqrgenerator();
                dd($validator);
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
        return redirect('empleados');
    }
}
