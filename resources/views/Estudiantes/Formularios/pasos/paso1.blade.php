<div class="row">
  <div class="col-12 col-lg-3">
    <div class="form-group">
      <label>Nombre</label>
      {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombres de estudiante', 'required'])!!}
    </div>
  </div>
  <div class="col-12 col-lg-3">
    <div class="form-group">
      <label>Apellido</label>
      {!!Form::text('apellido',null,['id'=>'apellido','class'=>'form-control','placeholder'=>'Apellidos de estudiante', 'required'])!!}
    </div>
  </div>
  <div class="col-12 col-lg-2">
    <div class="form-group">
      <label>NIE</label>
      {!! Form::text('nie',null,['id'=>'nie','class'=>'form-control','placeholder'=>'Ej. 000000','data-inputmask'=>"'mask' : '99999999-9'", 'required']) !!}
    </div>
  </div>
  <div class="col-12 col-lg-2">
    <div class="form-group">
      <label>DUI <small class="text-secondary">(Estudiante)</small></label>
      {!! Form::text('dui',null,['id'=>'dui','class'=>'form-control','placeholder'=>'Ej. 00000000-0','data-inputmask'=>"'mask' : '99999999-9'", 'required']) !!}
    </div>
  </div>
  <div class="col-12 col-lg-2">
    <div class="form-group">
      <label>Fecha nacimiento</label>
      @php
        $hoy = Carbon\Carbon::now();
        $hoy = $hoy->subYears(3);
        if($create){
          $fecha = $fecha->subYears(3);
        }
      @endphp
      {!! Form::date('fechaNacimiento',$fecha,['max'=>$hoy->format('Y-m-d'),'id'=>'fechaNacimiento','class'=>'form-control has-feedback-left','required']) !!}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-lg-3">
    <div class="form-group">
    <label class="checkbox checkbox-success">
      <input type="checkbox" onchange="partidaNacimiento(this);"/>
      <span class="check-mark"></span> Posee partida de nacimiento
    </label>
    <div id="divPartida" class="input-group" style="display:none;">
  {!! Form::number('numero',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Número']) !!}
  {!! Form::number('folio',null,['id'=>'folio','class'=>'form-control','placeholder'=>'Folio']) !!}
  {!! Form::number('tomo',null,['id'=>'tomo','class'=>'form-control','placeholder'=>'Tomo']) !!}
  {!! Form::number('libro',null,['id'=>'libro','class'=>'form-control','placeholder'=>'Libro']) !!}
        </div>
  </div>
  </div>
  <div class="col-12 col-lg-3">
    <div class="form-group">
      <label>Sexo</label><br>
      <div class="form-group">
        <div id="radioBtn" class="btn-group">
          @if ($create)
            <label class="radio radio-info">
              <input id="sexoM" type="radio" name="sexo" value="0" checked> <span class="check-mark"></span>Masculino
            </label> &nbsp
            <label class="radio radio-danger">
              <input id="sexoF" type="radio" name="sexo" value="1"> <span class="check-mark"></span>Femenino
            </label>
          @else
            @if(!$estudiante->sexo)
              <label class="radio radio-info">
                <input type="radio" name="sexo" value="0" checked> <span class="check-mark"></span>Masculino
              </label> &nbsp
              <label class="radio radio-danger">
                <input type="radio" name="sexo" value="1"> <span class="check-mark"></span>Femenino
              </label>
            @else
              <label class="radio radio-info">
                <input type="radio" name="sexo" value="0"> <span class="check-mark"></span>Masculino
              </label> &nbsp
              <label class="radio radio-danger">
                <input type="radio" name="sexo" value="1" checked> <span class="check-mark"></span>Femenino
              </label>
            @endif
        @endif
      </div>
      </div>
    </div>
  </div>
    <div class="col-12 col-lg-4">
      <div class="form-group">
        <label>Dirección</label>
        {!! Form::textarea('direccion',null,['id'=>'direccion','class'=>'form-control','placeholder'=>'Dirección del estudiante','rows'=>'2', 'required']) !!}
      </div>
    </div>
    <div class="col-12 col-lg-2">
      <div class="form-group">
        <label>Zona de residencia</label><br>
      <div class="form-group">
        <div class="btn-group">
            <label class="radio radio-info">
              <input type="radio" name="zonaResidencia" value="0" checked> <span class="check-mark"></span>Urbana
            </label> &nbsp
            <label class="radio radio-danger">
              <input type="radio" name="zonaResidencia" value="1"> <span class="check-mark"></span>Rural
            </label>
        </div>
    </div>
    </div>
</div>
</div>
<div class="row">
  <div class="col-12 col-lg-4">
    <div class="form-group">
      <label>Centro escolar procedente:</label>
      {!!Form::text('centroEscolarProcedente',null,['id'=>'centroEscolarProcedente','class'=>'form-control','placeholder'=>'Centro escolar procedente'])!!}
    </div>
  </div>
  <div class="col-12 col-lg-3">
        <div class="form-group">
          <label> ¿Estudio parvularia?</label><br>
        <div class="form-group">
          <div class="btn-group">
              <label class="radio radio-info">
                <input type="radio" name="parvularia" value="1" checked> <span class="check-mark"></span>Si
              </label> &nbsp
              <label class="radio radio-danger">
                <input type="radio" name="parvularia" value="0"> <span class="check-mark"></span>No
              </label>
          </div>
      </div>
      </div>
      </div>
      <div class="col-12 col-lg-3">
            <div class="form-group">
              <label>Presentó:</label><br>
            <div class="form-group">
              <label class="checkbox checkbox-success">
                <input type="checkbox" name="certificado"/>
                <span class="check-mark"></span> Certificado
              </label>
              <label class="checkbox checkbox-success">
                <input type="checkbox" name="libretaNotas"/>
                <span class="check-mark"></span> Libreta de notas
              </label>
          </div>
          </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group">
              <label> ¿Trabaja?</label><br>
              <div class="form-group">
                <div id="divTrabaja" class="btn-group">
                  <label class="radio radio-info">
                    <input type="radio" name="trabaja" id="siTrabaja" value="1"> <span class="check-mark"></span>Si
                  </label> &nbsp
                  <label class="radio radio-danger">
                    <input type="radio" name="trabaja" value="0" checked> <span class="check-mark"></span>No
                  </label>
                </div>
                &nbsp
                <button id="detallesTrabajo" type = "button" name="button" class="btn btn-outline-success btn-sm" onclick="trabajo();" data-toggle="tooltip" data-placement="left" title="Detalles" style="display:none;">
                  <i class="fa fa-bars"></i>
                </button>
              </div>
            </div>
            <input id="tipo" name="tipo" type="hidden"/>
            <input id="lugar" name="lugar" type="hidden"/>
            <input id="jornadaLaboral" name="jornadaLaboral" type="hidden"/>
          </div>
  </div>
  <div class="row">
    <div class="col-12 col-lg-4">
      <div class="form-group">
          <label>Pais</label>
    <div id="divNacionalidad" class="input-group">
    {!! Form::text('pais',null,['onkeyup'=>'verificarPais();','onblur'=>'verExtranjeria();','id'=>'pais','class'=>'form-control','placeholder'=>'Pais']) !!}
    {!! Form::text('nacionalidad',null,['id'=>'nacionalidad','class'=>'form-control','placeholder'=>'Nacionalidad']) !!}
    {!! Form::text('condicionExtranjeria',null,['id'=>'condicionExtranjeria','class'=>'form-control','placeholder'=>'Extranjeria','style'=>'display:none;']) !!}
    </div>
    </div>
    </div>
    <div class="col-12 col-lg-3">
      <div class="form-group">
          <label>Correo electronico</label>
    {!! Form::email('correo',null,['id'=>'correo','class'=>'form-control','placeholder'=>'Dirección de correo']) !!}
    </div>
    </div>
    <div class="col-12 col-lg-2">
      <div class="form-group">
          <label>Estado Civil</label>
    <select class="form-control" name="estadoCivil">
      <option value="Soltero">Soltero(a)</option>
      <option value="Casado">Casado(a)</option>
      <option value="Viudo">Viudo(a)</option>
    </select>
    </div>
    </div>
  </div>
<script>
  function partidaNacimiento(c){
$('#divPartida').toggle();
  }
$("#divTrabaja input[name='trabaja']").click(function(event) {
  if($(this).val()==1){
  trabajo();
}else{
    $("#tipo").val("");
    $("#lugar").val("");
    $("#jornadaLaboral").val("");
    $("#detallesTrabajo").hide();
    $("#siTrabaja").prop('disabled', false);
  }
});
function trabajo(){
  var notice = new PNotify({
    title: '<span class="badge badge-primary">Detalles</span> Trabajo',
    //text: $('#modalTrabajo').html(),
    text: "<div id='modalTrabajo'>"+
        "<div class='form-group'>"+
        "<label>Tipo</label>"+
          "<input type='text' value='"+$("#tipo").val()+"' id='tipoModal' name='tipoModal' class='form-control'/>"+
        "</div>"+
        "<div class='form-group'>"+
          "<label>Lugar</label>"+
          "<input type='text' value='"+$("#lugar").val()+"' id='lugarModal' name='lugarModal' class='form-control'/>"+
        "</div>"+
        "<div class='form-group'>"+
          "<label>Jornada laboral</label>"+
          "<input type='text' value='"+$("#jornadaLaboral").val()+"' id='jornadaLaboralModal' name='jornadaLaboralModal' class='form-control'/>"+
        "</div>"+
    "</div>",
    icon: false,
    width: 'auto',
    type:'info',
    hide: false,
    buttons: {
        closer: true,
        sticker: false
    },
    confirm: {
        buttons: [{
            text: "Hecho"
        }, {
            text: "Cancelar"
        }],
        confirm:true,
    },
    insert_brs: false,
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
});
notice.get().on('pnotify.confirm', function() {
  var tipo = $(this).find('input[name=tipoModal]').val();
  var lugar = $(this).find('input[name=lugarModal]').val();
  var jornadaLaboral = $(this).find('input[name=jornadaLaboralModal]').val();
    $("#tipo").val(tipo);
    $("#lugar").val(lugar);
    $("#jornadaLaboral").val(jornadaLaboral);
    $("#detallesTrabajo").show();
}).on('pnotify.cancel', function() {
});
  }

  function verificarPais(){
    var pais=$("#pais").val().toUpperCase();
    if(pais.length==11){
    if(pais==="EL SALVADOR"){
      if($("#sexoM").is(':checked')){
        $("#nacionalidad").val("Salvadoreño");
      }if ($("#sexoF").is(':checked')) {
        $("#nacionalidad").val("Salvadoreña");
      }
      $("#condicionExtranjeria").hide();
    }else {
      $("#condicionExtranjeria").show();
    }
  }
  else{$("#nacionalidad").val("");}
  if(pais.length==0){
    $("#condicionExtranjeria").hide();
  }
  }
  function verExtranjeria(){
    var pais=$("#pais").val().toUpperCase();
    if(pais!="EL SALVADOR"){
      $("#condicionExtranjeria").show();
    }
  }
</script>
