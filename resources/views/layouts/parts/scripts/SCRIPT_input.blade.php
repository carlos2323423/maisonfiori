<script>
    function getElementTypeById(elementId) {
        const element = document.getElementById(elementId);
        if (element) {
            return element.tagName.toLowerCase();
        }
        return null;
    }

    function inputfile_delete(id, parent) {
        element = document.getElementById(id);
        if (parent == true) {
            const containerElement = element.parentNode;                        
            containerElement.remove();
        } else {
            element.remove();
        }
    }
    
    function inputfile_create(containerElement, type, sub, name, value, className) {        
        const elementId = "Id_" + type + "_Extra_" + name;        
        existe = document.getElementById(elementId);
        if (existe) {
        // El elemento existe en el DOM       
            if (type !== getElementTypeById(elementId)) {            
                inputfile_replace(elementId, type);
                existe = document.getElementById(elementId);
                type = getElementTypeById(elementId);
            }
            const elementName = "Name_" + type + "_Extra_" + name;
            existe.id = elementId;
            existe.name = elementName;
            existe.className = className;                                                
            existe.type = sub;
            existe.value = value;    
            existe.readOnly = true;   
            if (type == 'spam') {
                existe.style.display = "block";
                existe.style.textAlign = "center";
                existe.textContent = value;
            }            
        } else {
            // El elemento no existe en el DOM
            const elementName = "Name_" + type + "_Extra_" + name;        
            const newFileInput1 = document.createElement("div");            
            newFileInput1.className = 'col-sm-6 mb-3 mb-sm-0'; 
            const newFileInput2 = document.createElement(type);        
            newFileInput2.id = elementId;
            newFileInput2.name = elementName;
            newFileInput2.className = className;                                                
            newFileInput2.type = sub;
            newFileInput2.value = value;    
            newFileInput2.readOnly = true;   
            if (type == 'spam') {
                newFileInput2.style.display = "block";
                newFileInput2.style.textAlign = "center";
                newFileInput2.textContent = value;
            }
            containerElement.appendChild(newFileInput1);        
            newFileInput1.appendChild(newFileInput2);        
        }
    }

    function inputfile_replace (IdElements, type) {
        const element = document.getElementById(elementId);
        const elementName = element.name;
        const elementclassName = element.className;
        const containerElement = element.parentNode;                        
        element.remove();
        const newFileInput = document.createElement(type);
        newFileInput.id = elementId;
        newFileInput.name = elementName;
        newFileInput.className = elementclassName;
        containerElement.appendChild(newFileInput);                
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
                    const element = document.getElementById(elementId);
                    if (!element) continue;
                    if (element.type === 'file') {                            
                        const elementName = element.name;
                        element.classList.remove('d-none');
                        const elementclassName = element.className;
                        const containerElement = element.parentNode;
                        element.remove();
                        const newFileInput = document.createElement('input');
                        newFileInput.id = elementId;
                        newFileInput.name = elementName;
                        newFileInput.className = elementclassName;                                                
                        newFileInput.type = 'text';
                        // newFileInput.value = value;                                                        
                        // console.log(newFileInput);
                        // containerElement.appendChild(newFileInput);
                        containerElement.replaceChild(newFileInput, element);
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

</script>