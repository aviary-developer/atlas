$("#tabla-permiso").on('click','#new_permiso',async function (e) {
    e.preventDefault();
    var profesor = $(this).data('value');
    var notice = new PNotify({
        title: '<span class="badge badge-light">Nuevo</span> Permiso',
        text: $('#form_nuevo_permiso').html(),
        icon: false,
        width: 'auto',
        hide: false,
        type: 'info',
        confirm: {
            buttons: [{
                text: "Aceptar"
            }, {
                text: "Cancelar"
            }],
            confirm: true
        },
        buttons: {
            closer: false,
            sticker: false
        },
        addclass: 'stack-modal',
        stack: {
            'dir1': 'down',
            'dir2': 'right',
            'modal': true
        },
        insert_brs: false
    });

    var fecha = moment().format('YYYY-MM-DD');

    notice.get().find('#fecha_inicio').val(fecha);
    notice.get().find('#fecha_final').val(fecha);

    await notice.get().on('pnotify.confirm', function () {
        var fecha_inicio = $(this).find("#fecha_inicio").val();
        var fecha_final = $(this).find("#fecha_final").val();
        var horas = $(this).find("#horas_nuevo").val();
        var categoria = $(this).find("#categoria").val();

        $.ajax({
            type: 'post',
            url: '/atlas/public/permisos',
            data: {
                fecha_inicio: fecha_inicio,
                fecha_final: fecha_final,
                horas: horas,
                categoria: categoria,
                f_profesor: profesor
            },
            success: function (r) {
                console.log(r);
                if (r == 1) {
                    sessionStorage.setItem('msg', 'msg');
                    location.reload();
                } else {
                    new PNotify({
                        type: 'error',
                        title: '¡Error!',
                        text: 'Algo salio mal'
                    });
                }
            }
        });
    });
});
