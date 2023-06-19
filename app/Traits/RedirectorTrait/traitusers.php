<?php
    use App\Models\User;
    $spaces = $this->getTableColumns('users', false);
    $spacesTotal = $this->getTableColumns('users', true);        
    // selection query        
    // dd($spaces);                
    $list = User::all();         
    $lelementos = $this->page_elements('ususarios');
    $route_name = 'usuario';
    $name = 'usuario';        
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