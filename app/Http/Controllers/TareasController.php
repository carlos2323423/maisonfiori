<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TareasController extends Controller
{
    public function index()
    {
        return view('tareas', ['title' => 'Tareas Page']);
    }
}
?>