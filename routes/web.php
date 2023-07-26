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
use App\Http\Controllers\Evaluacion_administradorController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\DeleteController;

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
   'about',
   'tareas',
   'evaluaciong',
   'evaluacion',
   'calificacion_empleados',
   'crud_cuestionario',
   'preguntas',
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

$routes_post = [   
   'empleado_registersent',
   'usuario_registersent',
   'preguntas_registersent',
   'evaluacionadministrador_registersent',
];

Route::prefix('/')->group(function () use ($routes_post) {
   foreach ($routes_post as $route) {            
      Route::post($route, function () use ($route) {
         $storeController = resolve(StoreController::class);
         return $storeController->store(request(), $route);
         // return app()->call([StoreController::class, 'store'], ['tipo_tabla' => $route]);
     })->name($route);
   }   
});

$routes_update = [   
   'empleado_registerupdate',   
   'usuario_registerupdate',
   'preguntas_registerupdate',   
];

Route::prefix('/')->group(function () use ($routes_update) {
   foreach ($routes_update as $route) {                       
       Route::put($route.'/{id}', function ($id) use ($route) {
            $updateController = resolve(UpdateController::class);
            return $updateController->update(request(), $route, $id);           
       })->name($route);
   }   
});

$routes_delete = [
   'empleado_registerdelete',
   'usuario_registerdelete',
   'preguntas_registerdelete',
];

Route::prefix('/')->group(function () use ($routes_delete) {
   foreach ($routes_delete as $route) {                       
       Route::delete($route.'/{id}', function ($id) use ($route) {
            $deleteController = resolve(DeleteController::class);
            return $deleteController->delete(request(), $route, $id);           
       })->name($route);
   }   
});

Route::delete('/destroy_user/{id}', [RegisterManagerController::class, 'destroy'])->name('user_destroysent');
Route::delete('/destroy_empleado/{id}', [EmpleadosController::class, 'destroy'])->name('empleado_destroysent');

// START FILES
Route::get('avatar/{filename}', function ($filename) {
   $path = storage_path('public/' . $filename);
   dd($path); // Imprime el contenido de $columns y detiene la ejecución del código
   if (!File::exists($path)) {
       abort(404);
   }
   $file = File::get($path);
   $type = File::mimeType($path);
   $response = Response::make($file, 200);
   $response->header("Content-Type", $type);
   return $response;
})->name('avatar');
// END FILES