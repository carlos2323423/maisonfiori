<?php
    use App\Models\Graphic;
    use App\Charts\Charts;

    $spaces = $this->getTableColumns('usuarios', false);
    $spacesTotal = $this->getTableColumns('usuarios', true);

    // START CONFIGURACIÓN DE LOS GRÁFICOS E IMPORTACIONES
    $chart = new Charts;
    $list = Graphic::all();
    $this->getChartFunctions($chart, 'line', ['Jan', 'Feb', 'Mar'], 'Users by trimester', [10, 25, 13]);
    // END CONFIGURACIÓN DE LOS GRÁFICOS E IMPORTACIONES

    $lelementos = $this->page_elements('welcome');
    $route_name = 'welcome';
    $name = 'welcome';
    $accionformsent = 'welcome_registersent';
    $accionformupdate = 'welcome_registerupdate';
    $accionformdelete = 'welcome_registerdelete';
    $stora_url = asset('storage/');

    // START PYTHON
    // END PYTHON

    $django = [
        'charts' => $charts = array(
            file_get_contents('http://127.0.0.1:8080/obtener_grafico/'),
        ),
    ];

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
        'chart' => $chart,
        'django' => $django,
    ];

    return $viewvariables;
