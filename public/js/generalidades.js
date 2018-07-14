$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    if (sessionStorage.getItem('msg')) {
        new PNotify({
            type: 'success',
            title: '¡Hecho!',
            text: 'Acción exitosa'
        });
    }
    sessionStorage.clear();

    $('#tablaIndex').DataTable();
} );
