<script>
    function ucfirst(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    function setDropdownValor(selectedvalor, id) {
        generoDropdown = "generoDropdown_" + id;
        input = "MODAL_id_" + id;
        document.getElementById(generoDropdown).textContent = ucfirst(id) + ': ' + selectedvalor;
        document.getElementById(input).value = selectedvalor;
    }
</script>
<script>        
        function resturar_modal(acction) {
            var spaces = @json($spaces);
            console.log(spaces);                        
            // console.log(acction);
            @if ($errors->any())
                var valor_deretorno = input_typecheck(
                    getidsarray(
                        Object.values(
                            spaces)));
                var old = @json(old());
                console.log(old);
                for (const property in spaces) {
                    // console.log(property);
                    var column = spaces[property];
                    const elementId = "MODAL_id_" + column;
                    const element = document.getElementById(elementId);
                    if (!element) continue;
                    switch (column) {
                        case 'password':
                            const elementId2 = "Repeat_MODAL_id_" + column;
                            const element2 = document.getElementById(elementId2);
                            element.value = old[column];
                            element2.value = old[column];
                            break;
                        case 'foto':
                            let image = document.getElementById("MODAL_id_avatar");                                                            
                            image.src = "https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg";
                            element.value = old[column];
                            // inputfile_restaur(elementId);
                            break;
                        default:
                            element.value = old[column];
                            break;                            
                    }                    
                }                
            @else
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
                        // inputfile_restaur(elementId);
                    } else {
                        element.value = "";
                    }
                }
            @endif
            // inputfile_restaur(valor_deretorno['inputfile']);
            // cambia_metodo_form ('POST', acction);                     
        }

        function inputfile_restaur(IdElements) {            
            switch (typeof IdElements) {
                case 'object': {                        
                    for (const id of IdElements) {
                        const element = document.getElementById(id);
                        if (!element) break;
                        element.className = 'form-control d-none';
                        element.type = "file";
                    }
                    break;
                }
                case 'string': {
                    const element = document.getElementById(IdElements);
                    if (!element) break;
                    element.className = 'form-control d-none';
                    element.type = "file";
                    break;
                }
            }            
        }              

        function input_typecheck (IdElements) {                                    
            var valor_deretorno = {
                'inputfile': [],
                'readonly': [],
            };
            var typevar = typeof IdElements;
            console.log(typevar);
            switch (typevar) {
                case 'object': {          
                    for (const elementId of IdElements) {
                    // for (const [elementId, elementName] of IdElements) {
                        const element = document.getElementById(elementId);
                        if (!element) continue;
                        if (element.type === 'file') {                            
                            const elementName = element.name;
                            const elementclassName = element.className;
                            const containerElement = element.parentNode;
                            element.remove();
                            const newFileInput = document.createElement('input');
                            newFileInput.id = elementId;
                            newFileInput.name = elementName;
                            // newFileInput.className = elementclassName;
                            newFileInput.className = 'form-control';
                            // newFileInput.value = value;                                                        
                            console.log(newFileInput);
                            containerElement.appendChild(newFileInput);
                            valor_deretorno['inputfile'].push(elementId);
                            // valor_deretorno['file'] = elementId;
                        }
                        if (element.readOnly) {
                            valor_deretorno['readonly'].push(elementId);
                            // valor_deretorno['readonly'] = elementId;
                            console.log('El input es de solo lectura');
                        }                
                    }
                    break;
                }
                case 'string': {
                    const element = document.getElementById(IdElements);                    
                    if (!element) break;
                    const elementId = element.id;                    
                    if (element.type === 'file') {                        
                        const elementName = element.name;
                        const elementclassName = element.className;
                        const containerElement = element.parentNode;                        
                        element.remove();
                        const newFileInput = document.createElement('input');
                        newFileInput.id = elementId;
                        newFileInput.name = elementName;
                        // newFileInput.className = elementclassName;
                        newFileInput.className = 'form-control';
                        containerElement.appendChild(newFileInput);
                        valor_deretorno['inputfile'].push(elementId);
                        // valor_deretorno['file'] = elementId;
                    }
                    if (element.readOnly) {
                        valor_deretorno['readonly'].push(elementId);                        
                        console.log('El input es de solo lectura');
                    }
                    break;
                }
            }                                      
            return valor_deretorno;
        }

        function getidsarray(names) {                        
            // console.log(names);
            var ids = [];
            for (const value of names) {
                const elementId = `MODAL_id_${value}`;
                ids.push(elementId);
                // ids[elementId] = value;
                // ids.push([elementId, value]);
            }
            console.log(ids);
            // return Object.entries(ids);
            return ids;
        }

        function cambiaValores(acction, data) {                              
            var valor_deretorno = input_typecheck(
                getidsarray(
                    Object.keys(
                        data)));
            for (const [property, value] of Object.entries(data)) {
                if (property === 'id') continue;
                const elementId = `MODAL_id_${property}`;                
                const element = document.getElementById(elementId);
                if (!element) continue;                
                // if (!element) {
                //     console.log('NO EXISTE');
                // };                
                switch (property) {
                    case 'foto': {                        
                        const image = document.getElementById('MODAL_id_avatar');
                        image.src = `{{ asset('storage/') }}/${value}`;
                        element.value = value;
                        break;
                    }
                    case 'password': {                    
                        const element2 = document.getElementById(`Repeat_${elementId}`);
                        element.value = value;
                        element2.value = value;
                        break;
                    }
                    default: {  
                        element.value = value;
                        element.dispatchEvent(new Event('change'));                                          
                    }
                }
            }
            // inputfile_restaur(valor_deretorno['inputfile']);
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