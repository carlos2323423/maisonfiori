<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    
    class EvaluacionController extends Controller
    {
        public function index()
        {
            return view('evaluacion', ['title' => 'Home Page']);
        }
    }
?>