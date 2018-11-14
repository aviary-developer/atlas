<div class="flex-row">
    <center>
        <div class="mb-3 font-weight-bold">
            Salud
        </div>
    </center>
</div>

<div class="form-group">
    <label class="checkbox checkbox-success">
        <input id="checkEnfermedad" type="checkbox" onchange="enfermedades(this);"/>
        <span class="check-mark"></span>¿Padece alguna enfermedad?
    </label>
    <button type="button" id="agregarEnfermedadBoton" class="btn btn-outline-success btn-sm" onclick="agregarEnfermedad();" data-toggle="tooltip" data-placement="top" title="Agregar enfermedad" style="display:none;">
        <i class="fa fa-plus"></i>
    </button>
</div>

<div id="divEnfermedades" style="display:none;">
    <table class="table table-sm" id='tablaEnfermedades'>
        <thead>
            <th>Enfermedad</th>
            <th>Atención médica</th>
            <th>Toma medicamentos</th>
            <th style="width:80px">Fecha</th>
            <th>Resultados</th>
            <th colspan="3"><center>Vacunas</center></th>

            <th style="width : 50px"></th>
        </thead>
        <tbody>
            <tr>
                <td>{!!Form::text('enfermedades[]',null,['class'=>'form-control form-control-sm','placeholder'=>'Nombre'])!!}</td>
                <td>{!!Form::text('atencionMedica[]',null,['class'=>'form-control form-control-sm'])!!}</td>
                <td>{!!Form::text('tomaMedicamento[]',null,['class'=>'form-control form-control-sm'])!!}</td>
                <td>{!!Form::date('fecha[]',null,['class'=>'form-control form-control-sm','style'=>'width:140px'])!!}</td>
                <td>{!!Form::text('resultados[]',null,['class'=>'form-control form-control-sm'])!!}</td>
                <td colspan='3'>
                    <div class='input-group'>
                        {!!Form::text('anioVacuna[]',null,['class'=>'form-control form-control-sm','placeholder'=>'Año'])!!}
                        {!!Form::text('tipoVacuna[]',null,['class'=>'form-control form-control-sm','placeholder'=>'Tipo'])!!}
                        {!!Form::text('refuerzoVacuna[]',null,['class'=>'form-control form-control-sm','placeholder'=>'Refuerzo'])!!}
                    </div>
                </td>
                <td>
                    <button type = "button" name="button" class="btn btn-outline-danger btn-sm" onclick="eliminarEnfermedad(this);" data-toggle="tooltip" data-placement="top" title="Eliminar">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function enfermedades(c){
        $('#divEnfermedades').toggle();
        $('#agregarEnfermedadBoton').toggle();
    }

    function agregarEnfermedad(){
        var tabla=$('#tablaEnfermedades');
        var html="<tr>"+
            "<td><input name='enfermedades[]' class='form-control form-control-sm' placeholder='Nombre'></td>"+
            "<td><input name='atencionMedica[]' class='form-control form-control-sm'></td>"+
            "<td><input name='tomaMedicamento[]' class='form-control form-control-sm'></td>"+
            "<td><input name='fecha[]' class='form-control form-control-sm' type='date' style='width:140px'></td>"+
            "<td><input name='resultados[]' class='form-control form-control-sm'></td>"+
            "<td colspan='3'>"+
                "<div class='input-group'>"+
                "<input name='anioVacuna[]' class='form-control form-control-sm' placeholder='Año'>"+
                "<input name='tipoVacuna[]' class='form-control form-control-sm' placeholder='Tipo'>"+
                "<input name='refuerzoVacuna[]' class='form-control form-control-sm' placeholder='Refuerzo'></td>"+
                "</div>"+
            "<td>"+
            "<button type = 'button' name='button' class='btn btn-outline-danger btn-sm' onclick='eliminarEnfermedad(this);' data-toggle='tooltip' data-placement='top' title='Eliminar'>"+
                "<i class='fa fa-trash'></i>"+
            "</button>"+
            "</td>"+
        "</tr>";
        tabla.append(html);
    }

    function eliminarEnfermedad(enfermedad){
        var tabla=$('#tablaEnfermedades');
        $(enfermedad).parent('td').parent('tr').remove();
        new PNotify({
            type: 'error',
            text: 'Eliminado'
        });
        if($("#tablaEnfermedades tr").length==1)
        {
            $('#divEnfermedades').hide();
            $('#agregarEnfermedadBoton').hide();
            $('#checkEnfermedad').prop('checked', false);
        }
    }

    $("#divCurricular input[name='educacionCurricular']").click(function(event) {
        if($(this).val()==1){
            $("#divTipoCurricular").show();
        }else{
            $("#divTipoCurricular").hide();
        }
    });

</script>
