<?php
    use App\Models\Empleado;
    $spaces = $this->getTableColumns('empleados', false);
    // dd($spaces);
    $spacesTotal = $this->getTableColumns('empleados', true);
    // dd($spaces);
    $list = Empleado::all();      
    $lelementos = $this->page_elements('empleados');
    $route_name = 'empleado';
    $name = 'empleado';
    $accionformsent = 'empleado_registersent';
    $accionformupdate = 'empleado_registerupdate';
    $imageuser = 'https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg';
    $list_options = [
        'cargoes' => $cargoes = array(
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
        'superiores' => $superiores = array(
            'Pedro Perez',
            'Mario Lopez',                
        ),
        'areaes' => $areaes = array(
            'cocina',
            'piso 1',                
            'recepcion',                
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
        'accionformsent' => $accionformsent,
        'accionformupdate' => $accionformupdate,        
        'imageuser' => $imageuser,
    ];
    return $viewvariables;
    