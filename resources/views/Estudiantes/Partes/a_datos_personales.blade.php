<div class="flex-row">
    <center>
        <div class="mb-3 font-weight-bold">Datos personales</div>
    </center>
</div>
<div class="row">
    <div class="form-group col-6">
      <label>Nombre</label>
      {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombres de estudiante', 'required'])!!}
    </div>
    <div class="form-group col-6">
      <label>Apellido</label>
      {!!Form::text('apellido',null,['id'=>'apellido','class'=>'form-control','placeholder'=>'Apellidos de estudiante', 'required'])!!}
    </div>
    <div class="form-group col-6">
      <label>NIE</label>
      {!! Form::text('nie',null,['id'=>'nie','class'=>'form-control','placeholder'=>'Ej. 000000','data-inputmask'=>"'mask' : '99999999'"]) !!}
    </div>
    <div class="form-group col-6">
      <label>DUI <small class="text-secondary">(Estudiante)</small></label>
      {!! Form::text('dui',null,['id'=>'dui','class'=>'form-control','placeholder'=>'Ej. 00000000-0','data-inputmask'=>"'mask' : '99999999-9'"]) !!}
    </div>
    <div class="form-group col-6">
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
    <div class="form-group col-6">
      <label>Lugar de nacimiento</label>
      {!!Form::text('lugarNacimiento',null,['class'=>'form-control','placeholder'=>'Lugar de nacimiento', 'required'])!!}
    </div>

    @if ($create)
        <div class="form-group col-6">
            <label class="checkbox checkbox-success">
                <input type="checkbox" name="actaNacimiento" onchange="partidaNacimiento(this);"/>
                <span class="check-mark"></span> Posee partida de nacimiento
            </label>
            <div id="divPartida" class="input-group" style="display:none;">
                {!! Form::number('numero',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Número']) !!}
                {!! Form::number('folio',null,['id'=>'folio','class'=>'form-control','placeholder'=>'Folio']) !!}
                {!! Form::number('tomo',null,['id'=>'tomo','class'=>'form-control','placeholder'=>'Tomo']) !!}
                {!! Form::number('libro',null,['id'=>'libro','class'=>'form-control','placeholder'=>'Libro']) !!}
            </div>
        </div>
    @elseif($partida)
        <div class="form-group col-6">
            <label class="checkbox checkbox-success">
                <input type="checkbox" name="actaNacimiento" onchange="partidaNacimiento(this);" checked/>
                <span class="check-mark"></span> Posee partida de nacimiento
            </label>
            <div id="divPartida" class="input-group">
                {!! Form::number('numero',$partida->numero,['id'=>'numero','class'=>'form-control','placeholder'=>'Número']) !!}
                {!! Form::number('folio',$partida->folio,['id'=>'folio','class'=>'form-control','placeholder'=>'Folio']) !!}
                {!! Form::number('tomo',$partida->tomo,['id'=>'tomo','class'=>'form-control','placeholder'=>'Tomo']) !!}
                {!! Form::number('libro',$partida->libro,['id'=>'libro','class'=>'form-control','placeholder'=>'Libro']) !!}
            </div>
        </div>
    @else
        <div class="form-group">
            <label class="checkbox checkbox-success">
                <input type="checkbox" name="actaNacimiento" onchange="partidaNacimiento(this);"/>
                <span class="check-mark"></span> Posee partida de nacimiento
            </label>
            <div id="divPartida" class="input-group" style="display:none;">
                {!! Form::number('numero',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Número']) !!}
                {!! Form::number('folio',null,['id'=>'folio','class'=>'form-control','placeholder'=>'Folio']) !!}
                {!! Form::number('tomo',null,['id'=>'tomo','class'=>'form-control','placeholder'=>'Tomo']) !!}
                {!! Form::number('libro',null,['id'=>'libro','class'=>'form-control','placeholder'=>'Libro']) !!}
            </div>
        </div>
    @endif

    <div class="form-group col-6">
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

    <div class="form-group col-6">
        <label>Dirección</label>
        {!! Form::textarea('direccion',null,['id'=>'direccion','class'=>'form-control','placeholder'=>'Dirección del estudiante','rows'=>'2', 'required']) !!}
    </div>
    <div class="form-group col-6">
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
    <div class="form-group col-6">
        <label>Pais</label>
        <div id="divNacionalidad" class="input-group">
            {!! Form::text('pais',null,['onkeyup'=>'verificarPais();','onblur'=>'verExtranjeria();','id'=>'pais','class'=>'form-control','placeholder'=>'Pais']) !!}
            {!! Form::text('nacionalidad',null,['id'=>'nacionalidad','class'=>'form-control','placeholder'=>'Nacionalidad']) !!}
            {!! Form::text('condicionExtranjeria',null,['id'=>'condicionExtranjeria','class'=>'form-control','placeholder'=>'Extranjeria','style'=>'display:none;']) !!}
        </div>
    </div>
    <div class="form-group col-6">
        <label>Correo electronico</label>
        {!! Form::email('correo',null,['id'=>'correo','class'=>'form-control','placeholder'=>'Dirección de correo']) !!}
    </div>
    <div class="form-group col-6">
        <label>Estado Civil</label>
        <select class="form-control" name="estadoCivil">
            <option value="Soltero">Soltero(a)</option>
            <option value="Casado">Casado(a)</option>
            <option value="Viudo">Viudo(a)</option>
        </select>
    </div>
    <div class="form-group col-6">
        <label> ¿Trabaja?</label><br>
        <div class="form-group">
            <div id="divTrabaja" class="btn-group">
                <label class="radio radio-info">
                    <input type="radio" name="trabaja" id="siTrabaja" value="1"> <span class="check-mark"></span>Si
                </label> &nbsp
                <label class="radio radio-danger">
                    <input type="radio" name="trabaja" id="noTrabaja" value="0" checked> <span class="check-mark"></span>No
                </label>
            </div>
            &nbsp
            <button id="detallesTrabajo" type = "button" name="button" class="btn btn-outline-success btn-sm" onclick="trabajo();" data-toggle="tooltip" data-placement="left" title="Detalles" style="display:none;">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <input id="tipo" name="tipo" type="hidden"/>
        <input id="lugar" name="lugar" type="hidden"/>
        <input id="jornadaLaboral" name="jornadaLaboral" type="hidden"/>
    </div>
</div>
