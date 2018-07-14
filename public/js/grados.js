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
            if (Number.isInteger(val)) {
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
                                text: '¡Guardado!'
                            });
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
            } else {
                new PNotify({
                    type: 'error',
                    title: 'Error',
                    text: 'Ingrese un número valido'
                });
            }
        }).on('pnotify.cancel', function () {

        });
    });

    $("#sw-activo").on('change', function () {
        if ($("#sw-activo").is(":checked")) {
            texto = "¿Estas seguro que deseas activar este año?";
        } else {
            texto = "¿Estas seguro que deseas desactivar este año?";
        }
        (new PNotify({
            title: 'Cambiar año activo',
            text: texto,
            icon: false,
            type: 'info',
            hide: false,
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
            history: {
                history: false
            },
            addclass: 'stack-modal',
            stack: {
                'dir1': 'down',
                'dir2': 'right',
                'modal': true
            }
        })).get().on('pnotify.confirm', function () {
            $.ajax({
                type: 'post',
                url: '/atlas/public/grados/activar',
                data: {
                    id: $("#y-id").val(),
                },
                success: function (r) {
                    if (r == 1) {
                        sessionStorage.setItem('msg', 'msg');
                        location.reload(true);
                    } else {
                        new PNotify({
                            type: 'error',
                            title: '¡Error!',
                            text: 'Algo salio mal'
                        });
                    }
                }
            });
        }).on('pnotify.cancel', function () {
            console.log($("#sw-activo").prop("checked"));
            if (!$("#sw-activo").is(":checked")) {
                // $("#sw-activo").
                $("#sw-activo").prop('checked', true);
            } else {
                $("#sw-activo").prop('checked', false);
                console.log($("#sw-activo").prop("checked"));
            }
        });
    });
});

function selected_year(year, id, estado, objeto) {
    $("#y-id").val(id);
    var b_year = $("#b-year");
    b_year.text(year);
    if (estado == false) {
        $("#sw-activo").prop('checked', true);
    } else {
        $("#sw-activo").prop('checked',false);
    }
    $('.btn-info').each(function () {
        $(this).removeClass('btn-info').addClass('btn-secundary');
    });
    $(objeto).removeClass('btn-secundary').addClass('btn-info');
}
