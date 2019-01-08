$(document).ready(function () {
    $("#save_enfermedad").click(function (e) {
        var nombre_enfermedad = $("#nombre_enfermedad").val();
        var atencion_enfermedad = $("#atencion_medica").val();
        var medicamentos_enfermedad = $("#medicamentos_enfermedad").val();
        var fecha_enfermedad = $("#fecha_enfermedad").val();
        var resultados_enfermedad = $("#resultados_enfermedad").val();
        var anio_vacuna_enfermedad = $("#anio_vacuna_enfermedad").val();
        var tipo_vacuna_enfermedad = $("#tipo_vacuna_enfermedad").val();
        var refuerzo_vacuna_enfermedad = $("#refuerzo_vacuna_enfermedad").val();

        var tabla = $("#tabla_enfermedad");

        var html = '<tr>' +
            '<td>' + nombre_enfermedad + '</td>' +
            '<td>' + atencion_enfermedad + '</td>' +
            '<td>' + medicamentos_enfermedad + '</td>' +
            '<td>' +
            '<button class="btn btn-danger btn-sm" id="eliminar_enfermedad"><i class="fas fa-trash"></i></button>' +
            '<input type="hidden" name="nombre_e[]" value="' + nombre_enfermedad + '">' +
            '<input type="hidden" name="atencion_e[]" value="' + atencion_enfermedad + '">' +
            '<input type="hidden" name="medicamentos_e[]" value="' + medicamentos_enfermedad + '">' +
            '<input type="hidden" name="fecha_e[]" value="' + fecha_enfermedad + '">' +
            '<input type="hidden" name="resultados_e[]" value="' + resultados_enfermedad + '">' +
            '<input type="hidden" name="anio_vacuna_e[]" value="' + anio_vacuna_enfermedad + '">' +
            '<input type="hidden" name="tipo_vacuna_e[]" value="' + tipo_vacuna_enfermedad + '">' +
            '<input type="hidden" name="refuerzo_vacuna_e[]" value="' + refuerzo_vacuna_enfermedad + '">' +
            '</td>' +
            '</tr>';

        tabla.append(html);
        $("#m_enfermedad").modal('hide');
        $("#nombre_enfermedad").val("");
        $("#atencion_medica").val("");
        $("#medicamentos_enfermedad").val("");
        $("#fecha_enfermedad").val(moment().format('YYYY-MM-DD'));
        $("#resultados_enfermedad").val("");
        $("#anio_vacuna_enfermedad").val("");
        $("#tipo_vacuna_enfermedad").val("");
        $("#refuerzo_vacuna_enfermedad").val("");
    });

    $("#tabla_enfermedad").on('click', '#eliminar_enfermedad', function (e) {
        $(this).parents('tr').remove();
    });
});
