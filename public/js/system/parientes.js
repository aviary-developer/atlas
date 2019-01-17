$(document).ready(function () {
    $("#save-pariente").click(function (e) {
        e.preventDefault();
        var nombre_pariente = $("#nombre_pariente_m").val();
        var apellido_pariente = $("#apellido_pariente_m").val();
        var sexo_pariente = $("#sexo_m_pariente").is(':checked');
        sexo_pariente = (sexo_pariente) ? 1 : 0;
        var dui_pariente = $("#dui__pariente_m").val();
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

        var tabla_pariente = $("#tabla-pariente");

        var html = '<tr>' +
            '<td>' + nombre_pariente + '</td>' +
            '<td>' + apellido_pariente + '</td>' +
            '<td>' + dui_pariente + '</td>' +
            '<td>' + fijo_pariente + '</td>' +
            '<td>' + celular_pariente + '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-sm btn-danger" id="eliminar-pariente"><i class="fas fa-trash"></i></button>' +
            '<input type="hidden" name="par_nombre[]" value="' + nombre_pariente + '">' +
            '<input type="hidden" name="par_apellido[]" value="' + apellido_pariente + '">' +
            '<input type="hidden" name="par_sexo[]" value="' + sexo_pariente + '">' +
            '<input type="hidden" name="par_dui[]" value="' + dui_pariente + '">' +
            '<input type="hidden" name="par_fijo[]" value="' + fijo_pariente + '">' +
            '<input type="hidden" name="par_celular[]" value="' + celular_pariente + '">' +
            '<input type="hidden" name="par_correo[]" value="' + correo_pariente + '">' +
            '<input type="hidden" name="par_direccion[]" value="' + direccion_pariente + '">' +
            '<input type="hidden" name="par_parentesco[]" value="' + parentesco_pariente + '">' +
            '<input type="hidden" name="par_responsable[]" value="' + responsable_pariente + '">' +
            '<input type="hidden" name="par_sabe_leer[]" value="' + sabe_leer_pariente + '">' +
            '<input type="hidden" name="par_sabe_escribir[]" value="' + sabe_escribir_pariente + '">' +
            '<input type="hidden" name="par_ultimo_grado[]" value="' + ultimo_grado_pariente + '">' +
            '<input type="hidden" name="par_ultimo_anio[]" value="' + ultimo_anio_pariente + '">' +
            '<input type="hidden" name="par_fecha_nacimiento[]" value="' + fecha_nacimiento_pariente + '">' +
            '<input type="hidden" name="par_nacionalidad[]" value="' + nacionalidad_pariente + '">' +
            '<input type="hidden" name="par_estado_civil[]" value="' + estado_civil_pariente + '">' +
            '<input type="hidden" name="par_ocupacion[]" value="' + ocupacion_pariente + '">' +
            '<input type="hidden" name="par_lugar_trabajo[]" value="' + lugar_trabajo_pariente + '">' +
            '<input type="hidden" name="par_tipo[]" value="new">' +
            '<input type="hidden" name="par_id[]" value="0">' +
            '</td>' +
            '</tr>';

        tabla_pariente.append(html);

        $("#nombre_pariente_m").val("");
        $("#apellido_pariente_m").val("");
        $("#sexo_m_pariente").prop("checked","true");
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
        $("#sp-fijo").val(fijo);
        $("#sp-celular").val(celular);
        $("#sp-id").val(id);
        $("#sp-sexo").val(sexo);
        $("#sp-dui").val(dui);
    });

    $("#pariente_existe").click(function (e) {
        e.preventDefault();
        var nombre_pariente = $("#sp-nombre").val();
        var apellido_pariente = $("#sp-apellido").val();
        var fijo_pariente = $("#sp-fijo").val();
        var celular_pariente = $("#sp-celular").val();
        var dui_pariente = $("#sp-celular").val();
        var id = $("#sp-id").val();
        var parentesco_pariente = $("#patentesco_m2").val();
        var responsable_pariente = $("#responsable_s_pariente").is(":checked");
        responsable_pariente = (responsable_pariente) ? 1 : 0;

        var tabla_pariente = $("#tabla-pariente");

        var html = '<tr>' +
            '<td>' + nombre_pariente + '</td>' +
            '<td>' + apellido_pariente + '</td>' +
            '<td>' + dui_pariente + '</td>' +
            '<td>' + fijo_pariente + '</td>' +
            '<td>' + celular_pariente + '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-sm btn-danger" id="eliminar-pariente"><i class="fas fa-trash"></i></button>' +
            '<input type="hidden" name="par_nombre[]" value="' + nombre_pariente + '">' +
            '<input type="hidden" name="par_apellido[]" value="' + apellido_pariente + '">' +
            '<input type="hidden" name="par_dui[]" value="' + dui_pariente + '">' +
            '<input type="hidden" name="par_fijo[]" value="' + fijo_pariente + '">' +
            '<input type="hidden" name="par_celular[]" value="' + celular_pariente + '">' +
            '<input type="hidden" name="par_parentesco[]" value="' + parentesco_pariente + '">' +
            '<input type="hidden" name="par_responsable[]" value="' + responsable_pariente + '">' +
            '<input type="hidden" name="par_id[]" value="' + id + '">' +
            '<input type="hidden" name="par_tipo[]" value="old">' +
            '</td>' +
            '</tr>';

        tabla_pariente.append(html);

        $("#m_pariente_buscar").modal('hide');
    });
});
