<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    
    class EmpleadosController extends Controller
    {
        public function index()
        {
            return view('empleados', ['title' => 'Home Page']);
        }
    }
?>