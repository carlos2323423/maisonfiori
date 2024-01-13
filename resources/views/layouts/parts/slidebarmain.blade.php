<!-- Sidebar -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html" style="height: 180px; width: 100%;">      
    <img src="{{ $stora_url . '/' . 'image/miason_logo.png' }}" alt='Icono' class='sidebar-brand-icon' style="width: 100%;">    
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interfaz
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Componentes</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Componentes Personalizados:</h6>
            <a class="collapse-item" href="buttons.html">Botones</a>
            <a class="collapse-item" href="cards.html">Tarjetas</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilidades</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Utilidades Personalizadas:</h6>
            <a class="collapse-item" href="utilities-color.html">Colores</a>
            <a class="collapse-item" href="utilities-border.html">Bordes</a>
            <a class="collapse-item" href="utilities-animation.html">Animaciones</a>
            <a class="collapse-item" href="utilities-other.html">Otras</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Add-ons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Páginas</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Otras Páginas:</h6>
            <a class="collapse-item" href="404.html">Página 404</a>
            <a class="collapse-item" href="blank.html">Página en blanco</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Páginas Personalizadas:</h6>
            <!-- <a class="collapse-item" href="http://127.0.0.1:8000/users">Usuarios</a>
            <a class="collapse-item" href="http://127.0.0.1:8000/empleados">Empleados</a>
            <a class="collapse-item" href="http://127.0.0.1:8000/cuestionarios">Cuestionarios</a>
            <a class="collapse-item" href="http://127.0.0.1:8000/preguntas">Preguntas</a>
            <a class="collapse-item" href="http://127.0.0.1:8000/hoteles">Hoteles</a>
            <a class="collapse-item" href="http://127.0.0.1:8000/clientes">Clientes</a>            -->
            @foreach ($routes['GET'] as $route)
                <a class="collapse-item" href="{{ $route['url'] }}">{{ $route['lastSegment'] }}</a>
            @endforeach

        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Gráficos</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item active">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tablas</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
