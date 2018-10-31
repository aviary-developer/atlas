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

    $('.a-table').DataTable();

    $(":input").inputmask();
} );
function convertirFormatoFecha(string) {
       var info = string.split('-').reverse().join('/');
       return info;
}

$("[data-tooltip = 'tooltip']").tooltip();
