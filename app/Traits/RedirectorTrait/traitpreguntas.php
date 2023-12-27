<?php
    use App\Models\Pregunta;
    use App\Models\Competencia;
    use App\Models\FactoresDesempeno;
    $spaces = $this->getTableColumns('preguntas', false);
    // dd($spaces);
    $spacesTotal = $this->getTableColumns('preguntas', true);
    // dd($spaces);
    $register_buttons = false;
    $list = Pregunta::all();    
    $competencias = Competencia::all();
    $factoresdesempeno_names = FactoresDesempeno::all();
    $competencias_names = Competencia::pluck('name')->toArray();
    $factoresdesempeno_names = FactoresDesempeno::pluck('name')->toArray();
    // dd($factoresdesempeno_names);
    // dd($competencias);
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
        // 'areas_de_evaluaciones' => [],
        'areaable_typees' => [],        
    ];
    $dropdown2 = 'areas_de_evaluacion';
    // dd($list_options); 
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
        'register_buttons' => $register_buttons,
        'competencias_names' => $competencias_names,
        'factoresdesempeno_names' => $factoresdesempeno_names,
        'dropdown2' => $dropdown2,        
    ];
    return $viewvariables;
    