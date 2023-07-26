<script>
    function clear_errors() {
        location.reload();
    }
    function resturar_modal(acction) {        
        if (document.getElementById('Id_spam_Extra_foto-preview')) {
            inputfile_delete('Id_spam_Extra_foto-preview', true);
        }
        var spaces = @json($spaces);
        
        @if ($errors->any())
            var old = @json(old());
            console.log(old);
            for (const property in spaces) {
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
                        image.src = old['imageuser'];                        
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
                    image.src = "https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg";
                } else {
                    element.value = "";
                }
            }
        @endif
        
        cambia_metodo_form('POST', acction);
    }

    
    function cambiaValores(acction, data, form_id) {        
        // var valor_deretorno = input_typecheck(getidsarray(Object.keys(data)));
        var list_options = @json($list_options);

        for (const [property, value] of Object.entries(data)) {
            if (property === 'id') continue;

            const elementId = `MODAL_id_${property}`;
            const element = document.getElementById(elementId);

            if (!element) continue;

            switch (property) {
                case 'foto': {
                    const image = document.getElementById('MODAL_id_avatar');
                    image.src = `{{ asset('storage/') }}/${value}`;
                    const elementName = element.name;
                        const elementclassName = element.className;                        
                        containerElement = element.parentNode;                        
                        containerElement = containerElement.parentNode;                        
                        inputfile_create(containerElement, 'spam', '', 'foto-preview', value, '');
                        // element.value = value;
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

                    if (list_options[property + 'es']) {
                        ButtonDropdownValorSee(value, property);
                    }

                    element.dispatchEvent(new Event('change'));
                }
            }
        }

        // inputfile_restaur(valor_deretorno['inputfile']);
        cambia_metodo_form('PUT', acction, form_id);
    }

    function cambia_metodo_form(method, action, form_id) {
        console.log(method, action);
        const edit_list_form = document.getElementById(form_id);
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