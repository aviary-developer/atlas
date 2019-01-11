<div class="form-group col-6">
    <label>Sabe leer</label><br>
    <div class="form-group">
        <div id="radioBtn" class="btn-group">
            <label class="radio radio-info">
                <input id="sabe_leer-s-pariente" type="radio" name="sabe_leer-pariente" value="1" checked> <span class="check-mark"></span>Si
            </label> &nbsp
            <label class="radio radio-danger">
                <input id="sabe_leer-n-pariente" type="radio" name="sabe_leer-pariente" value="0"> <span class="check-mark"></span>No
            </label>
        </div>
    </div>
</div>
<div class="form-group col-6">
    <label>Sabe escribir</label><br>
    <div class="form-group">
        <div id="radioBtn" class="btn-group">
            <label class="radio radio-info">
                <input id="sabe_escribir-s-pariente" type="radio" name="sabe_escribir-pariente" value="1" checked> <span class="check-mark"></span>Si
            </label> &nbsp
            <label class="radio radio-danger">
                <input id="sabe_escribir-n-pariente" type="radio" name="sabe_escribir-pariente" value="0"> <span class="check-mark"></span>No
            </label>
        </div>
    </div>
</div>
<div class="form-group col-6">
    <label>Último grado de estudio</label>
    {!!Form::text('ultimo_grado-pariente',null,['id'=>'ultimo_grado-pariente','class'=>'form-control form-control-sm','placeholder'=>'Último grado de estudio de la persona'])!!}
</div>
@php
    $año_actual = date('Y');
@endphp
<div class="form-group col-6">
    <label>Último año de estudio</label>
    {!!Form::number('ultimo_anio-pariente',null,['id'=>'ultimo_anio-pariente','class'=>'form-control form-control-sm','placeholder'=>'Último año de estudio de la persona','step'=>'1','min'=>'1900','max'=>$año_actual])!!}
</div>
<div class="form-group col-6">
    <label>Fecha de nacimiento</label>
    @php
    $hoy_p = Carbon\Carbon::now();
    $hoy_p = $hoy_p->subYears(10);
    if($create){
        $hoy2 = Carbon\Carbon::now();
        $fecha_p = $hoy2->subYears(10);
    }
    @endphp
    {!! Form::date('fecha_nacimiento-pariente',$fecha_p,['max'=>$hoy_p->format('Y-m-d'),'id'=>'fecha_nacimiento-pariente','class'=>'form-control form-control-sm']) !!}
</div>
<div class="form-group col-6">
    <label>Nacionalidad</label>
    {!!Form::text('nacionalidad-pariente','Salvadoreño',['id'=>'nacionalidad-pariente','class'=>'form-control form-control-sm','placeholder'=>'Nacionalidad de la persona'])!!}
</div>
<div class="form-group col-6">
    <label>Estado Civil</label>
    <select class="form-control form-control-sm" name="estado_civil-pariente" id="estado_civil-pariente">
        <option value="Soltero">Soltero(a)</option>
        <option value="Casado">Casado(a)</option>
        <option value="Viudo">Viudo(a)</option>
    </select>
</div>
<div class="form-group col-6">
    <label>Ocupación</label>
    {!!Form::text('ocupacion-pariente',null,['id'=>'ocupacion-pariente','class'=>'form-control form-control-sm','placeholder'=>'Ocupación de la persona'])!!}
</div>
<div class="form-group col-6">
    <label>Lugar de trabajo</label>
    {!!Form::text('lugar_trabajo-pariente',null,['id'=>'lugar_trabajo-pariente','class'=>'form-control form-control-sm','placeholder'=>'Lugar de trabajo de la persona'])!!}
</div>
