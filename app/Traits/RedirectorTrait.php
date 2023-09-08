<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

trait RedirectorTrait
{
    public function page_elements(string $page) {
        return require 'RedirectorTrait/page_elements.blade.php';
    }

    public function login() {
        return view('login', ['title' => 'Home Page']);
    }

    public function register() {
        return view('register', ['title' => 'Home Page']);
    }
        
    public function getTableColumns($tableName, bool $total) {
        return require 'RedirectorTrait/getTableColumns.php';
    }    

    public function traitwelcome() {
        return require 'RedirectorTrait/traitwelcome.php';  
        // return view('welcome2', ['title' => 'Welcome']);
    }    

    // public function traitusers() {                
    //     return require 'RedirectorTrait/traitusers.php';  
    // }    

    public function traitusuarios() {                
        return require 'RedirectorTrait/traitusuarios.php';  
    }    

    public function traitempleados() {              
        return require 'RedirectorTrait/traitempleados.php';          
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

    public function trait_calificacion_empleados()
    {   
        return require 'RedirectorTrait/trait_calificacion_empleados.php';        
    }

    public function trait_crud_cuestionario()
    {             
        return require 'RedirectorTrait/trait_crud_cuestionario.php';        
    }

    public function traitpreguntas()
    {             
        return require 'RedirectorTrait/traitpreguntas.php';                
    }
}
