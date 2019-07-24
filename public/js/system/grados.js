$(document).ready(function () {
    $("#save_it").click(function (e) {
        e.preventDefault();
        var valor = $("#anio_nuevo_input").val();
        $.ajax({
            type: 'post',
            url: '/atlas/public/grados',
            data: {
                anio: valor,
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

    $("#asignatura_show_table").on("change", "#sw-add", function () {
        if ($("#ciclo").val() == "3") {
            var badge = $(this).parent('label').parent('td').parent('tr').find('td:eq(4)').find('span');
            var celda_responsable = $(this).parent('label').parent('td').parent('tr').find('td:eq(2)');
            var grado = $("#id-g").val();
            var asignatura = $(this).data('value');
            var tipo = 1;

            if ($(this).is(':checked')) {
                badge.removeClass('border-danger text-danger').addClass('border-success text-success').text('Activa');
            } else {
                badge.removeClass('border-success text-success').addClass('border-danger text-danger').text('Inactiva');
                celda_responsable.empty().append('<span class="badge border border-danger text-danger"> Agregue la asignatura</span > <span class="badge badge-danger"><i class="fas fa-arrow-right"></i></span>');
                tipo = 0;
            }

            $.ajax({
                type: 'post',
                url: '/atlas/public/grado/agregar_asignatura',
                data: {
                    grado: grado,
                    asignatura: asignatura,
                    tipo: tipo
                },
                success: function (r) {
                    if (r.ids != 0) {
                        new PNotify({
                            type: 'success',
                            title: '¡Hecho!',
                            text: 'Acción exitosa'
                        });
                        if (r.ids != -1) {
                            celda_responsable.empty();
                            var html_ = '<select class="form-control form-control-sm" id="asesor-select-' + r.ids + '" data-value="'+r.ids+'"></select>';
                            celda_responsable.append(html_);
                            html_ = '<option value=null>Ninguno</option>';
                            $("#asesor-select-" + r.ids).append(html_);
                            $(r.docentes).each(function (k, v) {
                                html_ = '<option value="'
                                    + v.id + '">' + v.nombre + ' ' + v.apellido + '</option>';
                                $("#asesor-select-" + r.ids).append(html_);
                            });
                        }
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
            var badge = $(this).parent('label').parent('td').parent('tr').find('td:eq(3)').find('span');

            var grado = $("#id-g").val();
            var asignatura = $(this).data('value');
            var tipo = 1;

            if ($(this).is(':checked')) {
                badge.removeClass('border-danger text-danger').addClass('border-success text-success').text('Activa');
            } else {
                badge.removeClass('border-success text-success').addClass('border-danger text-danger').text('Inactiva');

                tipo = 0;
            }

            $.ajax({
                type: 'post',
                url: '/atlas/public/grado/agregar_asignatura',
                data: {
                    grado: grado,
                    asignatura: asignatura,
                    tipo: tipo
                },
                success: function (r) {
                    if (r.ids != 0) {
                        new PNotify({
                            type: 'success',
                            title: '¡Hecho!',
                            text: 'Acción exitosa'
                        });
                    } else {
                        new PNotify({
                            type: 'error',
                            title: '¡Error!',
                            text: 'Algo salio mal'
                        });
                    }
                }
            });
        }
    });

    $("#asignatura_show_table").on('change', "select", function (e) {
        e.preventDefault();

        var id = $(this).data('value');

        var docente = $(this).val();
        if (docente == "null") {
            docente = null;
        }

        console.log('docente: ' + docente + ' | relacion: ' + id);

        $.ajax({
            type: 'post',
            url: '/atlas/public/grado/agregar_docente',
            data: {
                docente: docente,
                id: id
            },
            success: function (r) {
                console.log(r);
                if (r == 1) {
                    new PNotify({
                        type: 'success',
                        title: '¡Hecho!',
                        text: 'Acción exitosa'
                    });
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

    $("#buscar_estudiante_m").on('keyup', async function () {
        var texto = $("#buscar_estudiante_m").val();
        if (texto.length > 0) {
            await $.ajax({
                type: 'get',
                url: '/atlas/public/estudiante/buscar_estudiante',
                data: {
                    valor: texto
                },
                success: function (r) {
                    var tabla = $("#tabla-busqueda_estudiante");
                    $("#tabla-busqueda_estudiante tbody > tr").remove();
                    var html;
                    var aux;
                    $(r).each(function (k, v) {
                        var hoy = moment();
                        var fecha_moment = moment(v.fechaNacimiento);
                        var edad = hoy.diff(fecha_moment, 'years');

                        html = '<tr>' +
                            '<td>';
                        if (v.sexo == 0) {
                            aux = '<span class="badge badge-light border border-primary text-primary"><i class="fas fa-male"></i></span>';
                        } else {
                            aux = '<span class="badge badge-light border border-danger text-danger"><i class="fas fa-female"></i></span>';
                        }
                        html += aux + ' ' + v.nombre + ' ' + v.apellido + ' <span class="badge badge-pill badge-ligth text-secondary float-right border">' + edad + ' años</span><br>';
                        if (v.nie != null) {
                            html += '<small class="text-primary">'+ v.nie + '<small>';
                        } else {
                            html += '<small class="text-secondary">Sin NIE</small>';
                        }

                        html += '</td>' +
                            '<td>' +
                            '<button class="btn btn-primary btn-sm" id="add_student" data-value="'+v.id+'"><i class="fas fa-check"></i></button>'+
                            '</td>' +
                            '</tr>';

                        tabla.append(html);
                    });
                }
            });
        }
    });

    $("#contenedor").on('click', '#add_student', function (e) {
        e.preventDefault();
        var estudiante = $(this).data('value');
        var grado = $("#id-g").val();
        var obj = $(this);
        $.ajax({
            type: 'post',
            url: '/atlas/public/grado/matricula',
            data: {
                grado: grado,
                estudiante: estudiante
            }, success: function (r) {
                if (r == 1) {
                    new PNotify({
                        type: 'success',
                        title: '¡Hecho!',
                        text: 'Acción exitosa'
                    });
                    obj.prop('disabled', true);
                    obj.removeClass('btn-primary');
                    obj.empty();
                    obj.addClass('btn-success');
                    obj.append('<i class="fas fa-check"></i>');
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

    $("#btn-cierre").click(function (e) {
        e.preventDefault();
        var anio_id = $(this).data('option');
        $.ajax({
            type: 'post',
            url: '/atlas/public/nota/promedios',
            data: {
                anio: anio_id
            },
            success: function (r) {
                if (r == 1) {
                    //Proceso de cierre de año
                    setTimeout(function () {
                        $("#btn-listo").show();
                    }, 3000);
                } else {
                    new PNotify({
                        type: 'error',
                        title: '¡Error!',
                        text: 'Algo salio mal'
                    });
                }
            }
        });
    })
});

function selected_year(year, id, estado, objeto) {
    $("#y-id").val(id);
    var b_year = $("#b-year");
    b_year.text(year);
    if (estado == false) {
        $("#sw-activo").prop('checked', true);
        $("#btn-cierre").prop('disabled',false);
    } else {
        $("#sw-activo").prop('checked', false);
        $("#btn-cierre").prop('disabled',true);
    }
    $('.btn-d').each(function () {
        $(this).removeClass('btn-info').addClass('btn-secundary');
    });
    $("#link_reprobado").prop('href', '/atlas/public/lectivo/reprobados?anio='+id);
    $("#link_retirado").prop('href', '/atlas/public/lectivo/retirados?anio='+id);
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
                    '<a href="/atlas/public/grados/' + value.id + '" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>'+
                    '<button type="button" class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Editar" onclick="editar_grado(' + value.id + ',' + value.turno + ',' + value.f_profesor + ')"><i class="fas fa-edit"></i></button>' +
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

function estado(id, estado) {
    if (estado == true) {
        var texto = "¿Desea dar de baja la matricula del estudiante?";
    } else {
        var texto = "¿Desea reactivar la matricula del estudiante?";
    }
    (new PNotify({
        title: 'Cambiar estado de matricula',
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
            url: '/atlas/public/grado/estado',
            data: {
                id: id
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
    });

}
