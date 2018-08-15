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
            var valor = Number.parseInt(val);

            if (Number.isInteger(valor)) {
                $.ajax({
                    type: 'post',
                    url: '/atlas/public/grados',
                    data: {
                        anio: val,
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
    $('.btn-d').each(function () {
        $(this).removeClass('btn-info').addClass('btn-secundary');
    });
    $(objeto).removeClass('btn-secundary').addClass('btn-info');
    /**Impresion de grados */
    $.ajax({
        type: 'get',
        url: '/atlas/public/grados/grados',
        data: {
            id: id,
        },
        success: function (r) {
            var panel = $("#tablero-grado");
            panel.empty();
            console.log(r);
            $(r).each(function (key, value) {
                var html = '<div class="col-3 rounded text-center btn-light border">' +
                    '<div class="flex-row pt-3">';

                if (value.turno) {
                    html += '<span class="text-warning far fa-sun" style="font-size: 300%" data-toggle="tooltip" title="Matutino"></span>';
                } else {
                    html += '<span class="text-info far fa-sun" style="font-size: 300%" data-toggle="tooltip" title="Vespertino"></span>';
                }
                html += '</div>' +
                    '<div class="flex-row mt-2 border-bottom">' +
                    '<span class="font-weight-bold">' +
                    value.grado + ' ' + value.seccion +
                    '</span>' +
                    '</div>' +
                    '<div class="flex-row">';
                if (value.f_profesor != null) {
                    html += '<span class="font-sm">Prof. Alejandro Antonio</span>';
                } else {
                    html += '<span class="badge badge-danger">Sin docente</span>';
                }
                html += '</div>' +
                    '<div class="flex-row mb-2 btn-group">' +
                    '<button type="button" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></button>' +
                    '</div>' +
                    ' </div>';

                panel.append(html);
            });
        }
    });
}
