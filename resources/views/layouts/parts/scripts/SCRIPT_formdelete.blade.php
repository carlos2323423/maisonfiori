<script>    
    function showConfirmationPopup(id_form) {
        Swal.fire({
            title: 'Confirmar eliminación',
            text: '¿Desea eliminar este elemento? Esta operación es irreversible.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, envía el formulario de eliminación
                document.getElementById(id_form).submit();
            }
        });
    }
</script>