<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// START TRAITS        
use App\Traits\RedirectorTrait;        
// END TRAITS

class RedirectorController extends Controller
{
    use RedirectorTrait;
    public function login() {
        //
        return view('login', ['title' => 'Home Page']);
    }

    public function register() {
        return view('register', ['title' => 'Home Page']);
    }    

    public function welcome() {
        return view('welcome2', ['title' => 'Welcome']);
    }    

    public function users() {
        $viewvariables = $this->traitusers();  
        return view('usuarios', $viewvariables);
    }    

    public function empleados() {     
        $viewvariables = $this->traitempleados();     
        return view('empleados', $viewvariables);   
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
