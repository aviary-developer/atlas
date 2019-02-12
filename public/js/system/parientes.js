$(document).ready(function () {
    var lbl_nombre = null;
    var lbl_apellido = null;
    var lbl_parentesco = null;
    var lbl_responsable = null;
    var lbl_dui = null;
    var lbl_fijo = null;
    var lbl_celular = null;
    var lbl_direccion = null;
    var img_sexo = null;

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

        $("#lm_pariente_buscar").hide();
        $("#rm_pariente_buscar").show();
        $("#dm_pariente_buscar").show();
    });

    $("#reset_buscar").click(function (e) {
        $("#buscar_pariente_m").val("");
        $("#tabla-busqueda_familiar > tbody").empty();

        $("#lm_pariente_buscar").show();
        $("#rm_pariente_buscar").hide();
        $("#dm_pariente_buscar").hide();

        $("#parentesco_m2").val("");
        $("#responsable_n_pariente2").prop('checked', 'true');
    });

    $("#back_pariente_buscar").click(function (e) {
        $("#lm_pariente_buscar").show();
        $("#rm_pariente_buscar").hide();
        $("#dm_pariente_buscar").hide();
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

			if (parentesco_pariente == null || parentesco_pariente == "") {
				new PNotify({
					title: 'Error',
					text: 'Indicar el parentesco de la persona con el estudiante',
					type: 'error'
				});
			} else {
				imprimir_familiar(datos);

				$("#m_pariente_buscar").modal('hide');
			}

    });

    $("#campo_familia").on("click", "#btn-dpariente", function (e) {
        e.preventDefault();
        $(this).parents('#tag').remove();
    });

	$("#campo_familia").on("click", "#btn-epariente", function (e) {
		e.preventDefault();

		var id = $(this).parent('div').parent('div').find('input:eq(2)').val();

		var parentesco = $(this).parent('div').parent('div').find('input:eq(0)').val();
		var encargado = $(this).parent('div').parent('div').find('input:eq(1)').val();

        lbl_nombre = $(this).parents('#tag').find('div:eq(1)').find('span:eq(0)');
        lbl_apellido = $(this).parents('#tag').find('div:eq(1)').find('span:eq(1)');
        lbl_parentesco = $(this).parents('#tag').find('div:eq(2)').find('span:eq(0)');
        lbl_responsable = $(this).parents('#tag').find('div:eq(2)').find('span:eq(1)');
        lbl_dui = $(this).parents('#tag').find('div:eq(3)').find('span:eq(0)');
        lbl_fijo = $(this).parents('#tag').find('div:eq(4)').find('span:eq(0)');
        lbl_celular = $(this).parents('#tag').find('div:eq(4)').find('span:eq(2)');
        lbl_direccion = $(this).parents('#tag').find('div:eq(5)').find('span:eq(0)');
        img_sexo = $(this).parents('#tag').find('img');

        $.ajax({
            type: 'get',
            url: '/atlas/public/pariente/datos',
            data: {
                id: id
            },
            success: function (r) {
                $("#nombre_pariente_m").val(r.pariente.nombre);
                $("#apellido_pariente_m").val(r.pariente.apellido);

                if (r.pariente.sexo == 1) {
                    $("#sexo_f_pariente").prop('checked', 'false');
                    $("#sexo_m_pariente").prop('checked', 'true');
                } else {
                    $("#sexo_m_pariente").prop('checked', 'false');
                    $("#sexo_f_pariente").prop('checked', 'true');
                }

                $("#dui_pariente_m").val(r.pariente.dui);
                $("#correo_pariente").val(r.pariente.correo);
                $("#telefono_fijo_pariente_m").val(r.pariente.telefono_fijo);
                $("#telefono_celular_pariente_m").val(r.pariente.telefono_celular);
                $("#direccion_pariente_m").val(r.pariente.direccion);
                $("#parentesco_m").val(parentesco);
                if (encargado == 1) {
                    $("#responsable_s_pariente").prop('checked', 'true');
                } else {
                    $("#responsable_n_pariente").prop('checked', "true");
                }

                if (r.pariente.sabe_leer == 1) {
                    $("#sabe_leer-s-pariente").prop('checked', 'true');
                } else {
                    $("#sabe_leer-n-pariente").prop('checked', 'true');
                }
                if (r.pariente.sabe_escribir == 1) {
                    $("#sabe_escribir-s-pariente").prop('checked', 'true');
                } else {
                    $("#sabe_escribir-n-pariente").prop('checked', 'true');
                }
                $("#ultimo_grado-pariente").val(r.pariente.ultimo_grado);
                $("#ultimo_anio-pariente").val(r.pariente.ultimo_anio);
                $("#fecha_nacimiento-pariente").val(moment(r.pariente.fecha_nacimiento).format('YYYY-MM-DD'));
                $("#estado_civil-pariente").val(r.pariente.estado_civil);
                $("#ocupacion-pariente").val(r.pariente.ocupacion);
                $("#lugar_trabajo-pariente").val(r.pariente.lugar_trabajo);
                $("#h-pariente").val('edit');
            }
		});
    });

    $("#campo_familia").on("click","#btn-vpariente",function (e) {
        e.preventDefault();
        var id = $(this).data('value');

        $.ajax({
            type: 'get',
            url: '/atlas/public/pariente/datos',
            data: {
                id : id
            },
            success: function (r) {
                $("#vp_nombre_completo").text(r.pariente.nombre + ' ' + r.pariente.apellido);
                var html;
                if (r.pariente.sexo == 1) {
                    html = '<span class="badge border border-primary text-primary">Masculino</span>';
                } else {
                    html = '<span class="badge border border-danger text-danger">Femenino</span>';
                }
                $("#vp_sexo").empty().append(html);
                if (r.pariente.dui == "null" || r.pariente.dui == null) {
                    html = '<span class="badge border border-secondary text-secondary">Sin DUI</span>';
                } else {
                    html = r.pariente.dui;
                }
                $("#vp_dui").empty().append(html);
                if (r.pariente.correo == "null" || r.pariente.correo == null) {
                    html = '<span class="badge border border-secondary text-secondary">Sin Correo</span>';
                } else {
                    html = r.pariente.correo;
                }
                $("#vp_correo").empty().append(html);

                if (r.pariente.telefono_fijo == "null" || r.pariente.telefono_fijo == null) {
                    html = '<span class="badge border border-secondary text-secondary">Sin Teléfono</span>';
                } else {
                    html = r.pariente.telefono_fijo;
                }
                $("#vp_fijo").empty().append(html);

                if (r.pariente.telefono_celular == "null" || r.pariente.telefono_celular == null) {
                    html = '<span class="badge border border-secondary text-secondary">Sin Teléfono</span>';
                } else {
                    html = r.pariente.telefono_celular;
                }
                $("#vp_movil").empty().append(html);

                $("#vp_direccion").text(r.pariente.direccion);

                if (r.pariente.sabe_leer == 1) {
                    html = '<span class="badge border border-primary text-primary">Si</span>';
                } else {
                    html = '<span class="badge border border-danger text-danger">No</span>';
                }
                $("#vp_sabe_leer").empty().append(html);

                if (r.pariente.sabe_escribir == 1) {
                    html = '<span class="badge border border-primary text-primary">Si</span>';
                } else {
                    html = '<span class="badge border border-danger text-danger">No</span>';
                }
                $("#vp_sabe_escribir").empty().append(html);

                if (r.pariente.ultimo_grado == "null" || r.pariente.ultimo_grado == null) {
                    html = '<span class="badge border border-secondary text-secondary">Sin Información</span>';
                } else {
                    html = r.pariente.ultimo_grado;
                }
                $("#vp_ultimo_grado").empty().append(html);

                if (r.pariente.ultimo_anio == "null" || r.pariente.ultimo_anio == null) {
                    html = '<span class="badge border border-secondary text-secondary">Sin Información</span>';
                } else {
                    html = r.pariente.ultimo_anio;
                }
                $("#vp_ultimo_anio").empty().append(html);

                var fecha = moment(r.pariente.fecha_nacimiento).format('DD [/] MM [/] YYYY');

                var hoy = moment();
                var fecha_moment = moment(r.pariente.fecha_nacimiento);
                var edad = hoy.diff(fecha_moment, 'years');
                html = ' <span class="badge badge-primary badge-pill">'+edad+' años</span>';
                $("#vp_fecha").empty().append(fecha + html);

                if (r.pariente.nacionalidad == "null" || r.pariente.nacionalidad == null) {
                    html = '<span class="badge border border-secondary text-secondary">Sin Información</span>';
                } else {
                    html = r.pariente.nacionalidad;
                }
                $("#vp_nacionalidad").empty().append(html);

                $("#vp_civil").text(r.pariente.estado_civil);

                if (r.pariente.ocupacion == "null" || r.pariente.ocupacion == null) {
                    html = '<span class="badge border border-secondary text-secondary">Sin Información</span>';
                } else {
                    html = r.pariente.ocupacion;
                }
                $("#vp_ocupacion").empty().append(html);

                if (r.pariente.lugar_trabajo == "null" || r.pariente.lugar_trabajo == null) {
                    html = '<span class="badge border border-secondary text-secondary">Sin Información</span>';
                } else {
                    html = r.pariente.lugar_trabajo;
                }
                $("#vp_trabajo").empty().append(html);
            }
        });
    });

    //Funciones
    function imprimir_familiar(datos) {
        var campo = $("#campo_familia");

        var img = (datos.sexo == 1) ? 'chico.png' : 'chica.png';

        var encargado = (datos.encargado == 1) ? '<span class="badge badge-success badge-pill" title="Responsable">R</span>' : '<span></span>';

        var dui = (!(datos.dui == null || datos.dui == "null")) ? datos.dui : '<span class="badge border border-secondary text-secondary">Sin DUI</span>';

        var fijo = (!(datos.fijo == null || datos.fijo == "null")) ? datos.fijo : '<span class="badge border border-secondary text-secondary">Sin Teléfono</span>';

        var celular = (!(datos.celular == null || datos.celular == "null")) ? datos.celular : '<span class="badge border border-secondary text-secondary">Sin Teléfono</span>';

        var correo = (!(datos.correo == null || datos.correo == "null")) ? datos.correo : '<span class="badge border border-secondary text-secondary">Sin Correo</span>';

        var html = '<div id="tag" class="col-4 rounded border">' + //Div1
            '<div class="flex-row">' +//Div 2
            '<center>' +
            '<img src="/atlas/public/img/' + img + '" class="w-50 rounded-circle mt-2 mb-2"/>' +
            '</center>' +
            '</div>' +//Div 2
            '<div class="flex-row mb-0">' +//Div 3
            '<center>' +
            '<span class="font-weight-bold font-sm">' + datos.nombre + '</span>' +
            ' <span class="font-weight-light font-sm">' + datos.apellido + '</span>' +
            '</center>' +
            '</div>' +//Div 3
            '<div class="flex-row mt-0">' +//Div 4
            '<center>' +
            '<span class="badge badge-primary badge-pill">' + datos.parentesco + '</span> ' + encargado +
            '</center>' +
            '</div>' +//Div 4
            '<hr class="mb-1 mt-1">' +
            '<div class="flex-row">' +//Div 5
            '<center>' +
            '<span class="font-sm"><i class="fas fa-id-card"></i> ' + dui + '</span>' +
            '</center>' +
            '</div>' +//Div5
            '<div class="flex-row">' +//Div 6
            '<center>' +
            '<span class="font-sm"><i class="fas fa-phone"></i> ' + fijo + '</span> <span class="badge badge-pill text-primary">&#183;</span> ' + '<span class="font-sm"><i class="fas fa-mobile-alt"></i> ' + celular + '</span>' +
            '</center>' +
            '</div>' +//Div6
            '<div class="flex-row">' +//Div 7
            '<center>' +
            '<span class="font-sm"><i class="fas fa-home"></i> ' + datos.direccion + '</span>' +
            '</center>' +
            '</div>' +//Div7
            '<hr class="mb-1 mt-1">' +
            '<div class="flex-row">' +//Div8
            '<div class="btn-group col-12 mb-2">' +//Div9
            '<button type="button" class="btn btn-sm btn-info col-4" id="btn-vpariente" data-toggle="modal" data-target="#show_pariente" data-value="'+datos.id+'"><i class="fas fa-eye"></i></button>' +
            '<button type="button" class="btn btn-sm btn-primary col-4" id="btn-epariente" data-toggle="modal" data-target="#m_pariente"><i class="fas fa-edit"></i></button>' +
            '<button type="button" class="btn btn-sm btn-danger col-4" id="btn-dpariente"><i class="fas fa-trash"></i></button>' +
            '</div>' +//Div9
            '<input type="hidden" name="par_parentesco[]" value="' + datos.parentesco + '">' +
            '<input type="hidden" name="par_responsable[]" value="' + datos.encargado + '">' +
            '<input type="hidden" name="par_id[]" value="' + datos.id + '">' +
            '<input type="hidden" name="par_tipo[]" value="old">'
            '</div>' +//Div8
            '</div>';//Div 1

        campo.append(html);
    }
});
