<div class="form-group col-6">
    <label>Nombre *</label>
    {!!Form::text('nombre_pariente_m',null,['id'=>'nombre_pariente_m','class'=>'form-control form-control-sm','placeholder'=>'Nombre de la persona'])!!}
</div>
<div class="form-group col-6">
    <label>Apellido *</label>
    {!!Form::text('apellido_pariente_m',null,['id'=>'apellido_pariente_m','class'=>'form-control form-control-sm','placeholder'=>'Apellido de la persona'])!!}
</div>
<div class="form-group col-6">
    <label>Sexo *</label><br>
    <div class="form-group">
        <div id="radioBtn" class="btn-group">
            <label class="radio radio-info">
                <input id="sexo_m_pariente" type="radio" name="sexo_pariente" value="0" checked> <span class="check-mark"></span>Masculino
            </label> &nbsp
            <label class="radio radio-danger">
                <input id="sexo_f_pariente" type="radio" name="sexo_pariente" value="1"> <span class="check-mark"></span>Femenino
            </label>
        </div>
    </div>
</div>
<div class="form-group col-6">
    <label>Correo electrónico</label>
    {!!Form::email('correo_pariente_m',null,['id'=>'correo_pariente_m','class'=>'form-control form-control-sm','placeholder'=>'Correo electrónico de la persona'])!!}
</div>
<div class="form-group col-6">
    <label>Télefono fijo</label>
    {!! Form::text('telefono_fijo_pariente_m',null,['id'=>'telefono_fijo_pariente_m','class'=>'form-control form-control-sm','placeholder'=>'Ej. 0000-0000','data-inputmask'=>"'mask' : '9999-9999'"]) !!}
</div>
<div class="form-group col-6">
    <label>Télefono celular</label>
    {!! Form::text('telefono_celular_pariente_m',null,['id'=>'telefono_celular_pariente_m','class'=>'form-control form-control-sm','placeholder'=>'Ej. 0000-0000','data-inputmask'=>"'mask' : '9999-9999'"]) !!}
</div>
<div class="form-group col-6">
    <label>Dirección *</label>
    {!! Form::textarea('direccion_pariente_m',null,['id'=>'direccion_pariente_m','class'=>'form-control form-control-sm','placeholder'=>'Dirección de la persona','rows'=>'2']) !!}
</div>
<div class="form-group col-6">
    <label>Parentesco *</label>
    {!!Form::text('parentesco_m',null,['id'=>'parentesco_m','class'=>'form-control form-control-sm','placeholder'=>'Parentesco de la persona'])!!}
</div>
<div class="form-group col-6">
    <label>Responsable del estudiante *</label><br>
    <div class="form-group">
        <div id="radioBtn" class="btn-group">
            <label class="radio radio-danger">
                <input id="responsable_s_pariente" type="radio" name="responsable_pariente" value="1"> <span class="check-mark"></span>Si
            </label>
            &nbsp
            <label class="radio radio-info">
                <input id="responsable_n_pariente" type="radio" name="responsable_pariente" value="0" checked> <span class="check-mark"></span>No
            </label>
        </div>
    </div>
</div>
