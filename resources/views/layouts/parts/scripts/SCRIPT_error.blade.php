@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el elemento                
            var registerModalTrigger = document.querySelector('[data-target="#register_userModal"]');                            
            // Guardar el valor actual del atributo onclick
            var originalOnClick = registerModalTrigger.onclick;
            // Eliminar el atributo onclick
            registerModalTrigger.onclick = null;
            // Crear un nuevo evento de clic
            // var clickEvent = new Event('click');
            // Disparar el evento de clic en el elemento
            // registerModalTrigger.dispatchEvent(clickEvent);
            registerModalTrigger.click();      
            // Restaurar el valor original del atributo onclick
            registerModalTrigger.onclick = originalOnClick;
        });
    </script>
@endif