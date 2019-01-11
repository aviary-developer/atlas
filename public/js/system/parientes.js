$(document).ready(function () {
    $("#save-pariente").click(function (e) {
        e.preventDefault();
        var nombre_pariente = $("#nombre_pariente_m").val();
        var apellido_pariente = $("#apellido_pariente_m").val();
        var sexo_pariente = $("#sexo_m_pariente").is(':checked');
        sexo_pariente = (sexo_pariente) ? 1 : 0;
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
            '<td>' + fijo_pariente + '</td>' +
            '<td>' + celular_pariente + '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-sm btn-danger" id="eliminar-pariente"><i class="fas fa-trash"></i></button>' +
            '<input type="hidden" name="par_nombre[]" value="' + nombre_pariente + '">' +
            '<input type="hidden" name="par_apellido[]" value="' + apellido_pariente + '">' +
            '<input type="hidden" name="par_sexo[]" value="' + sexo_pariente + '">' +
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
            '</td>' +
            '</tr>';

        tabla_pariente.append(html);

        $("#nombre_pariente_m").val("");
        $("#apellido_pariente_m").val("");
        $("#sexo_m_pariente").prop("checked","true");
        $("#correo_pariente_m").val("");
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
});
