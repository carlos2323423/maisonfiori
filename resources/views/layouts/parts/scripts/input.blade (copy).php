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

</script>