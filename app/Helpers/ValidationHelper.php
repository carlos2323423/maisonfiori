<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Validator;        
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ValidationHelper
{  
    private static function def_campos ($value): array { 
      switch ($value) {
        case 'rowtypeintegrer':
          return [
            'celular', 
            'ci',
          ];
          break;
        case 'rowtypedate':
          return [
            'ingreso',
          ];
          break;
        case 'rowtypeimage':
          return [
            'foto',
          ];
          break;
        case 'rowtypeunique':
          return [
            'ci', 
            'email',
          ];
          break;
        case 'rowtypeemail':
          return [
            'email',
          ];
        break;
        case 'rowpassword':
          return [
            'password',
          ];
          break;
        default:
          dd('ValidationHelper => function def_campos() ERROR');
        break;
      }           
    }

    private static function getSpecialRule(string $row_name, array $specialRules, string $tipo_tabla): array
    {
        if (array_key_exists($row_name, $specialRules)) {
            $rule = $specialRules[$row_name];
            if ($row_name === 'ci' || $row_name === 'email') {
                $rule[0] = str_replace('{$tipo_tabla}', $tipo_tabla, $rule[0]);
            }
            return $rule;
        }

        return [];
    }
    public static function getMessages(array $rules, array $data): array {            
      $messages = [];  
      foreach ($rules as $row_name => $params) {        
        $Charlong = '';
        $datatype = gettype($data[$row_name]);
        $Longitud = strlen($data[$row_name]);
        $matches = preg_grep('/^(max|min):\d+$/', $params);
        if (!empty($matches)) {
          $Rule = reset($matches);          
          $parts = explode(":", $Rule);
          if (count($parts) === 2 && $parts[0] === "max" || $parts[0] === "min") {
            $Charlong = $parts[1];              
          } else {              
              dd("La regla no sigue el formato esperado.");
          }
        } else {          
          // dd("No se encontró la regla 'max:255' en el array.");          
        }   
        $originmessages = 
        [
          'required' => 'El campo :attribute es requerido.',
          'string' => 'El campo :attribute debe ser una cadena de texto y usted está enviando un tipo :datatype.',
          'integer' => 'El campo :attribute debe ser un número entero y usted está enviando un tipo :datatype.',
          'maxstring' => 'El campo :attribute no debe exceder los :max caracteres y usted está enviando una longitud de :longitud caracteres.',
          'maxfile' => 'El campo :attribute el tamaño máximo permitido para el archivo es :max Kilobites',
          'minstring' => 'La :attribute debe tener al menos :min caracteres y usted está enviando una longitud de :longitud caracteres.',
          'email' => 'El formato de :attribute no es válido. Debe enviar un formato tipo email.',
          'date' => 'El formato de :attribute no es válido. Debe enviar un formato tipo date.',
          'unique' => 'El valor de :attribute ya está en uso',
          'image' => 'El archivo de :attribute debe ser una imagen',
          'confirmed' => 'La confirmación de :attribute no coincide',
        ];
        foreach ($originmessages as $row_message => $text) {
          $text = str_replace([':datatype', ':max', ':min', ':longitud'], [$datatype, $Charlong, $Charlong, $Longitud], $text);
          $originmessages[$row_message] = $text;
        }
        // dd($originmessages);
        $required = $originmessages['required'];
        $string = $originmessages['string'];
        $integer = $originmessages['integer'];
        $maxstring = $originmessages['maxstring'];
        $maxfile = $originmessages['maxfile'];
        $minstring = $originmessages['minstring'];
        $email = $originmessages['email'];
        $date = $originmessages['date'];
        $unique = $originmessages['unique'];
        $image = $originmessages['image'];
        $confirmed = $originmessages['confirmed'];                
        $mesaje_pack =
        [
          $row_name . '.required' => $required,
          $row_name .  '.string' => $string,
          $row_name . '.integer' => $integer,
          $row_name . '.max' => [
            'string' => $maxstring,
            'file' => $maxfile,
          ],
          $row_name . '.min' => [
            'string' => $minstring,
          ],
          $row_name . '.email' => $email,
          $row_name . '.date' => $data,
          $row_name . '.unique' => $unique,           
          $row_name . '.image' => $image,         
          $row_name . '.confirmed' => $confirmed,
        ];   
        $messages = array_merge($messages, $mesaje_pack);
      }      
      return $messages;  
    }    
    public static function rules1(string $tipo_tabla, array $data, $unique, $request) {      
      // dd($data);
      // dd($request);
      if ($unique) {
        $rowtypeunique = self::def_campos('rowtypeunique');
      }
      $rules = [];      
      $rowtypeunique = [];
      $rowtypeintegrer = self::def_campos('rowtypeintegrer');      
      $rowtypedate = self::def_campos('rowtypedate');
      $rowtypeimage = self::def_campos('rowtypeimage');
      $rowtypeemail = self::def_campos('rowtypeemail');
      $rowpassword = self::def_campos('rowpassword');
  
      foreach ($data as $row_name => $value) {
        if (in_array($row_name, ['_method', '_token'])) {
            continue;
        }
        $rowRules = ['required'];          
        if (!in_array($row_name, $rowtypeintegrer)) {
          $rowRules[] = 'string';
          $rowRules[] = 'max:255';
        }
        if (in_array($row_name, $rowtypeintegrer)) {
          $rowRules[] = 'integer';
        }
        if (in_array($row_name, $rowtypeunique)) {
            $rowRules[] = "unique:{$tipo_tabla}s";
        }
        if (in_array($row_name, $rowtypedate)) {
            $rowRules[] = 'date';
        } 
        if (in_array($row_name, $rowtypeimage)) {
          // dd($row_name);          
            if (!$request->hasFile($row_name)) {                
            } 
            $rowRules = ['nullable', 'image', 'max:2048'];
            // $rowRules = ['nullable', 'image', 'max:2048'];
        }                
        if (in_array($row_name, $rowtypeemail)) {
            $rowRules[] = 'email';
        }
        if (in_array($row_name, $rowpassword)) {
            $rowRules[] = 'confirmed';
            $rowRules[] = 'min:8';
        }
  
          $rules[$row_name] = $rowRules;
      }
  
      return $rules;               
    }

  public static function rules(string $tipo_tabla, array $data, $unique, $request) {    
    // dd(self::rules1($tipo_tabla, $data));    
    $rules = self::rules1($tipo_tabla, $data, $unique, $request);
    $messages = self::getMessages($rules, $data);
    switch ($tipo_tabla) {
      case 'empleado':                  
        // AQUI SE OUEDEN DEFINIR REGLAS PERSONALIZASAS SI ASI SE DESEARA             
        return Validator::make($data, $rules, $messages);
        break;
      case 'usuario':
        // AQUI SE OUEDEN DEFINIR REGLAS PERSONALIZASAS SI ASI SE DESEARA          
        return Validator::make($data, $rules, $messages);              
        break;
      case 'pregunta':
        $messages = [
          'type.required' => 'El campo tipo es requerido',
          'valor.required' => 'El campo valor es requerido',
        ];
        return Validator::make($data, [
          'type' => ['required', 'string', 'max:255'],
          'valor' => ['required', 'string', 'max:255'],
        ]);          
        break;
      default:              
        dd("Validator Helper invalid table option");
        break;
    }    
  }

  public static function validator(string $tipo_tabla, array $data, $unique, $request)
  {        
    return self::rules($tipo_tabla, $data, $unique, $request);        
  }    
}
