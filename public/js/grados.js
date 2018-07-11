$(document).ready(function () {
    $("#new-lectivo").on("click", function (e) {
        e.preventDefault();
        (new PNotify({
            title: '<span class="badge badge-light">Nuevo</span> Año Lectivo',
            text: 'Ingrese el nuevo año lectivo',
            icon: false,
            type: 'info',
            hide: false,
            confirm: {
                buttons: [{
                    text: "Guardar"
                }, {
                    text: "Cancelar"
                }],
                prompt: true
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            },
            addclass: 'stack-modal',
            stack: {
                'dir1': 'down',
                'dir2': 'right',
                'modal': true
            }
        })).get().on('pnotify.confirm', function (e, notice, val) {
            $.ajax({
                type: 'post',
                url: '/atlas/public/grados',
                data: {
                    anio: val,
                },
                success: function (r) {
                    if (r == 1) {
                        new PNotify({
                            type: 'success',
                            text: 'Guardado'
                        })
                    } else {
                        new PNotify({
                            type: 'error',
                            text: 'Guardado'
                        })
                    }
                }
            });
            console.log();
        }).on('pnotify.cancel', function () {

        });
    });
});
