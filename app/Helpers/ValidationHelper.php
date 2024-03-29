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
  protected $table;
  protected $data;
  protected $unique;
  protected $request;
  protected $enfoque;
  protected $columns;
  protected $rules;
  public function __construct(string $tipo_tabla, array $data, bool $unique, $request, bool $enfoque)
  {
    $this->table = $tipo_tabla;
    $this->data = $data;
    $this->unique = $unique;
    $this->request = $request;
    $this->enfoque = $enfoque;      
  }

  private function get_columslist($total) {
    $tableName = $this->table;
    $columns = Schema::getColumnListing($tableName);
    $excludeColumns = ['created_at', 'updated_at', 'id'];
    if (!$total) {
      $columns = array_values(array_diff($columns, $excludeColumns));
        
    } 
    $this->columns = $columns;       
  }
  private static function handleColumnRules($tableName, $column, &$rules)
  {
      switch ($column['type']) {
          case 'integer':
          case 'int':
          case 'tinyint':
          case 'smallint':
          case 'mediumint':
          case 'bigint':
              $rules[] = 'integer';
              break;
          case 'decimal':
          case 'float':
          case 'double':
              $rules[] = 'numeric';
              break;
          case 'string':
          case 'char':
          case 'varchar':
          case 'text':
          case 'blob':
              $rules[] = 'string';
              $rules[] = 'max:255';
              break;          
          case 'date':
              $rules[] = 'date';
              break;
          case 'time':
              $rules[] = 'date_format:H:i:s';
              break;
          case 'datetime':
          case 'timestamp':
              $rules[] = 'date';
              break;          
          case 'bool':
          case 'boolean':
              $rules[] = 'boolean';
              break;
          case 'enum':
              $enumValues = Schema::getConnection()->getDoctrineColumn($tableName, $column)->getCustomSchemaOptions()['options'];
              $rules[] = 'in:' . implode(',', $enumValues);
              break;
          case 'set':
              $setValues = Schema::getConnection()->getDoctrineColumn($tableName, $column)->getCustomSchemaOptions()['options'];
              $rules[] = 'in:' . implode(',', $setValues);
              break;
          default:
              dd("Error: Tipo de dato desconocido para la columna {$column}. Tipo: {$column['type']}");
      }
      // dd($column['notnull']);
      if ($column['notnull']) {
          $rules[] = 'required';
      }
  
      if ($column['autoincrement']) {
          $rules[] = "unique:{$tableName}";
      }
  }

  private function get_rules_from_columnstables()
  {
      $tableName = $this->table;            
      $columns = $this->columns;                        
      $columnDetails = [];      
      foreach ($columns as $column) {
          $columnDetails[$column]['type'] = Schema::getColumnType($tableName, $column);
          $rules = [];
          self::handleColumnRules($tableName, [
              'type' => $columnDetails[$column]['type'],
              'notnull' => Schema::getConnection()->getDoctrineColumn($tableName, $column)->getNotnull(),
              'autoincrement' => Schema::getConnection()->getDoctrineColumn($tableName, $column)->getAutoincrement(),
          ], $rules);
          // $columnDetails[$column]['rules'] = $rules;
          $columnDetails[$column] = $rules;
      }      
      return $columnDetails;
  }


    private static function def_campos ($value): array { 
      switch ($value) {
        case 'rowtypeintegrer':
          return [
            'celular', 
            'ci',
            'areas_de_evaluacion_id',
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
        case 'rowtypepassword':
          return [
            'password',
          ];
          break;
        case 'rowtyperequired':
          return [
            'name',
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

  public function getMessages(): array
  {    
    $data = $this->data;                
    $rules = $this->rules;
    $messages = [];

    $originMessages = [
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

    // dd('estoy dentro de mensajes');
    foreach ($rules as $row_name => $params) {
      // dd($rules);
      // dd($params);
      $charLong = '';
      $dataType = gettype($data[$row_name]);
      // dd($dataType);    
      // dd($row_name);  
      // dd($data[$row_name]);
      $longitud = strlen($data[$row_name]);

      $matches = preg_grep('/^(max|min):\d+$/', $params);
      if (!empty($matches)) {
        $rule = reset($matches);
        $parts = explode(":", $rule);
        if (count($parts) === 2 && ($parts[0] === "max" || $parts[0] === "min")) {
          $charLong = $parts[1];
        } else {
          dd("La regla no sigue el formato esperado.");
        }
      }
      // dd($originMessages);
      // dd($longitud);
      foreach ($originMessages as $rowMessage => $text) {
        if (in_array($rowMessage, $params)) {
          // Aplica rotación a los valores deseados
          $text = str_replace([':attribute', ':datatype', ':max', ':min', ':longitud'], [$row_name, $dataType, $charLong, $charLong, $longitud], $text);
          $messages[$row_name . '.' . $rowMessage] = $text;
        }

      }
    }
    // dd($messages);
    return $messages;
  }


  public function get_rules_by_namespace()
  {
    $tableName = $this->table;
    $data = $this->data;
    $unique = $this->unique;
    $request = $this->request;
    $enfoque = $this->enfoque;
    $columns = $this->columns;
    $columnDetails = $columns;
    // $columnDetails = self::get_columns_from_tables($tableName, false);
    $columnDetails = self::get_rules_from_columnstables();
    // dd($columnDetails);
    $rules = [];

    foreach ($data as $columnName => $value) {
      if (in_array($columnName, ['_method', '_token'])) {
        continue;
      }

      $columnRules = [];
      // dd($columnName);
      if (!empty($columnDetails[$columnName])) {
        // if (in_array($columnName, $columnDetails)) {
        // $columnTypeRules = $columnName;
        $columnTypeRules = $columnDetails[$columnName];
        // dd('ho estoy dentro de get rules by name space');
        // dd($columnTypeRules);

        if (in_array('integer', $columnTypeRules)) {
          $columnRules[] = 'required';
          $columnRules[] = 'integer';
        }

        if (in_array('string', $columnTypeRules)) {
          $columnRules[] = 'required';
          $columnRules[] = 'string';
          $columnRules[] = 'max:255';
        }

        if (in_array('unique', $columnTypeRules) && $unique) {
          $columnRules[] = "unique:{$tableName}";
        }

        if (in_array('date', $columnTypeRules)) {
          $columnRules[] = 'date';
        }

        if (in_array('image', $columnTypeRules)) {
          if ($request->hasFile($columnName)) {
            $columnRules[] = 'nullable';
            $columnRules[] = 'image';
            $columnRules[] = 'max:2048';
          }
        }

        if (in_array('email', $columnTypeRules)) {
          $columnRules[] = 'email';
        }

        if (in_array('password', $columnTypeRules)) {
          $columnRules[] = 'confirmed';
          $columnRules[] = 'min:8';
        }
      }

      $rules[$columnName] = $columnRules;
    }
    // dd($rules);

    return $rules;
  }


  public function rules()
  {
    $tipo_tabla = $this->table;
    $data = $this->data;
    $unique = $this->unique;
    $request = $this->request;
    $enfoque = $this->enfoque;
    $columns = $this->columns;
    if ($enfoque) {
      $rules = self::get_rules_by_namespace();
      $this->rules = $rules;
    } else {
      $rules = self::get_rules_from_columnstables();
      $this->rules = $rules;
    }
    // dd($rules);
    $messages = self::getMessages();
    // dd($messages);
    // dd('pase los mensajes en rules');
    $customRules = [];
    switch ($tipo_tabla) {
      case 'empleado':
      case 'usuarios':
      case 'qr_codes':
        $customRules = Validator::make($data, $rules, $messages);
        break;
      case 'preguntas':
        // dd($rules);        
        $customRules = Validator::make($data, $rules, $messages);
        // $customRules = Validator::make($data, [
        //     'type' => ['required', 'string', 'max:255'],
        //     'valor' => ['required', 'string', 'max:255'],
        // ], [
        //     'type.required' => 'El campo tipo es requerido',
        //     'valor.required' => 'El campo valor es requerido',
        // ]);
        break;
      default:
        dd("Validator Helper invalid table option");
        break;
    }

    return $customRules;
  }
    

  public function validator()
  {        
    self::get_columslist(true);
    $rules = self::rules();
    // dd($rules);
    return $rules;
  }    
}
