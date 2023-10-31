<!DOCTYPE html>
<html>
<head>
    <title>FILL TABLES TOOL</title>
</head>
<body>
    <h1>Vista con botones</h1>

    <button type="button" onclick="accion_de_redireccion('fill_areas')">Filled Areas</button>    
    <button type="button" onclick="accion_de_redireccion('fill_hotels')">Filled Hoteles</button>
    <button type="button" onclick="accion_de_redireccion('fill_competencias')">Filled Competencias</button>
    <button type="button" onclick="accion_de_redireccion('fill_niveles')">Filled Niveles</button>
    <button type="button" onclick="accion_de_redireccion('fill_cargos')">Filled Cargos</button>
    <button type="button" onclick="accion_de_redireccion('fill_contexto_contratacion')">Filled Contexto Contratacion</button>        
    <button type="button" onclick="accion_de_redireccion('fill_contrataciones')">Filled Contrataciones</button>    
    <button type="button" onclick="accion_de_redireccion('fill_empleados')">Filled Empleados</button>
    <button type="button" onclick="accion_de_redireccion('fill_scaleniveles')">Filled ScaleNiveles</button>    
    <button type="button" onclick="accion_de_redireccion('fill_graphics')">Filled Graphics</button>
    <button type="button" onclick="accion_de_redireccion('fill_qrcode')">Filled QRCdes</button>    

    <script>        
        function accion_de_redireccion(opcion) {            
            switch (opcion) {
                case "fill_empleados":                    
                    window.location.href = '{{ route('fill_empleados') }}';
                    break;
                case "fill_hotels":
                    window.location.href = '{{ route('fill_hotels') }}';
                    break;
                case "fill_scaleniveles":
                    window.location.href = '{{ route('fill_scaleniveles') }}';                    
                    break;
                case "fill_areas":
                    window.location.href = '{{ route('fill_areas') }}';                    
                    break;
                case "fill_graphics":
                    window.location.href = '{{ route('fill_graphics') }}';
                    break;
                case "fill_qrcode":
                    window.location.href = '{{ route('fill_qrcode') }}';
                    break;                    
                case "fill_cargos":
                    window.location.href = '{{ route('fill_cargos') }}';
                    break;
                case "fill_competencias":
                    window.location.href = '{{ route('fill_competencias') }}';
                    break;      
                case "fill_niveles":
                    window.location.href = '{{ route('fill_niveles') }}';
                    break;                                    
                case "fill_contrataciones":           
                    window.location.href = '{{ route('fill_contrataciones') }}';
                    break;                    
                case "fill_contexto_contratacion":
                    window.location.href = '{{ route('fill_contexto_contratacion') }}';
                    break;                                              
                default:
                    console.log("Opción no válida");
            }
        }
        let opcion = "b";        
    </script>
</body>
</html>