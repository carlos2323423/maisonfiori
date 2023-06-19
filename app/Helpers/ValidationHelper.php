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
  public static function getMessages(): array
    {
      return 
        [
          'required' => 'El campo :attribute es requerido.',
          'string' => 'El campo :attribute debe ser una cadena de texto y usted está enviando un tipo :datatype.',
          'integer' => 'El campo :attribute debe ser un número entero y usted está enviando un tipo :datatype.',
          'max' => [
            'string' => 'El campo :attribute no debe exceder los :max caracteres y usted está enviando una longitud de :longitud caracteres.',
            'file' => 'El campo :attribute el tamaño máximo permitido para el archivo es :max Kilobites',
          ],
          'min' => 'La :attribute debe tener al menos :min caracteres y usted está enviando una longitud de :longitud caracteres.',
          'email' => 'El formato de :attribute no es válido. Debe enviar un formato tipo email.',
          'date' => 'El formato de :attribute no es válido. Debe enviar un formato tipo date.',
          'unique' => 'El valor de :attribute ya está en uso',           
          'image' => 'El archivo de :attribute debe ser una imagen',         
          'confirmed' => 'La confirmación de :attribute no coincide',
        ];                
    }

    public static function rules(string $tipo_tabla, array $data) {
      switch ($tipo_tabla) {
        case 'empleado':
          // dd($data);
          $messages = self::getMessages();
          return Validator::make($data, [
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'hotel' => ['required', 'string', 'max:255'],
            'nivel' => ['required', 'string', 'max:255'],
            'cargo' => ['required', 'string', 'max:255'],
            'superior' => ['required', 'string', 'max:255'],
            'area' => ['required', 'string', 'max:255'],            
            'foto' => ['nullable', 'image', 'max:2048'],
            'ci' => ['required', 'integer', 'unique:empleados'],            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:empleados'],            
            'celular' => ['required', 'integer'],
            'ingreso' => ['required', 'date'],
            'genero' => ['required', 'string', 'max:255'],            
            'password' => ['required', 'string', 'min:8', 'confirmed'],
          ], $messages);              
          break;
        case 'usuario':
          $messages = self::getMessages();                
          return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'ci' => ['required', 'integer', 'unique:usuarios'],           
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],                         
            'password' => ['required', 'string', 'min:8', 'confirmed'],            
            'foto' => ['nullable', 'image', 'max:2048'], 
            'nivel' => ['required', 'string', 'max:255'],                       
          ]);             
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
    public static function validator(string $tipo_tabla, array $data)
    {        
        return self::rules($tipo_tabla, $data);        
    }    
}
