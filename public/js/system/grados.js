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

    $("#nuevo_grado").click(async function (e) {
        e.preventDefault();
        var notice = new PNotify({
            title: '<span class="badge badge-light">Nuevo</span> Grado',
            text: $('#form_nuevo_grado').html(),
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
        var grado_numero = notice.get().find('select:eq(0)');
        var anio = $("#y-id");
        seccion_ajax(grado_numero, anio);

        await notice.get().on('pnotify.confirm', function () {
            var turno = $(this).find('input:eq(0)').is(':checked');
            var docente = $(this).find("#docente").val();
            var seccion = $(this).find('h1').text();
            if (turno) {
                turno = 1;
            } else {
                turno = 0;
            }

            $.ajax({
                type: 'post',
                url: '/atlas/public/grado/nuevo',
                data: {
                    lectivo: anio.val(),
                    turno: turno,
                    docente: docente,
                    grado: grado_numero.val(),
                    seccion: seccion,
                },
                success: function (r) {
                    console.log(r);
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
        url: '/atlas/public/grado/lista_grados',
        data: {
            id: id,
        },
        success: function (r) {
            var panel = $("#lista_grados > tbody");
            panel.empty();
            console.log(r);
            var correlativo = 1;
            $(r.grados).each(function (key, value) {
                var html = '<tr>' +
                    '<td>' + correlativo + '</td>' +
                    '<td>' + value.grado + '</td>' +
                    '<td>' + value.seccion + '</td>';
                if (value.turno) {
                    html += '<td><span class="badge badge-warning col-12">Matutino</span></td>';
                } else {
                    html += '<td><span class="badge badge-info col-12">Vespertino</span></td>';
                }
                if (value.f_profesor != null) {
                    html += '<td>' + r.docentes[key] + '</td>';
                } else {
                    html += '<td><span class="badge badge-light text-danger border-danger border">Sin docente</span></td>'
                }
                html += '<td>' +
                    '<div class="btn-group">' +
                    '<button type="button" class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Editar" onclick="editar_grado('+ value.id + ',' + value.turno + ',' + value.f_profesor +')"><i class="fas fa-edit"></i></button>' +
                    '</div>' +
                    '</td>';
                html += '</tr>';
                correlativo++;
                panel.append(html);
            });
        }
    });
}

function editar_grado(id, turno_actual, docente_actual) {
    var notice = new PNotify({
        title: '<span class="badge badge-primary">Editar</span> Grado',
        text: $('#form_editar_grado').html(),
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
    if (turno_actual == 1) {
        notice.get().find('input:eq(1)').prop('checked', false);
        notice.get().find('input:eq(0)').prop('checked', true);
    } else {
        notice.get().find('input:eq(0)').prop('checked', false);
        notice.get().find('input:eq(1)').prop('checked', true);
    }
    if (docente_actual != null) {
        notice.get().find("#docente").val(docente_actual);
    }
    notice.get().on('pnotify.confirm', function () {
        var turno = $(this).find('input:eq(0)').is(':checked');
        var docente = $(this).find("#docente").val();
        if (turno) {
            turno = 1;
        } else {
            turno = 0;
        }
        $.ajax({
            type: 'post',
            url: '/atlas/public/grado/editar',
            data: {
                id: id,
                turno: turno,
                docente: docente
            },
            success: function (r) {
                console.log(r);
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
    });
}

function buscar_seccion(o) {
    seccion_ajax($(o), $("#y-id"));
}

function seccion_ajax(grado, anio) {
    $.ajax({
        type: 'get',
        url: '/atlas/public/grado/seccion_siguiente',
        data: {
            grado: grado.val(),
            anio: anio.val(),
        },
        success: function (r) {
            var seccion = grado.parent('div').parent('div').parent('div').children('div:eq(1)').children('div').find('h1');
            seccion.text(r);
        }
    });
}
