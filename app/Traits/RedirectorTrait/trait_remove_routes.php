<?php
 $filteredRoutes = array_filter($urlsByMethod[$method], function ($route) use ($routes_filled) {
    return !in_array($route['lastSegment'], $routes_filled);
});
$urlsByMethod[$method] = $filteredRoutes;
return $urlsByMethod;