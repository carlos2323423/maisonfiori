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
// START CHARTS
use App\Charts\Charts;
// END CHARTS
class RedirectorController extends Controller
{
    use RedirectorTrait;
    
    public function filled_tables() {
        $name = 'fill_content tables';
        return view($name, ['title' => $name]);
    }

    public function login() {
        return view('login', ['title' => 'Home Page']);
    }

    public function register() {
        return view('register', ['title' => 'Home Page']);
    }    

    public function welcome() {
        $viewvariables = $this->traitwelcome();
        return view('welcome2', $viewvariables, ['title' => 'Welcome']);        
    }    

    public function usuarios() {
        // $viewvariables = $this->traitusers();
        $viewvariables = $this->traitusuarios();
        return view('usuarios', $viewvariables);
    }    

    public function empleados() {     
        $viewvariables = $this->traitempleados();     
        return view('empleados', $viewvariables, );
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
        $viewvariables = $this->trait_calificacion_empleados();
        return view('calificacion_empleados', $viewvariables);                
    }

    public function crud_cuestionario()
    {
        $viewvariables = $this->trait_crud_cuestionario();
        return view('crud_cuestionario', $viewvariables);                
    }

    public function preguntas()
    {
        $viewvariables = $this->traitpreguntas();
        return view('preguntas', $viewvariables);                
    }
}
