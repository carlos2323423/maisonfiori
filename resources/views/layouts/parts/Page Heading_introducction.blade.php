<h1 class="h3 mb-2 text-gray-800"> 
    {{ ucfirst($name); }}s
</h1>

<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.For more information about DataTables, please visit the 
    <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
</p>
{{-- 
    {{ dd($spaces); }}
    {{ dd(route($route_name.'_registersent')) }}
--}}

<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#" data-toggle="modal" data-target="#register_userModal" onclick="resturar_modal('{{ route($accionformsent) }}')">
    <i class="fas fa-user fa-sm text-white-50"></i> 
    {{ "Agregar " . strtolower($name); }}
</a>
