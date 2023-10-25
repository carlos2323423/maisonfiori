<!DOCTYPE html>
<html>
<head>
    <title>Vista con botones</title>
</head>
<body>
    <h1>Vista con botones</h1>

    <button type="button" onclick="accion_de_redireccion('fill_hotels')">Filled Hoteles</button>
    <button type="button" onclick="accion_de_redireccion('fill_nivels')">Filled Niveles</button>    
    <button type="button" onclick="accion_de_redireccion('fill_areas')">Filled Areas</button>    
    <button type="button" onclick="accion_de_redireccion('fill_empleados')">Filled Empleados</button>
    <button type="button" onclick="accion_de_redireccion('fill_graphics')">Filled Graphics</button>

    <script>        
        function accion_de_redireccion(opcion) {            
            switch (opcion) {
                case "fill_empleados":                    
                    window.location.href = '{{ route('fill_empleados') }}';
                    break;
                case "fill_hotels":
                    window.location.href = '{{ route('fill_hotels') }}';
                    break;
                case "fill_nivels":
                    window.location.href = '{{ route('fill_nivels') }}';                    
                    break;
                case "fill_areas":
                    window.location.href = '{{ route('fill_areas') }}';                    
                    break;
                case "fill_graphics":
                    window.location.href = '{{ route('fill_graphics') }}';
                    break;
                default:
                    console.log("Opción no válida");
            }
        }
        let opcion = "b";        
    </script>
</body>
</html>