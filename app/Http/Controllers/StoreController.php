<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MainparentController;
use Illuminate\Http\Request;
//START MODELOS
use App\Models\Empleado;
use App\Models\User;
use App\Models\Pregunta;
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
                $validator = ValidationHelper::validator('usuario', $request->all());
                $viewvariables = $this->traitusers();
                $redir = 'usuarios';
                break;
            case 'preguntas_registersent':
                $modeTable = new Pregunta;
                $validator = ValidationHelper::validator('pregunta', $request->all());
                $viewvariables = $this->traitpreguntas();
                $redir = 'preguntas';
                break;
            default:
                dd("Store calling method invalid table");
                break;
        }
        
        if (isset($validator)) {
            if ($validator->fails()) {
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
