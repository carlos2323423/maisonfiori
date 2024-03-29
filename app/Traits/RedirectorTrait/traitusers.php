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
    $accionformsent = 'usuario_registersent';
    $accionformupdate = 'usuario_registerupdate';
    $accionformdelete = 'usuario_registerdelete';
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
        'imageuser' => $imageuser,
        'Modal_target' => $Modal_target,
        'form_data_toggle_list' => $form_data_toggle_list,
    ];
    return $viewvariables;