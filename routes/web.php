<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\EvaluacionGController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', '/home');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/tareas', [TareasController::class, 'index']);

Route::get('/evaluaciong', [EvaluacionGController::class, 'index']);

Route::get('/evaluacion', [EvaluacionController::class, 'index']);

Route::get('/empleados', [EmpleadosController::class, 'index']);

// Route::resource('empleados',[EmpleadosController::class]);

Route::group(['prefix'=>'admin', 'as'=>'admin'], function() {
   Route::get('/', [AdminController::class, 'index']);
   Route::get('/usuarios', [UsersController::class, 'index']);
});

// Route::get('/', function () {
//     return view('welcome');
// });
