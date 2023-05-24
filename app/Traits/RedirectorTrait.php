<?php

namespace App\Traits;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

trait RedirectorTrait
{
    public function login() {
        //
        return view('login', ['title' => 'Home Page']);
    }

    public function register() {
        return view('register', ['title' => 'Home Page']);
    }    

    public function getTableColumns($tableName, bool $total) {
        $columns = DB::getSchemaBuilder()->getColumnListing($tableName);
        // dd($columns); // Imprime el contenido de $columns y detiene la ejecución del código
        $spaces = [];                
        // foreach($columns as $i => $column) {
        //     $spaces['c' . ($i+1)] = $column;
        // }        
        $i = 0;
        $complate_name = ['FirstName', 'LastName'];
        $lastvaluesform = ['foto', 'password']; // columnas a excluir
        $excludeColumns = ['created_at', 'updated_at', 'remember_token', 'id'];
        foreach($complate_name as $value) {
            $i++;            
            $spaces['c' . ($i)] = $value;
        }                               
        foreach($columns as $index => $column) {            
            if (in_array($column, $lastvaluesform) || in_array($column, $complate_name) || in_array($column, $excludeColumns)) {
                continue;
            }            
            $i++;
            $spaces['c' . $i] = $column;
        }                                
        foreach($lastvaluesform as $value) {
            $i++;
            $spaces['c' . ($i)] = $value;
        }            
        if($total) {            
            foreach($excludeColumns as $value) {
                $i++;
                $spaces['c' . ($i)] = $value;
            }
            return $spaces;
        } else {                            
            // $spaces = array_diff($spaces, $excludeColumns);
            return $spaces;
        }
        dd('ERROR function getTableColumns');
    }    

    public function welcome() {
        return view('welcome2', ['title' => 'Welcome']);
    }    

    public function traitusers() {
        $spaces = $this->getTableColumns('users');          
        // selection query        
        // dd($spaces);                
        $list = User::all();     
        $lelementos = array(
            'styles1', 
            'styles2',
            'script1',
            'script2',
            'Page Heading_introducction', 
            'modal',
            'table_head_foot',
            'table_row_list',
        );    
        $route_name = 'usuario';
        $name = 'usuario';        
        $viewvariables = [
            'title' => 'Welcome',            
            'list' => $list,
            'spaces' => $spaces,
            'route_name' => $route_name,
            'name' => $name,
            'elementos' => $lelementos,
        ];
        return $viewvariables;
    }    

    public function traitempleados() {      
        $spaces = $this->getTableColumns('empleados', false);
        $spacesTotal = $this->getTableColumns('empleados', true);
        // dd($spaces);
        $list = Empleado::all();  
        $lelementos = array(
            'styles1', 
            'styles2',
            'script1',
            'script2',
            'Page Heading_introducction', 
            'modal',
            'table_head_foot',
            'table_row_list',
        );
        $route_name = 'empleado';
        $name = 'empleado';
        $list_options = [
            'roles' => $hoteles = array(
                'recepcionista',
                'camarero',
                'cocinenero',
            ),
            'niveles' => $hoteles = array(
                'alto',
                'medio',
                'bajo',
            ),
            'hoteles' => $hoteles = array(
                'prado',
                'recoleta',
                'centro',
            ),
            'generoes' => $generos = array(
                'masculino',
                'femenino',                
            ),
        ];        
        // view()->share('spaces', $spaces);        
            
        $viewvariables = [
            'title' => 'Welcome',
            'list' => $list,
            'spaces' => $spaces,
            'spacesTotal' => $spacesTotal,
            'route_name' => $route_name,
            'name' => $name,
            'elementos' => $lelementos,
            'list_options' => $list_options,
        ];
        return $viewvariables;
    } 

    public function about() {      
        return view('about', ['title' => 'About Page']);
    }

    public function tareas() {              
        return view('tareas', ['title' => 'Tareas Page']);
    }

    public function evaluaciong() {                      
        return view('evaluaciong', ['title' => 'Home Page']);
    }

    public function evaluacion()
    {
        return view('evaluacion', ['title' => 'Home Page']);
    }

    public function calificacion_empleados()
    {
        return view('calificacion_empleados', ['title' => 'Home Page']);        
        
        $name = 'empleado';
        $lelementos = array(
            'styles1', 
            'Page Heading_introducction', 
            'modal',
            'edit_modal',
            'table_head_foot',
            'table_row_list'
        ); 

        return view('empleados', [
            'title' => 'Welcome',
            'list' => $list,
            'spaces' => $spaces,
            'route_name' => $name,
            'elementos' => $lelementos,
        ]);        
    }
}
