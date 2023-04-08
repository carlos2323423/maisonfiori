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

use App\Http\Controllers\UserModelController;

use App\Http\Controllers\RedirectorController;
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
Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');
   Artisan::call('route:clear');

   return "Cleared!";

});
// Route::redirect('/', '/home');

      // Route::get('/home', [HomeController::class, 'index']);

// START CONTROLLERS ROUTES

   // START GETING BLADES
      Route::get('/about', [AboutController::class, 'index']);

      Route::get('/tareas', [TareasController::class, 'index']);

      Route::get('/evaluaciong', [EvaluacionGController::class, 'index']);

      Route::get('/evaluacion', [EvaluacionController::class, 'index']);

      Route::get('/empleados', [EmpleadosController::class, 'index']);

      // Route::get('/register', [UserModelController::class, 'index']);
      // Route::get('/register', [RedirectorController::class, 'register'])->name('register');

      // Route::get('/login', [RedirectorController::class, 'login'])->name('login');

   // END GETING BLADES
// END CONTROLLERS ROUTES
// queryes sql
Route::get('/insert', [HomeController::class, 'insert']);
Route::get('/edit', [EmpleadosController::class, 'edit']);
Route::get('/read', [EmpleadosController::class, 'read']);
Route::get('/delete', [EmpleadosController::class, 'delete']);

   // START UserModelController
      // Route::get('/insert', [HomeController::class, 'create']);

      Route::get('/edit', [EmpleadosController::class, 'edit']);
      Route::get('/read', [EmpleadosController::class, 'read']);
      Route::get('/delete', [EmpleadosController::class, 'delete']);      
      // START form receptor
      Route::post('/register', [UserModelController::class, 'store_register'])->name('registersent');
      Route::post('/login', [UserModelController::class, 'store_login'])->name('loginsent');
      // END form receptor
   // END UserModelController
Route::group(['prefix'=>'admin', 'as'=>'admin'], function() {
   Route::get('/', [AdminController::class, 'index']);
   Route::get('/usuarios', [UsersController::class, 'index']);
});
// Middleware START
Route::get('profile', function () {
   // Only authenticated users may enter...
})->middleware('auth');
// Middleware END

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
