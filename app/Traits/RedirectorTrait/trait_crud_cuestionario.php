<?php
    use App\Models\Empleado;
    use App\Models\Pregunta;
    $spaces = $this->getTableColumns('preguntas', false);
    // dd($spaces);
    $spacesTotal = $this->getTableColumns('preguntas', true);
    // dd($spaces);
    $list = Empleado::all();      
    $lelementos = $this->page_elements('preguntas');
    $route_name = 'empleado';
    $name = 'empleado';
    $list_options = [
        'roles' => $hoteles = array(
            'recepcionista',
            'camarero',
            'cocinenero',
        ),
        'niveles' => $hoteles = array(
            'alto',
            'medio',
            'bajo',
        ),
        'hoteles' => $hoteles = array(
            'prado',
            'recoleta',
            'centro',
        ),
        'generoes' => $generos = array(
            'masculino',
            'femenino',                
        ),
    ];        
    // view()->share('spaces', $spaces);        
        
    $viewvariables = [
        'title' => 'Welcome',
        'list' => $list,
        'spaces' => $spaces,
        'spacesTotal' => $spacesTotal,
        'route_name' => $route_name,
        'name' => $name,
        'elementos' => $lelementos,
        'list_options' => $list_options,
    ];
    return $viewvariables;
    