<script>
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