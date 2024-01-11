<?php
use App\Models\Pregunta;
use App\Models\Competencia;
use App\Models\FactoresDesempeno;
use Illuminate\Support\Facades\Route;

$routes = Route::getRoutes();
// dd($routes);
$routes = collect($routes);
// $redirectsURLS = [];
// foreach ($routes as $route) {
//     $redirectsURLS[] = url($route->uri());
// }    
// $urlsCollection = $routes->map($redirectsURLS);            
// $redirects = $urlsCollection->toArray();
$routeUrls = $routes->map(function ($route) {
    // return url($route->uri());
    return [
        'url' => url($route->uri()),
        'method' => $route->methods()[0], // Tomar el primer método (puede haber varios, pero por simplicidad tomamos el primero)        

        // Obtener la parte después de la última barra inclinada
        'lastSegment' => ltrim(strrchr(url($route->uri()), '/'), '/'),
    ];
});
$groupedRoutes = $routeUrls->groupBy('method')->toArray();
$urlsByMethod = [];
// foreach ($groupedRoutes as $method => $routes) {
//     $urlsByMethod[$method] = array_column($routes, 'url');
// }
foreach ($groupedRoutes as $method => $routes) {
    $urlsByMethod[$method] = array_map(function ($route) {
        return [
            'url' => $route['url'],
            'lastSegment' => $route['lastSegment'],
        ];
    }, $routes);
}
$routes_filled = [
    'fill_empleados',
    'fill_hotels',
    'fill_scaleniveles',
    'fill_areas',      
    'fill_graphics',
    'fill_qrcode',   
    'fill_competencias',
    'fill_niveles',
    'fill_cargos',
    'fill_contrataciones',
    'fill_contexto_contratacion',
    'fill_escala_atributo',
    'fill_escala_calificacions',
    'fill_factoresdesempeno',
];

$filteredRoutes = array_filter($urlsByMethod['GET'], function ($route) use ($routes_filled) {
    return !in_array($route['lastSegment'], $routes_filled);
});

// Puedes asignar el resultado filtrado a $routes['GET'] si deseas modificar el array original.
$urlsByMethod['GET'] = $filteredRoutes;

// Ahora $routes['GET'] solo contiene elementos que no tienen los valores prohibidos en 'lastSegment'.
// dd($urlsByMethod);
return $urlsByMethod;