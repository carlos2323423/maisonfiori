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

<!-- <script>    
    function cambiarOpcionesDropdown2(factores, competencias) {
        // Obtener el valor seleccionado en el primer dropdown
        var selectedOption = document.getElementById("dropdown1").value;

        // Obtener el segundo dropdown
        // var dropdown2 = document.getElementById("dropdown2");
        var dropdown2 = document.getElementById("dropdown-menu_name");        

        // Limpiar las opciones existentes en el segundo dropdown
        dropdown2.innerHTML = '';

        // Agregar nuevas opciones al segundo dropdown según la selección en el primero
        switch (selectedOption) {
            case 'FACTORES DE DESEMPEÑO':
                agregarOpcionDropdown2('Opción A1', 'valorA1');
                agregarOpcionDropdown2('Opción A2', 'valorA2');
                break;
            case 'COMPETENCIAS LABORALES':
                agregarOpcionDropdown2('Opción B1', 'valorB1');
                agregarOpcionDropdown2('Opción B2', 'valorB2');
                break;
            // Agrega más casos según sea necesario
            <div class="dropdown-menu show" aria-labelledby="ListModalDropdown_name" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start" id="dropdown-menu_name">            
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Analítico', 'name')">Analítico</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Competencia 1', 'name')">Competencia 1</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Competencia 10', 'name')">Competencia 10</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Competencia 2', 'name')">Competencia 2</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Competencia 3', 'name')">Competencia 3</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Competencia 4', 'name')">Competencia 4</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Competencia 5', 'name')">Competencia 5</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Competencia 6', 'name')">Competencia 6</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Competencia 7', 'name')">Competencia 7</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Competencia 8', 'name')">Competencia 8</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Competencia 9', 'name')">Competencia 9</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Dinámico', 'name')">Dinámico</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Liderazgo', 'name')">Liderazgo</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Orientación al logro', 'name')">Orientación al logro</a>
                                    <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Proactivo', 'name')">Proactivo</a>
                                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" onclick="ButtonDropdownValorSee('Otros', 'name')">Otros</a>
            </div>
        }
    }

    function agregarOpcionDropdown2(texto, valor) {
        var opcion = document.createElement('option');
        opcion.text = texto;
        opcion.value = valor;
        document.getElementById('dropdown2').add(opcion);
    }
</script> -->

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
