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

Route::get('/clear', function() {
   $commands = ['cache:clear', 'config:clear', 'config:cache', 'view:clear', 'route:clear'];
   foreach ($commands as $command) {
      Artisan::call($command);
   }
      return "Cleared!";
});

$routes_get = [
   'users',
   'empleados',
   'welcome',
   'register',
   'login',
];
// array_push($routes_get, 'pera');

Route::prefix('/')->group(function () use ($routes_get) {

   foreach ($routes_get as $route) {
      if ($route == 'welcome') {
         Route::get('/', [RedirectorController::class, $route])->name($route);
         continue;
      }
      Route::get($route, [RedirectorController::class, $route])->name($route);      
   }   

});

Route::post('/register_user', [RegisterManagerController::class, 'store'])->name('usuario_registersent');
// Route::post('/user/{id}/editar', [RegisterManagerController::class, 'edit'])->name('usuario.edit');
Route::post('/register_empleado', [EmpleadosController::class, 'store'])->name('empleado_registersent');
// Route::post('/empleado/{id}/editar', [EmpleadosController::class, 'edit'])->name('empleado.edit');
Route::put('/user/{id}', [RegisterManagerController::class, 'update'])->name('usuario.update');  
Route::put('/empleado/{id}', [EmpleadosController::class, 'update'])->name('empleado.update');   
Route::delete('/destroy_user/{id}', [RegisterManagerController::class, 'destroy'])->name('user_destroysent');
Route::delete('/destroy_empleado/{id}', [EmpleadosController::class, 'destroy'])->name('empleado_destroysent');


// Route::get('/about', [AboutController::class, 'ABOUT']);

// Route::get('/tareas', [TareasController::class, 'index']);

// Route::get('/evaluaciong', [EvaluacionGController::class, 'index']);

// Route::get('/evaluacion', [EvaluacionController::class, 'index']);

// Route::get('/usuarios', [UsersController::class, 'index']); 