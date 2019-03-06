$(document).ready(function () {
    $("#contenedor").on('change keyup', 'input[type=number]', function () {
        var n1 = $(this).parents('tr').find('input:eq(1)').val();
        var n2 = $(this).parents('tr').find('input:eq(2)').val();
        var n3 = $(this).parents('tr').find('input:eq(3)').val();

        var avg = $(this).parents('tr').find('#avg_nota');

        var op = (parseFloat(n1) * 0.35) + (parseFloat(n2) * 0.35) + (parseFloat(n3) * 0.3);

        avg.text(op.toPrecision(3));

        var index_row = $(this).parents('tr').index();
        index_row++;

        var tabla1 = $("#contenedor").find('div:eq(0)').find('div:eq(0)').find('table').find('tr:eq(' + index_row + ')').find('#avg_nota').text();
        var tabla2 = $("#contenedor").find('div:eq(2)').find('div:eq(0)').find('table').find('tr:eq(' + index_row + ')').find('#avg_nota').text();
        var tabla3 = $("#contenedor").find('div:eq(4)').find('div:eq(0)').find('table').find('tr:eq(' + index_row + ')').find('#avg_nota').text();

        tresumen = $("#tabla-resumen");
        tresumen.find('tr:eq(' + index_row + ')').find('#pr1').text(tabla1);
        tresumen.find('tr:eq(' + index_row + ')').find('#pr2').text(tabla2);
        tresumen.find('tr:eq(' + index_row + ')').find('#pr3').text(tabla3);

        var avg_final = (parseFloat(tabla1) + parseFloat(tabla2) + parseFloat(tabla3)) / 3;
        tresumen.find('tr:eq(' + index_row + ')').find('#prf').text(avg_final.toPrecision(3));
    });

    for (k = 1; k < 4; k++){
        $("#" + k + "-p-tab").click(function (e) {
            e.preventDefault();
            var aux = $(this).data('value');

            var tresumen = $("#tabla-resumen");
            var filas = tresumen.find('tr').length;


            for (i = 0; i < filas; i++){
                for (j = 1; j < 4; j++){
                    if (j == aux) {
                        $(tresumen).find('tr:eq(' + i + ')').find('#pr' + j).removeClass('text-secondary border border-secondary').addClass('badge-primary');
                    } else {
                        $(tresumen).find('tr:eq(' + i + ')').find('#pr' + j).removeClass('badge-primary').addClass('border border-secondary text-secondary');
                    }
                }
            }
        });
    }

});
