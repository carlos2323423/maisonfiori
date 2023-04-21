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

use App\Http\Controllers\RegisterManagerController;

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


// // Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// // Confirm Password (added in v6.2)
// Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
// Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// // Email Verification Routes...
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify'); // v6.x
// /* Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify'); // v5.x */
// Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


// Route::redirect('/', '/home');

      // Route::get('/home', [HomeController::class, 'index']);

// START CONTROLLERS ROUTES

   // START GETING BLADES
      Route::get('/about', [AboutController::class, 'index']);

      Route::get('/tareas', [TareasController::class, 'index']);

      Route::get('/evaluaciong', [EvaluacionGController::class, 'index']);

      Route::get('/evaluacion', [EvaluacionController::class, 'index']);
      
      Route::get('/empleados', [RedirectorController::class, 'empleados'])->name('empleados');
      // Route::get('/empleados', [EmpleadosController::class, 'index']);

// START ROUTES REDIRECTOR CONTROLLER

   // Route::get('/register', [UserModelController::class, 'index']);
   // Route::get('/register', [RedirectorController::class, 'register'])->name('register');

   // Route::get('/login', [RedirectorController::class, 'login'])->name('login');      
   Route::get('/', [RedirectorController::class, 'welcome'])->name('welcome');      
   Route::get('/users', [RedirectorController::class, 'users'])->name('usuarios');
// END ROUTES REDIRECTOR CONTROLLER

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
      // START form receptor REGISTER MANNAGER
      Route::post('/register_user', [UserModelController::class, 'store'])->name('registersent');
      
      // $this->post('register', 'Auth\RegisterController@register');
      Route::post('/login', [UserModelController::class, 'store_login'])->name('loginsent');
      // END form receptor REGISTER MANNAGER
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

Auth::routes(
   
);
// Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// START FORM BY USERS
// CREATE
Route::post('/register_user', [RegisterManagerController::class, 'store'])->name('user_registersent');
// DELETE
Route::delete('/destroy_user/{id}', [RegisterManagerController::class, 'destroy'])->name('user_destroysent');
// SHOW
Route::get('/profesores/{id}/ver', [RegisterManagerController::class, 'show'])->name('user.show');
// EDIT
// Route::get('/user/{id}/editar', [RegisterManagerController::class, 'edit'])->name('usuario.edit');
Route::post('/user/{id}/editar', [RegisterManagerController::class, 'edit'])->name('usuario.edit');
Route::put('/user/{id}', [RegisterManagerController::class, 'update'])->name('usuario.update');
// Route::delete('/profesores/{id}', [ProfesorController::class, 'destroy'])->name('profesores.destroy');
// END FORM BY USERS