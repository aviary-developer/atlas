<div class="flex-row">
    <center>
        <div class="mb-3 font-weight-bold">Datos personales</div>
    </center>
</div>
<div class="row">
    <div class="form-group col-4">
      <label>Nombre *</label>
      {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control form-control-sm','placeholder'=>'Nombres de estudiante', 'required'])!!}
    </div>
    <div class="form-group col-4">
      <label>Apellido *</label>
      {!!Form::text('apellido',null,['id'=>'apellido','class'=>'form-control form-control-sm','placeholder'=>'Apellidos de estudiante', 'required'])!!}
    </div>
    <div class="form-group col-4">
      <label>NIE</label>
      {!! Form::text('nie',null,['id'=>'nie','class'=>'form-control form-control-sm','placeholder'=>'Ej. 000000','data-inputmask'=>"'mask' : '99999999'"]) !!}
    </div>

    <div class="form-group col-4">
        <label>Sexo *</label><br>
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

    <div class="form-group col-4">
      <label>Fecha de nacimiento *</label>
      @php
        $hoy = Carbon\Carbon::now();
        $hoy = $hoy->subYears(3);
        if($create){
          $fecha = $fecha->subYears(3);
        }else{
            $fecha = $estudiante->fechaNacimiento;
        }
      @endphp
      {!! Form::date('fechaNacimiento',$fecha,['max'=>$hoy->format('Y-m-d'),'id'=>'fechaNacimiento','class'=>'form-control form-control-sm has-feedback-left','required']) !!}
    </div>

    <div class="form-group col-4">
      <label>Lugar de nacimiento *</label>
      {!!Form::text('lugarNacimiento',null,['class'=>'form-control form-control-sm','placeholder'=>'Lugar de nacimiento','id'=>'lugarNacimiento', 'required'])!!}
    </div>

    <div class="form-group col-6">
        <label>Dirección *</label>
        {!! Form::textarea('direccion',null,['id'=>'direccion','class'=>'form-control form-control-sm','placeholder'=>'Dirección del estudiante','rows'=>'2', 'required']) !!}
    </div>

    @if ($create)
        <div class="form-group col-6">
            <label class="checkbox checkbox-success">
                <input type="checkbox" name="actaNacimiento" onchange="partidaNacimiento(this);"/>
                <span class="check-mark"></span> Posee partida de nacimiento
            </label>
            <div id="divPartida" class="input-group" style="display:none;">
                {!! Form::number('numero',null,['id'=>'numero','class'=>'form-control form-control-sm','placeholder'=>'Número']) !!}
                {!! Form::number('folio',null,['id'=>'folio','class'=>'form-control form-control-sm','placeholder'=>'Folio']) !!}
                {!! Form::number('tomo',null,['id'=>'tomo','class'=>'form-control form-control-sm','placeholder'=>'Tomo']) !!}
                {!! Form::number('libro',null,['id'=>'libro','class'=>'form-control form-control-sm','placeholder'=>'Libro']) !!}
            </div>
        </div>
    @elseif($partida)
        <div class="form-group col-6">
            <label class="checkbox checkbox-success">
                <input type="checkbox" name="actaNacimiento" onchange="partidaNacimiento(this);" checked/>
                <span class="check-mark"></span> Posee partida de nacimiento
            </label>
            <div id="divPartida" class="input-group">
                {!! Form::number('numero',$partida->numero,['id'=>'numero','class'=>'form-control form-control-sm','placeholder'=>'Número']) !!}
                {!! Form::number('folio',$partida->folio,['id'=>'folio','class'=>'form-control form-control-sm','placeholder'=>'Folio']) !!}
                {!! Form::number('tomo',$partida->tomo,['id'=>'tomo','class'=>'form-control form-control-sm','placeholder'=>'Tomo']) !!}
                {!! Form::number('libro',$partida->libro,['id'=>'libro','class'=>'form-control form-control-sm','placeholder'=>'Libro']) !!}
            </div>
        </div>
    @else
        <div class="form-group">
            <label class="checkbox checkbox-success">
                <input type="checkbox" name="actaNacimiento" onchange="partidaNacimiento(this);"/>
                <span class="check-mark"></span> Posee partida de nacimiento
            </label>
            <div id="divPartida" class="input-group" style="display:none;">
                {!! Form::number('numero',null,['id'=>'numero','class'=>'form-control form-control-sm','placeholder'=>'Número']) !!}
                {!! Form::number('folio',null,['id'=>'folio','class'=>'form-control form-control-sm','placeholder'=>'Folio']) !!}
                {!! Form::number('tomo',null,['id'=>'tomo','class'=>'form-control form-control-sm','placeholder'=>'Tomo']) !!}
                {!! Form::number('libro',null,['id'=>'libro','class'=>'form-control form-control-sm','placeholder'=>'Libro']) !!}
            </div>
        </div>
    @endif

    <div class="form-group col-3">
        <label>Zona de residencia *</label><br>
        <div class="form-group">
            <div class="btn-group">
                @if ($create)
                    <label class="radio radio-info">
                        <input type="radio" name="zonaResidencia" value="0" checked> <span class="check-mark"></span>Urbana
                    </label> &nbsp
                    <label class="radio radio-danger">
                        <input type="radio" name="zonaResidencia" value="1"> <span class="check-mark"></span>Rural
                    </label>
                @else
                    @if (!$estudiante->zonaResidencia)
                        <label class="radio radio-info">
                            <input type="radio" name="zonaResidencia" value="0" checked> <span class="check-mark"></span>Urbana
                        </label> &nbsp
                        <label class="radio radio-danger">
                            <input type="radio" name="zonaResidencia" value="1"> <span class="check-mark"></span>Rural
                        </label>
                    @else
                        <label class="radio radio-info">
                            <input type="radio" name="zonaResidencia" value="0"> <span class="check-mark"></span>Urbana
                        </label> &nbsp
                        <label class="radio radio-danger">
                            <input type="radio" name="zonaResidencia" value="1" checked> <span class="check-mark"></span>Rural
                        </label>
                    @endif
                @endif

            </div>
        </div>
    </div>

    @php
        if(!$create){
            $lugar = $estudiante->lugar;
            $tipo = $estudiante->tipo;
            $jornadaLaboral = $estudiante->jornadaLaboral;
        }else{
            $lugar = $tipo = $jornadaLaboral = null;
        }
    @endphp

    <div class="form-group col-3">
        <label> ¿Trabaja?</label><br>
        <div class="form-group">
            <div id="divTrabaja" class="btn-group">
                @if ($create)
                    <label class="radio radio-info">
                        <input type="radio" name="trabaja" id="siTrabaja" value="1"> <span class="check-mark"></span>Si
                    </label> &nbsp
                    <label class="radio radio-danger">
                        <input type="radio" name="trabaja" id="noTrabaja" value="0" checked> <span class="check-mark"></span>No
                    </label>
                @else
                    @if ($estudiante->trabaja)
                        <label class="radio radio-info">
                            <input type="radio" name="trabaja" id="siTrabaja" value="1" checked> <span class="check-mark"></span>Si
                        </label> &nbsp
                        <label class="radio radio-danger">
                            <input type="radio" name="trabaja" id="noTrabaja" value="0"> <span class="check-mark"></span>No
                        </label>
                        <script>
                            $(document).ready(function(){
                                $("#detallesTrabajo").show();
                            });
                        </script>
                    @else
                        <label class="radio radio-info">
                            <input type="radio" name="trabaja" id="siTrabaja" value="1"> <span class="check-mark"></span>Si
                        </label> &nbsp
                        <label class="radio radio-danger">
                            <input type="radio" name="trabaja" id="noTrabaja" value="0" checked> <span class="check-mark"></span>No
                        </label>
                    @endif
                @endif
            </div>
            &nbsp
            <button id="detallesTrabajo" type = "button" name="button" class="btn btn-outline-success btn-sm" onclick="trabajo();" data-toggle="tooltip" data-placement="left" title="Detalles" style="display:none;">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <input id="tipo" name="tipo" type="hidden" value="{{$tipo}}"/>
        <input id="lugar" name="lugar" type="hidden" value="{{$lugar}}"/>
        <input id="jornadaLaboral" name="jornadaLaboral" type="hidden" value="{!!$jornadaLaboral!!}"/>
    </div>

    @php
        if($create){
            $pais = "El Salvador";
            $nacionalidad = "Salvadoreño";
        }else{
            $pais = $estudiante->pais;
            $nacionalidad = $estudiante->nacionalidad;
        }
    @endphp
    <div class="form-group col-6">
        <label>País *</label>
        <div id="divNacionalidad" class="input-group">
            {!! Form::text('pais',$pais,['onkeyup'=>'verificarPais();','onblur'=>'verExtranjeria();','id'=>'pais','class'=>'form-control form-control-sm','placeholder'=>'Pais']) !!}
            {!! Form::text('nacionalidad',$nacionalidad,['id'=>'nacionalidad','class'=>'form-control form-control-sm','placeholder'=>'Nacionalidad']) !!}
            {!! Form::text('condicionExtranjeria',null,['id'=>'condicionExtranjeria','class'=>'form-control form-control-sm','placeholder'=>'Extranjeria','style'=>'display:none;']) !!}
        </div>
    </div>

    <div class="form-group col-4">
        <label>Estado Civil *</label>
        <select class="form-control form-control-sm" name="estadoCivil">
            @if ($create)
                <option value="Soltero">Soltero(a)</option>
                <option value="Casado">Casado(a)</option>
                <option value="Viudo">Viudo(a)</option>
            @else
                @if ($estudiante->estadoCivil == "Soltero")
                    <option value="Soltero" selected>Soltero(a)</option>
                @else
                    <option value="Soltero">Soltero(a)</option>
                @endif
                @if ($estudiante->estadoCivil == "Casado")
                    <option value="Casado" selected>Casado(a)</option>
                @else
                    <option value="Casado">Casado(a)</option>
                @endif
                @if ($estudiante->estadoCivil == "Viudo")
                    <option value="Viudo" selected>Viudo(a)</option>
                @else
                    <option value="Viudo">Viudo(a)</option>
                @endif
            @endif
        </select>
    </div>

    <div class="form-group col-4">
        <label>Correo electronico</label>
        {!! Form::email('correo',null,['id'=>'correo','class'=>'form-control form-control-sm','placeholder'=>'Dirección de correo']) !!}
    </div>


    <div class="form-group col-4" style="display: none" id="d-dui">
      <label>DUI <small class="text-secondary">(Estudiante)</small></label>
      {!! Form::text('dui',null,['id'=>'dui','class'=>'form-control form-control-sm','placeholder'=>'Ej. 00000000-0','data-inputmask'=>"'mask' : '99999999-9'"]) !!}
    </div>
</div>

<script>
    $("#fechaNacimiento").on('change',function(){
        var fecha = moment($(this).val());
        var hoy = moment();

        var dif = hoy.diff(fecha, 'years');

        if(dif > 17){
            $("#d-dui").show();
        }else{
            $("#d-dui").hide();
        }
    });

    $("#direccion").on('keyup',function(){
        $("#direccion_pariente_m").val($(this).val());
    });
</script>
