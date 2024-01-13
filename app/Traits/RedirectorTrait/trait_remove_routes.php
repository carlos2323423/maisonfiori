<?php
// el campo ya es definido en la funcion antes de trait anote esta igualdad a modo de recodatorio y para que no me senale el error
$routes_filled = $routes_filled;
 $filteredRoutes = array_filter($urlsByMethod[$method], function ($route) use ($routes_filled) {
    return !in_array($route['lastSegment'], $routes_filled);
});
$urlsByMethod[$method] = $filteredRoutes;
return $urlsByMethod;