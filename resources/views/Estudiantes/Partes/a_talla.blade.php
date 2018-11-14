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
        {!! Form::number('pesoInicial',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Inicial']) !!}
        {!! Form::number('pesoMedio',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Medio']) !!}
        {!! Form::number('pesoFinal',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Final']) !!}
    </div>
</div>

<div class="form-group">
    <label>Talla (metros)</label>
    <div class="input-group">
        {!! Form::number('tallaInicial',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Inicial']) !!}
        {!! Form::number('tallaMedio',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Medio']) !!}
        {!! Form::number('tallaFinal',null,['id'=>'numero','class'=>'form-control','placeholder'=>'Final']) !!}
    </div>
</div>
