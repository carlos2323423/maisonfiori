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
    $accionform = 'empleado_registersent';
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
        'accionform' => $accionform,
    ];
    return $viewvariables;
    