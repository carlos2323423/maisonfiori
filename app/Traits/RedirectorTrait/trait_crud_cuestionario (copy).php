<?php    
    use App\Models\CamposDeEvaluacion;
    $routes = $this->get_routes(true);
    $spaces = $this->getTableColumns('campos_de_evaluacions', false);
    // dd($spaces);
    $spacesTotal = $this->getTableColumns('campos_de_evaluacions', true);
    // dd($spaces);
    $list = CamposDeEvaluacion::all();    
    $lelementos = $this->page_elements('crud_cuestionario');
    $route_name = 'empleado';
    $name = 'empleado';
    $accionformsent = 'empleado_registersent';
    $accionformupdate = 'empleado_registerupdate';
    $accionformdelete = 'empleado_registerdelete';
    $stora_url = asset('storage/');
    $imageuser = 'https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg';
    $cuestionarioModal = true;
    $Modal_target = '#register_userModal';
    $form_data_toggle_list = 'cuestionario_Administrador_form';
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
        'accionformsent' => $accionformsent,
        'accionformupdate' => $accionformupdate,
        'accionformdelete' => $accionformdelete,
        'stora_url' => $stora_url,
        'imageuser' => $imageuser,
        'cuestionarioModal' => $cuestionarioModal,
        'Modal_target' => $Modal_target,
        'form_data_toggle_list' => $form_data_toggle_list,
        'routes' => $routes,
    ];
    return $viewvariables;
    