<?php        
    use App\Models\Graphic;
    $spaces = $this->getTableColumns('usuarios', false);
    $spacesTotal = $this->getTableColumns('usuarios', true);        
    // selection query        
    // dd($spaces);                
    $list = Graphic::all();
    $lelementos = $this->page_elements('welcome');
    $route_name = 'welcome';
    $name = 'welcome';        
    $accionformsent = 'welcome_registersent';
    $accionformupdate = 'welcome_registerupdate';
    $accionformdelete = 'welcome_registerdelete';
    $stora_url = asset('storage/');
    $imageuser = 'https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg';
    $Modal_target = '#register_userModal';
    $form_data_toggle_list = 'register_list_form';
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
        'accionformsent' => $accionformsent,
        'accionformupdate' => $accionformupdate,
        'accionformdelete' => $accionformdelete,
        'stora_url' => $stora_url,
        'imageuser' => $imageuser,
        'Modal_target' => $Modal_target,
        'form_data_toggle_list' => $form_data_toggle_list,
    ];
    return $viewvariables;