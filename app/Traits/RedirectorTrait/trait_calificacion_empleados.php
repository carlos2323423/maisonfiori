<?php
    use App\Models\Empleado;
    $spaces = $this->getTableColumns('empleados', false);
    // dd($spaces);
    $spacesTotal = $this->getTableColumns('empleados', true);
    // dd($spaces);
    $list = Empleado::all();    
    $lelementos = $this->page_elements('calificacion_empleados');
    $route_name = 'evaluacionadministrador';
    $name = 'evaluacionadministrador';
    $accionformsent = 'preguntas_registersent';
    $accionformupdate = 'preguntas_registerupdate';
    $accionformdelete = 'preguntas_registerdelete';
    $imageuser = 'https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg';
    $cuestionarioModal = false;
    $Modal_target = '#register_userModal';
    $form_data_toggle_list = 'cuestionario_Administrador_form';
    $viewvariables = [
        'title' => 'Welcome',                        
        'route_name' => $route_name,
        'name' => $name,
        'elementos' => $lelementos,
        'accionformsent' => $accionformsent,
        'accionformupdate' => $accionformupdate,
        'accionformdelete' => $accionformdelete,
        'imageuser' => $imageuser,
        'cuestionarioModal' => $cuestionarioModal,
        'Modal_target' => $Modal_target,
        'form_data_toggle_list' => $form_data_toggle_list,                  
    ];    
    return $viewvariables;
    