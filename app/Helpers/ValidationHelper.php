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
    public static function rules(string $tipo_tabla, array $data) {
        switch ($tipo_tabla) {
            case 'empleado':
                $messages = [
                    'FirstName.required' => 'El campo nombre es requerido',
                    'LastName.required' => 'El campo apellido es requerido',
                    'celular.required' => 'El campo celular es requerido',
                    'celular.unique' => 'El número de celular ya está en uso',
                    'ci.required' => 'El campo CI es requerido',
                    'ci.unique' => 'El número de CI ya está en uso',
                    'email.required' => 'El campo email es requerido',
                    'email.email' => 'El formato de email no es válido',
                    'email.unique' => 'El email ya está en uso',
                    'genero.required' => 'El campo género es requerido',
                    'hotel.required' => 'El campo hotel es requerido',
                    'ingreso.required' => 'El campo ingreso es requerido',
                    'ingreso.date' => 'El formato de fecha de ingreso no es válido',
                    'nivel.required' => 'El campo nivel es requerido',
                    'rol.required' => 'El campo rol es requerido',
                    'foto.image' => 'El archivo debe ser una imagen',
                    'foto.max' => 'El tamaño máximo del archivo es 2MB',
                    'password.required' => 'El campo contraseña es requerido',
                    'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                    'password.confirmed' => 'La confirmación de contraseña no coincide',
                ];       
                return Validator::make($data, [
                    'FirstName' => ['required', 'string', 'max:255'],
                    'LastName' => ['required', 'string', 'max:255'],
                    'celular' => 'required|string|unique:empleados',
                    'ci' => 'required|string|unique:empleados',
                    'email' => 'required|string|email|unique:empleados',
                    'genero' => 'required|string',
                    'hotel' => 'required|string',
                    'ingreso' => 'required|date',
                    'nivel' => 'required|string',
                    'rol' => 'required|string',
                    'foto' => 'nullable|image|max:2048',            
                    'password' => 'required|string|min:8|confirmed',
                ], $messages);       
              break;
            case 2:
              echo "Seleccionaste la opción 2";
              break;
            case 3:
              echo "Seleccionaste la opción 3";
              break;
            default:
              echo "Opción no válida";
              break;
          }
    }
    public static function validator(string $tipo_tabla, array $data)
    {        
        return self::rules('empleado', $data);
    }    
}
