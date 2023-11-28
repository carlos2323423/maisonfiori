<?php
    use App\Models\Empleado;
    use App\Models\Competencia;
    use App\Models\FactoresDesempeno;
    use App\Models\EscalaCalificacion;

    // Obtener las columnas de la tabla 'empleados' sin incluir las totales
    $spaces = $this->getTableColumns('empleados', false);

    // Obtener todas las columnas de la tabla 'empleados', incluyendo las totales
    $spacesTotal = $this->getTableColumns('empleados', true);
    $competencias = Competencia::all();
    $empleados = Empleado::all();    
    $empleado = Empleado::where('firstname', 'Ana')
                    ->where('lastname', 'García')
                    ->first();
    $empleadosuper = $empleado->superior_id->firstname;
    // dd($empleadosuper);
    $FactoresDesempeno = FactoresDesempeno::all();
    $escalacalificacion = EscalaCalificacion::all();    
    $escalaCompetencias = EscalaCalificacion::where('name', 'Escala Competencias')->first();
    $escalaFactoresDesempeno = EscalaCalificacion::where('name', 'Escala Factores Desempeno')->first();    
    $lelementos = $this->page_elements('calificacion_empleados');    
    $route_name = $name = 'evaluacionadministrador';
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
        'competencias' => $competencias,
        'FactoresDesempeno' => $FactoresDesempeno,        
        'escalacalificacion' => $escalacalificacion,
        'escalaCompetencias' => $escalaCompetencias,
        'escalaFactoresDesempeno' => $escalaFactoresDesempeno,
        'empleado' => $empleado,        
    ];    
    return $viewvariables;
    