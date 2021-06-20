$(document).ready(function() {
    $('#patientTable').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Sin registros encontrados",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No existen registros",
            "search": "Buscar:",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente",
            }
        }
    } );

    
} );