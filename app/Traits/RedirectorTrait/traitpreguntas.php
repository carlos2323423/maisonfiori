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
    $accionformsent = 'preguntas_registersent';
    $accionformupdate = 'preguntas_registerupdate';
    $accionformdelete = 'preguntas_registerdelete';
    $stora_url = asset('storage/');
    $imageuser = 'https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg';
    $Modal_target = '#register_userModal';
    $form_data_toggle_list = 'register_list_form';
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
        'accionformsent' => $accionformsent,
        'accionformupdate' => $accionformupdate,
        'accionformdelete' => $accionformdelete,
        'stora_url' => $stora_url,
        'imageuser' => $imageuser,
        'Modal_target' => $Modal_target,
        'form_data_toggle_list' => $form_data_toggle_list,
    ];
    return $viewvariables;
    