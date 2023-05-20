<script>
    function setDropdownValor(genero, id) {
        document.getElementById(id).value = genero;
    }
</script>
<script>        
        function resturar_modal(acction) {
            // console.log(acction);
            {{--
                --}}
                
                var spaces = @json($spaces);
            for (const property in spaces) {
                const elementId = "MODAL_id_" + spaces[property];
                const element = document.getElementById(elementId);
                if (!element) continue;
                if (spaces[property] === 'password') { 
                const elementId2 = "Repeat_MODAL_id_" + spaces[property];
                const element2 = document.getElementById(elementId2);
                element.value = "";
                element2.value = "";
                } else if (spaces[property] === 'foto') {  
                let image = document.getElementById("MODAL_id_avatar");                                                            
                image.src = "https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" ;
                foto_restaur(elementId);
                } else {
                element.value = "";
                }
            }            
            // cambia_metodo_form ('POST', acction);                     
        }

        function foto_restaur(id) {
            const element = document.getElementById(id);            
            element.type = "file";                            
        }                      

        function cambiaValores(acction, data) {            
            for (const [property, value] of Object.entries(data)) {
                if (property === 'id') continue;
                const elementId = `MODAL_id_${property}`;
                const element = document.getElementById(elementId);
                if (!element) continue;
                switch (property) {
                    case 'foto': {
                        const image = document.getElementById('MODAL_id_avatar');
                        image.src = `{{ asset('storage/') }}/${value}`;
                        break;
                    }
                    case 'password': {                    
                        const element2 = document.getElementById(`Repeat_${elementId}`);
                        element.value = value;
                        element2.value = value;
                        break;
                    }
                    default: {                    
                        const inputType = element.type;
                        if (inputType === 'file') {
                            element.remove();
                            const newFileInput = document.createElement('input');
                            newFileInput.id = elementId;
                            newFileInput.name = property;
                            newFileInput.className = 'form-control d-none';
                            newFileInput.value = value;
                            const form = document.getElementById('foto_imputcontainer');
                        form.appendChild(newFileInput);
                        } else {
                            // console.log(element, typeof value);
                            if (element.readOnly) {
                                console.log('El input es de solo lectura');
                            } else {
                                // console.log('El input no es de solo lectura');
                                // console.log(element, element.value);
                                element.value = value;
                                element.dispatchEvent(new Event('change'));
                            }
                        }
                    }
                }
            }
            cambia_metodo_form ('PUT', acction);            
        }

        function cambia_metodo_form(method, action) {
            console.log(method, action);
            const edit_list_form = document.getElementById("register_list_form");
            edit_list_form.method = "POST";
            
            console.log(`<input type="hidden" name="_method" value="${method}">`);
            // edit_list_form.innerHTML += `<input type="hidden" name="_method" value="${method}">`;
            var methodField = document.createElement("input");
            methodField.setAttribute("type", "hidden");
            methodField.setAttribute("name", "_method");
            methodField.setAttribute("value", method);
            edit_list_form.appendChild(methodField);
            edit_list_form.action = action;
        }



    </script>

    <script>
        // Obtener el elemento dropzone
        var dropzone = document.getElementById('dropzone');

        // Manejar el evento 'dragover' para permitir soltar
        dropzone.addEventListener('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.add('dragover');
        });

        // Manejar el evento 'dragenter' para resaltar el dropzone
        dropzone.addEventListener('dragenter', function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.add('dragover');
        });

        // Manejar el evento 'dragleave' para quitar el resaltado del dropzone
        dropzone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.remove('dragover');
        });

        // dropzone.addEventListener('drop', function(e) {
            //     e.preventDefault();
            //     e.stopPropagation();
            //     dropzone.classList.remove('dragover');
            
            //     // Obtener los archivos soltados
            //     var files = e.dataTransfer.files;
            
            //     // Iterar sobre los archivos y realizar la acción deseada
            //     for (var i = 0; i < files.length; i++) {
                //         // Realizar la acción deseada con el archivo
                //     }
                // });
        // Manejar el evento 'drop' para manejar los archivos soltados
        dropzone.addEventListener('drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.remove('dragover');

            // Verificar si hay solo un archivo
            if (e.dataTransfer.files.length !== 1) {
                alert("Solo se permite un archivo a la vez");
                return;
            }

            // Si solo hay un archivo, continuar con la lógica del evento
            var file = e.dataTransfer.files[0];
            // Realizar la acción deseada con el archivo
            // Obtener los archivos soltados            
            
            // Agregar el archivo al objeto FormData
            var formData = new FormData();
            formData.append('foto', file);
    
        });

    </script>
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