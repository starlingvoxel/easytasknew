
    $(document).ready(function () {
        // Inicializar Select2 cuando se abre el modal
        $("#modal_tarea").on("shown.bs.modal", function () {
            $("#select-multiple").select2({
                dropdownParent: $("#modal_tarea")  // Esto asegura que el dropdown se muestre correctamente dentro del modal
            });
        });
    });
