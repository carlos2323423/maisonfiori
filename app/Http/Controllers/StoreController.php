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
      $request->merge(['foto' => $request->hasFile('foto') ? $request->file('foto') : null]);

      $modeTable = '';
      switch ($tipo_tabla) {
        case 'empleado_registersent':                
            $modeTable = new Empleado;
            $validator = ValidationHelper::validator('empleado', $request->all());
            $viewvariables = $this->traitempleados();                 
          break;
        case 'usuario_registersent':
            $modeTable = new User;            
            $validator = ValidationHelper::validator('usuario', $request->all());
            $viewvariables = $this->traitusers();                                 
          break;
        case 'preguntas_registersent':
            // dd('estoy en preguntas');
            $modeTable = new Pregunta;                            
            $validator = ValidationHelper::validator('pregunta', $request->all());
            $viewvariables = $this->traitpreguntas();                
          break;
        default:              
            dd("Store calling method invalit table");
          break;
      }     
      // dd($validator);
      if (isset($validator)) {         
        $data = $request->all();                     
        if ($validator->fails()) {                                    
          $failedRules = $validator->failed(); // Obtiene las reglas que han fallado
          foreach ($failedRules as $field => $rules) {
              foreach ($rules as $rule => $params) {
                // dd($data);
                  $datatype = gettype($data[$field]); // Obtén el tipo de dato actual
                  $messages = ValidationHelper::getMessages();
                  $message = str_replace([':datatype', ':attribute', ':max', ':longitud', ':min'], [$datatype, $field, $params['max'] ?? '', $params['size'] ?? '', $params['min'] ?? ''], $messages[lcfirst($rule)]); // Reemplaza los placeholders con los valores correspondientes
                  // Haz algo con el mensaje personalizado
              }
          }  
          return redirect()->back()->withErrors($validator)->withInput();                
        }               
      } else {
        dd("NO EXISTE EL VALIDATOR PARA " . $tipo_tabla . " EN EL CONTROLADOR");
      }                      
        $this->storeTrait($request, $modeTable);        
        return view('preguntas', $viewvariables);           
    }     
}
