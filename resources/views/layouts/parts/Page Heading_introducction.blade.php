<h1 class="h3 mb-2 text-gray-800">
    {{ ucfirst($name) }}s
</h1>

<p class="mb-4">
    DataTables es un complemento de terceros que se utiliza para generar la tabla de demostración a
    continuación. Para obtener más información sobre DataTables, visita la
    <a target="_blank" href="https://datatables.net">documentación oficial de DataTables</a>.
</p>
{{--
{{ dd($spaces); }}
{{ dd(route($route_name.'_registersent')) }}
--}}

<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="#" data-toggle="modal"
    data-target="#register_userModal" onclick="resturar_modal('{{ route($accionformsent) }}')">
    <i class="fas fa-user fa-sm text-white-50"></i>
    {{ "Agregar " . strtolower($name) }}
</a>