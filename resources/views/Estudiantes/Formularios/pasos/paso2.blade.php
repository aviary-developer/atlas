<div class="row">
  <div class="col-12 col-lg-12">
    <div class="form-group">
      <table class="table">
        <thead>
          <th colspan="3"><center>
          <label>Peso</label>
        </center></th>
          <th colspan="3"><center>
          <label>Talla</label>
        </center></th>
        </thead>
        <tbody>
          <tr>
            <td>
        <div class="form-group col-12">
              {!! Form::number('pesoInicial',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Inicial']) !!}
        </div></td><td>
        <div class="form-group">
              {!! Form::number('pesoMedio',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Medio']) !!}
        </div></td><td>
        <div class="form-group">
              {!! Form::number('pesoFinal',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Final']) !!}
        </div>
    </td><td>
        <div class="form-group">
              {!! Form::number('tallaInicial',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Metros']) !!}
        </div></td><td>
        <div class="form-group">
              {!! Form::number('tallaMedio',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Metros']) !!}
        </div></td><td>
        <div class="form-group">
              {!! Form::number('tallaFinal',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Metros']) !!}
        </div>
    </td>
  </tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="row">
  <div class="col-12 col-lg-12">
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
  <table class="table" id='tablaEnfermedades'>
    <thead>
      <th>Enfermedad</th>
      <th>Atención médica</th>
      <th>Toma medicamentos</th>
      <th>Fecha</th>
      <th>Resultados</th>
      <th colspan="3"><center>Vacunas</center></th>

      <th style="width : 80px">Acción</th>
    </thead>
    <tbody>
      <tr>
        <td>{!!Form::text('enfermedades[]',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}</td>
        <td>{!!Form::text('atencionMedica[]',null,['class'=>'form-control'])!!}</td>
        <td>{!!Form::text('tomaMedicamento[]',null,['class'=>'form-control'])!!}</td>
        <td>{!!Form::text('fecha[]',null,['class'=>'form-control'])!!}</td>
        <td>{!!Form::text('resultados[]',null,['class'=>'form-control'])!!}</td>
        <td>{!!Form::text('anioVacuna[]',null,['class'=>'form-control','placeholder'=>'Año'])!!}</td>
        <td>{!!Form::text('tipoVacuna[]',null,['class'=>'form-control','placeholder'=>'Tipo'])!!}</td>
        <td>{!!Form::text('refuerzoVacuna[]',null,['class'=>'form-control','placeholder'=>'Refuerzo'])!!}</td>
        <td>
          <button type = "button" name="button" class="btn btn-outline-danger btn-sm" onclick="eliminarEnfermedad(this);" data-toggle="tooltip" data-placement="top" title="Eliminar">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
</tbody>
</table>
</div>
  </div>
</div>
<hr>
@include('Estudiantes.Formularios.Pasos.tablaPadecimientos')
<div class="row">
  <div class="col-12 col-lg-3">
    <div class="form-group">
      <label> ¿Cuenta la familia con un seguro médico?</label><br>
    <div class="form-group">
      <div class="btn-group">
          <label class="radio radio-info">
            <input type="radio" name="seguroFamiliar" value="1"> <span class="check-mark"></span>Si
          </label> &nbsp
          <label class="radio radio-danger">
            <input type="radio" name="seguroFamiliar" value="0" checked> <span class="check-mark"></span>No
          </label>
      </div>
  </div>
  </div>
  </div>
  <div class="col-12 col-lg-3">
    <div class="form-group">
      <label> ¿Cuenta el alumno(a) con educación curricular?</label><br>
    <div class="form-group">
      <div class="btn-group" id="divCurricular">
          <label class="radio radio-info">
            <input type="radio" name="educacionCurricular" value="1"> <span class="check-mark"></span>Si
          </label> &nbsp
          <label class="radio radio-danger">
            <input type="radio" name="educacionCurricular" value="0" checked> <span class="check-mark"></span>No
          </label>
      </div>
  </div>
  </div>
  </div>
  <div class="col-12 col-lg-6" id="divTipoCurricular" style="display:none;">
    <div class="form-group">
      <label> ¿Que tipo de educación curricular?</label><br>
    <div class="form-group">
      {!! Form::textarea('tipoEducacionCurricular',null,['class'=>'form-control','rows'=>'2']) !!}
  </div>
  </div>
  </div>
  </div>
<script>
function enfermedades(c){
$('#divEnfermedades').toggle();
$('#agregarEnfermedadBoton').toggle();
}
function agregarEnfermedad(){
      var tabla=$('#tablaEnfermedades');
      var html="<tr>"+
        "<td><input name='enfermedades[]' class='form-control' placeholder='Nombre'></td>"+
        "<td><input name='atencionMedica[]' class='form-control'></td>"+
        "<td><input name='tomaMedicamento[]' class='form-control'></td>"+
        "<td><input name='fecha[]' class='form-control'></td>"+
        "<td><input name='resultados[]' class='form-control'></td>"+
        "<td><input name='anioVacuna[]' class='form-control' placeholder='Año'></td>"+
        "<td><input name='tipoVacuna[]' class='form-control' placeholder='Tipo'></td>"+
        "<td><input name='refuerzoVacuna[]' class='form-control' placeholder='Refuerzo'></td>"+
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
    })
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
})
</script>
