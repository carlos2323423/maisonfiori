<script>    
    function ButtonDropdownValorSee(selectedvalor, id) {
        generoDropdown = "ButtonDropdown_" + id;
        input = "MODAL_id_" + id;
        document.getElementById(generoDropdown).textContent = ucfirst(id) + ': ' + selectedvalor;
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