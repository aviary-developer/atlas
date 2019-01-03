<div class="flex-row">
    <center>
        <div class="mb-3 font-weight-bold">
            Talla y peso
        </div>
    </center>
</div>
<div class="form-group">
    <label>Peso (Kilogramos)</label>
    <div class="input-group">
        {!! Form::number('peso_inicial',null,['class'=>'form-control form-control-sm','placeholder'=>'Inicial','step'=>'0.01','min'=>'0.00']) !!}
        {!! Form::number('peso_medio',null,['class'=>'form-control form-control-sm','placeholder'=>'Medio','step'=>'0.01','min'=>'0.00']) !!}
        {!! Form::number('peso_final',null,['class'=>'form-control form-control-sm','placeholder'=>'Final','step'=>'0.01','min'=>'0.00']) !!}
    </div>
</div>

<div class="form-group">
    <label>Talla (metros)</label>
    <div class="input-group">
        {!! Form::number('talla_inicial',null,['class'=>'form-control form-control-sm','placeholder'=>'Inicial','step'=>'0.01','min'=>'0.00']) !!}
        {!! Form::number('talla_medio',null,['class'=>'form-control form-control-sm','placeholder'=>'Medio','step'=>'0.01','min'=>'0.00']) !!}
        {!! Form::number('talla_final',null,['class'=>'form-control form-control-sm','placeholder'=>'Final','step'=>'0.01','min'=>'0.00']) !!}
    </div>
</div>
