<script>    
    function ButtonDropdownValorSee(selectedvalor, id) {
        id_Dropdown = "ButtonDropdown_" + id;
        // input = "MODAL_id_" + id;
        input = "Input_Dropdown_id_" + id;        
        document.getElementById(id_Dropdown).textContent = ucfirst(id) + ': ' + selectedvalor;
        document.getElementById(input).value = selectedvalor;
    }

    function setDropdownValorSee(valor, space) {
        // Obtener el elemento del dropdown por su ID        
        Dropdown = "ListModalDropdown_" + space;
        var dropdown = document.getElementById(Dropdown);
        // Buscar el elemento dentro del dropdown que tiene el valor especificado
        var item = Array.from(dropdown.children).find(function(child) {
            return child.textContent.trim().toLowerCase() === valor.toLowerCase();
        });
        // Si se encontró el elemento, establecerlo como seleccionado
        if (item) {
            item.classList.add('active');
        }
        // Realizar otras acciones según el valor y el espacio recibidos
        // ...
    }

</script>

<!-- Agrega este script después del div del dropdown -->
<script>
    var competencias = ['Analítico', 'Competencia 1', 'Competencia 10', 'Competencia 2', 'Competencia 3', 'Competencia 4', 'Competencia 5', 'Competencia 6', 'Competencia 7', 'Competencia 8', 'Competencia 9', 'Dinámico', 'Liderazgo', 'Orientación al logro', 'Proactivo', 'Otros'];     

    function agregarOpcionesDropdown(competencias, selectedvalor, selectedOption) {
        competencias = JSON.parse(competencias);
        var dropdownMenu = document.getElementById("dropdown-menu_" + selectedOption);
        dropdownMenu.innerHTML = '';

        for (var i = 0; i < competencias.length; i++) {
            var competencia = competencias[i];
            (function (competencia) {
                var nuevaOpcion = document.createElement('a');
                nuevaOpcion.className = 'dropdown-item';
                nuevaOpcion.href = '#';
                nuevaOpcion.onclick = function() {
                    ButtonDropdownValorSee(competencia, selectedOption);
                    // Ocultar el dropdown después de seleccionar una opción
                    // dropdownMenu.style.display = 'none';
                };
                nuevaOpcion.appendChild(document.createTextNode(competencia));
                dropdownMenu.appendChild(nuevaOpcion);
            })(competencia);
        }

        var opcionOtros = document.createElement('a');
        opcionOtros.className = 'dropdown-item';
        opcionOtros.href = '#';
        opcionOtros.onclick = function() {
            ButtonDropdownValorSee('Otros', selectedOption);
            // Ocultar el dropdown después de seleccionar "Otros"
            // dropdownMenu.style.display = 'none';
        };
        opcionOtros.appendChild(document.createTextNode('Otros'));
        dropdownMenu.appendChild(opcionOtros);

        // Mostrar el dropdown después de agregar las opciones
        // dropdownMenu.style.display = 'block';
    }
</script>
