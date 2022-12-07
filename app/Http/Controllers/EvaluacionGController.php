<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    
    class EvaluacionGController extends Controller
    {
        public function index()
        {
            return view('evaluaciong', ['title' => 'Home Page']);
        }
    }
?>