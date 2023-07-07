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
      $data = $request->all();     
      // dd(gettype($data['ci']));   
      // dd($request->all());
      if ($request->has('foto')) {
        // dd('hola gato');
      }
      if ($request->hasFile('foto')) {
        // dd('hola gato2');
      }            
      // $request->merge(['foto' => $request->hasFile('foto') ? $request->file('foto') : null]);

      $modeTable = '';
      switch ($tipo_tabla) {
        case 'empleado_registersent':                            
            $request->merge(['foto' => $request->filled('foto') ? $request->file('foto') : null]);
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
          $messages = $validator->messages(); 
          $messages = $messages->toArray();                           
          foreach ($failedRules as $field => $rules) {
            foreach ($rules as $rule => $params) {              
              $datatype = gettype($data[$field]); // Obtén el tipo de dato actual              
              
              $messageArray = $messages[$field];                  
              foreach ($messageArray as $index => $message) {                
                $message = str_replace([':datatype', ':attribute', ':max', ':longitud', ':min'], [$datatype, $field, $params['max'] ?? '', $params['size'] ?? '', $params['min'] ?? ''], $message);                      
                 $messageArray[$index] = $message; // Reemplazar el mensaje en el arreglo de mensajes    
                if($field == 'ci'){
                  // dd($message); 
                  // dd($messageArray);
                }                                
              }                
              $messages[$field] = $messageArray;                                                  
            }
          }                            
          return redirect()->back()->withErrors($validator)->withInput();                
        } else {}
      } else {
        dd("NO EXISTE EL VALIDATOR PARA " . $tipo_tabla . " EN EL CONTROLADOR");
      }                      
      $this->storeTrait($request, $modeTable);        
      return view('preguntas', $viewvariables);           
    }     
}
