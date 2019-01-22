$(document).ready(function () {
    $("#save-pariente").click(function (e) {
        e.preventDefault();
        var nombre_pariente = $("#nombre_pariente_m").val();
        var apellido_pariente = $("#apellido_pariente_m").val();
        var sexo_pariente = $("#sexo_m_pariente").is(':checked');
        sexo_pariente = (sexo_pariente) ? 1 : 0;
        var dui_pariente = $("#dui_pariente_m").val();
        var correo_pariente = $("#correo_pariente_m").val();
        var fijo_pariente = $("#telefono_fijo_pariente_m").val();
        var celular_pariente = $("#telefono_celular_pariente_m").val();
        var direccion_pariente = $("#direccion_pariente_m").val();
        var parentesco_pariente = $("#parentesco_m").val();
        var responsable_pariente = $("#responsable_s_pariente").is(":checked");
        responsable_pariente = (responsable_pariente) ? 1 : 0;
        var sabe_leer_pariente = $("#sabe_leer-s-pariente").is(":checked");
        sabe_leer_pariente = (sabe_leer_pariente) ? 1 : 0;
        var sabe_escribir_pariente = $("#sabe_escribir-s-pariente").is(":checked");
        sabe_escribir_pariente = (sabe_escribir_pariente) ? 1 : 0;
        var ultimo_grado_pariente = $("#ultimo_grado-pariente").val();
        var ultimo_anio_pariente = $("#ultimo_anio-pariente").val();
        var fecha_nacimiento_pariente = $("#fecha_nacimiento-pariente").val();
        var nacionalidad_pariente = $("#nacionalidad-pariente").val();
        var estado_civil_pariente = $("#estado_civil-pariente option:selected").val();
        var ocupacion_pariente = $("#ocupacion-pariente").val();
        var lugar_trabajo_pariente = $("#lugar_trabajo-pariente").val();

        //Validar que no se ingresen datos nulos
        if (nombre_pariente.length > 0 && apellido_pariente.length > 0 && direccion_pariente.length > 0) {
            //Ajax
            $.ajax({
                type: 'post',
                url: '/atlas/public/parientes',
                data: {
                    nombre: nombre_pariente,
                    apellido: apellido_pariente,
                    sexo: sexo_pariente,
                    correo: correo_pariente,
                    telefono_fijo: fijo_pariente,
                    telefono_celular: celular_pariente,
                    direccion: direccion_pariente,
                    sabe_leer: sabe_leer_pariente,
                    sabe_escribir: sabe_escribir_pariente,
                    ultimo_grado: ultimo_grado_pariente,
                    ultimo_anio: ultimo_anio_pariente,
                    fecha_nacimiento: fecha_nacimiento_pariente,
                    nacionalidad: nacionalidad_pariente,
                    estado_civil: estado_civil_pariente,
                    ocupacion: ocupacion_pariente,
                    lugar_trabajo: lugar_trabajo_pariente,
                    dui: dui_pariente
                },
                success: function (r) {
                    if (r != 0) {
                        var datos = {
                            nombre: nombre_pariente,
                            apellido: apellido_pariente,
                            sexo: sexo_pariente,
                            encargado: responsable_pariente,
                            parentesco: parentesco_pariente,
                            fijo: fijo_pariente,
                            celular: celular_pariente,
                            direccion: direccion_pariente,
                            correo: correo_pariente,
                            dui: dui_pariente,
                            id: r
                        };

                        imprimir_familiar(datos);

                        $("#nombre_pariente_m").val("");
                        $("#apellido_pariente_m").val("");
                        $("#sexo_m_pariente").prop("checked", "true");
                        $("#correo_pariente_m").val("");
                        $("#dui_pariente_m").val("");
                        $("#telefono_fijo_pariente_m").val("");
                        $("#telefono_celular_pariente_m").val("");
                        $("#direccion_pariente_m").val("");
                        $("#parentesco_m").val("");
                        $("#responsable_n_pariente").prop("checked", "true");
                        $("#sabe_leer-s-pariente").prop("checked", "true");
                        $("#sabe_escribir-s-pariente").prop("checked", "true");
                        $("#ultimo_grado-pariente").val("");
                        $("#ultimo_anio-pariente").val("");
                        $("#fecha_nacimiento-pariente").val(moment().subtract(10, 'years').format("YYYY-MM-DD"));
                        $("#nacionalidad-pariente").val("Salvadoreño");
                        $("#estado_civil-pariente").val("Soltero");
                        $("#ocuapcion-pariente").val("");
                        $("#lugar_trabajo-pariente").val("");


                        $("#m_pariente").modal('hide');
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
                title: '¡Error!',
                text: 'Debe llenar los campos obligatorios'
            });
        }

    });

    $("#buscar_pariente_m").on('keyup', async function () {
        var texto = $("#buscar_pariente_m").val();
        if (texto.length > 0) {
            await $.ajax({
                type: 'get',
                url: '/atlas/public/estudiante/buscar_pariente',
                data: {
                    valor: texto
                },
                success: function (r) {
                    var tabla = $("#tabla-busqueda_familiar");
                    $("#tabla-busqueda_familiar tbody > tr").remove();
                    var html;
                    $(r).each(function (k, v) {
                        html = '<tr>' +
                            '<td>' +
                            v.nombre + ' ' + v.apellido + '<br>';
                        if (v.dui != null) {
                            html += '<small class="text-primary">'+v.dui+'</small>';
                        } else {
                            html += '<small class="text-secondary">Sin DUI</small>';
                        }
                            html += '</td>' +
                            '<td>' +
                                '<center><button type="button" class="btn btn-sm btn-primary" id="add-pariente"><i class="fas fa-check"></i></button></center>' +
                                '<input type="hidden" name="bp-nombre[]" value="' + v.nombre + '">' +
                                '<input type="hidden" name="bp-apellido[]" value="' + v.apellido + '">' +
                                '<input type="hidden" name="bp-sexo[]" value="' + v.sexo + '">' +
                                '<input type="hidden" name="bp-dui[]" value="' + v.dui + '">' +
                                '<input type="hidden" name="bp-telefono_fijo[]" value="' + v.telefono_fijo + '">' +
                                '<input type="hidden" name="bp-telefono_celular[]" value="' + v.telefono_celular + '">' +
                                '<input type="hidden" name="bp-id[]" value="' + v.id + '">' +
                                '<input type="hidden" name="bp-correo[]" value="' + v.correo + '">' +
                                '<input type="hidden" name="bp-direccion[]" value="' + v.direccion + '">' +
                            '</td>'+
                            '<tr>';

                        tabla.append(html);
                    });
                }
            });
        }
    });

    $("#tabla-busqueda_familiar").on('click', '#add-pariente', function () {
        var nombre = $(this).parent('center').parent('td').find('input:eq(0)').val();
        var apellido = $(this).parent('center').parent('td').find('input:eq(1)').val();
        var sexo = $(this).parent('center').parent('td').find('input:eq(2)').val();
        var dui = $(this).parent('center').parent('td').find('input:eq(3)').val();
        var fijo = $(this).parent('center').parent('td').find('input:eq(4)').val();
        var celular = $(this).parent('center').parent('td').find('input:eq(5)').val();
        var id = $(this).parent('center').parent('td').find('input:eq(6)').val();
        var correo = $(this).parent('center').parent('td').find('input:eq(7)').val();
        var direccion = $(this).parent('center').parent('td').find('input:eq(8)').val();

        aux_sexo = sexo;
        aux_fijo = fijo;
        aux_dui = dui;
        aux_celular = celular;

        var html;
        if (sexo == 0) {
            html = '<span class="badge border border-danger text-danger col-8">Femenino</span>'
        } else {
            html = '<span class="badge border border-primary text-primary col-8">Masculino</span>'
        }

        $("#dp_nombre_completo").text(nombre + ' ' + apellido);
        $("#dp_sexo").empty().append(html);

        if (dui == null || dui == "null") {
            html = '<span class="badge border border-secondary text-secondary col-8">Sin DUI</span>';
            $("#dp_dui").empty().append(html);
        } else {
            $("#dp_dui").text(dui);
        }

        if (fijo == null || fijo == "null") {
            html = '<span class="badge border border-secondary text-secondary col-8">Sin Teléfono</span>';
            $("#dp_fijo").empty().append(html);
        } else {
            $("#dp_fijo").text(fijo);
        }

        if (celular == null || celular == "null") {
            html = '<span class="badge border border-secondary text-secondary col-8">Sin Teléfono</span>';
            $("#dp_celular").empty().append(html);
        } else {
            $("#dp_celular").text(celular);
        }

        $("#sp-nombre").val(nombre);
        $("#sp-apellido").val(apellido);
        $("#sp-fijo").val(aux_fijo);
        $("#sp-celular").val(aux_celular);
        $("#sp-id").val(id);
        $("#sp-sexo").val(aux_sexo);
        $("#sp-dui").val(aux_dui);
        $("#sp-correo").val(correo);
        $("#sp-direccion").val(direccion);
    });

    $("#pariente_existe").click(function (e) {
        e.preventDefault();
        var nombre_pariente = $("#sp-nombre").val();
        var apellido_pariente = $("#sp-apellido").val();
        var fijo_pariente = $("#sp-fijo").val();
        var celular_pariente = $("#sp-celular").val();
        var dui_pariente = $("#sp-dui").val();
        var id = $("#sp-id").val();
        var sexo = $("#sp-sexo").val();
        var direccion = $("#sp-direccion").val();
        var correo = $("#sp-correo").val();
        var parentesco_pariente = $("#parentesco_m2").val();
        var responsable_pariente = $("#responsable_s_pariente2").is(":checked");
        responsable_pariente = (responsable_pariente) ? 1 : 0;

        var datos = {
            nombre: nombre_pariente,
            apellido: apellido_pariente,
            fijo: fijo_pariente,
            celular: celular_pariente,
            dui: dui_pariente,
            id: id,
            parentesco: parentesco_pariente,
            encargado: responsable_pariente,
            direccion: direccion,
            sexo: sexo,
            correo: correo
        };

        imprimir_familiar(datos);

        $("#m_pariente_buscar").modal('hide');
    });

    function imprimir_familiar(datos) {
        var campo = $("#campo_familia");

        var color = (datos.sexo == 1) ? 'text-primary' : 'text-danger';

        var encargado = (datos.encargado == 1) ? '<span class="badge badge-success font-sm">Responsable</span>' : '';

        var dui = (!(datos.dui == null || datos.dui == "null")) ? datos.dui : '<span class="badge border border-secondary text-secondary">Sin DUI</span>';

        var fijo = (!(datos.fijo == null || datos.fijo == "null")) ? datos.fijo : '<span class="badge border border-secondary text-secondary">Sin Teléfono</span>';

        var celular = (!(datos.celular == null || datos.celular == "null")) ? datos.celular : '<span class="badge border border-secondary text-secondary">Sin Teléfono</span>';

        var correo = (!(datos.correo == null || datos.correo == "null")) ? datos.correo : '<span class="badge border border-secondary text-secondary">Sin Correo</span>';

        var html = '<div id="tag">' +
            '<div class="row">' +
            '<h4 class="col-12">' +
            '<i class="' + color + ' fas fa-user"></i> ' +
            datos.nombre + ' ' + datos.apellido +
            ' <span class="font-sm badge badge-secondary">' + datos.parentesco + '</span> ' +
            encargado+
            '</h4>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-3">' +
            '<span><i class="fas fa-id-card"></i> '+dui+'</span>'+
            '</div>' +
            '<div class="col-3">' +
            '<span><i class="fas fa-phone"></i> ' + fijo + '</span>' +
            '</div>' +
            '<div class="col-3">' +
            '<span><i class="fas fa-mobile-alt"></i> ' + celular + '</span>' +
            '</div>' +
            '<div class="col-3">' +
            '<span><i class="fas fa-envelope"></i> ' + correo + '</span>' +
            '</div>' +
            '</div>' +
            '<div class="row mt-2">' +
            '<div class="col-10">' +
            '<span><i class="fas fa-home"></i> '+datos.direccion +'</span>'+
            '</div>' +
            '<div class="col-2 right">' +
            '<div class="btn-group right">' +
            '<button type="button" class="btn btn-sm btn-info col" id="btn-vpariente"><i class="fas fa-eye"></i></button>' +
            '<button type="button" class="btn btn-sm btn-primary" id="btn-epariente"><i class="fas fa-edit"></i></button>' +
            '<button type="button" class="btn btn-sm btn-danger" id="btn-dpariente"><i class="fas fa-trash"></i></button>' +
            '</div>' +
            '</div>' +
            '<input type="hidden" name="par_parentesco[]" value="' + datos.parentesco + '">' +
            '<input type="hidden" name="par_responsable[]" value="' + datos.encargado + '">' +
            '<input type="hidden" name="par_id[]" value="' + datos.id + '">' +
            '<input type="hidden" name="par_tipo[]" value="old">' +
            '</div>' +
            '</div><hr>';

        campo.append(html);
    }
});
