<?php
    use App\Models\Pregunta;
    $spaces = $this->getTableColumns('preguntas', false);
    // dd($spaces);
    $spacesTotal = $this->getTableColumns('preguntas', true);
    // dd($spaces);
    $list = Pregunta::all();      
    $lelementos = $this->page_elements('preguntas');
    $route_name = 'preguntas';
    $name = 'pregunta';
    $accionform = 'preguntas_registersent';
    $list_options = [
        'roles' => $roles = array(
            'recepcionista',
            'camarero',
            'cocinenero',
        ),
        'niveles' => $niveles = array(
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
        'typees' => $preguntas_type = array(
            'FACTORES DE DESEMPEÑO',
            'COMPETENCIAS LABORALES',                
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
        'accionform' => $accionform,
    ];
    return $viewvariables;
    