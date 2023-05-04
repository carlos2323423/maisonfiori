<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RedirectorController extends Controller
{
    public function login() {
        //
        return view('login', ['title' => 'Home Page']);
    }

    public function register() {
        return view('register', ['title' => 'Home Page']);
    }    

    public function getTableColumns($tableName) {
        $columns = DB::getSchemaBuilder()->getColumnListing($tableName);
        // dd($columns); // Imprime el contenido de $columns y detiene la ejecución del código
        $spaces = [];                
        // foreach($columns as $i => $column) {
        //     $spaces['c' . ($i+1)] = $column;
        // }        
        $i = 0;
        $excludeColumns = ['foto', 'password']; // columnas a excluir
        foreach($columns as $index => $column) {            
            if (in_array($column, $excludeColumns)) {
                continue;
            }
            $i++;
            $spaces['c' . $i] = $column;            
        }                  
        $count = count($spaces);        
        foreach($excludeColumns as $value) {
            $i++;            
            $spaces['c' . ($i)] = $value;
        }            

        $excludeColumns = ['created_at', 'updated_at', 'remember_token', 'id'];
        $spaces = array_diff($spaces, $excludeColumns);
        // $spaces = array_values($filteredSpaces);

        // dd($spaces); // Imprime el contenido de $columns y detiene la ejecución del código
        return $spaces;
    }    

    public function welcome() {
        return view('welcome2', ['title' => 'Welcome']);
    }    

    public function users() {
        $spaces = $this->getTableColumns('users');          
        // selection query        
        // dd($spaces);                
        $list = User::all();        
        $name = 'usuario';
        return view('usuarios', [
            'title' => 'Welcome',            
            'list' => $list,
            'spaces' => $spaces,
            'route_name' => $name,
        ]);
    }    

    public function empleados() {      
        $spaces = $this->getTableColumns('empleados');                  
        $list = Empleado::all();  
        $name = 'empleado';
        return view('empleados', [
            'title' => 'Welcome',
            'list' => $list,
            'spaces' => $spaces,
            'route_name' => $name,
        ]);
    }       
}
