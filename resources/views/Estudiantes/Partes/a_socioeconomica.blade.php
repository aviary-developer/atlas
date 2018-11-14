<div class="flex-row">
    <center>
        <div class="mb-3 font-weight-bold">
            Socioeconómica
        </div>
    </center>
</div>

<div class="form-group">
    <center>
        <label>Tipo de vivienda</label>
    </center>
    <div class="form-group">
        <div class="btn-group col-12">
            <label class="radio radio-info col-3">
                <input type="radio" name="tipoVivienda" value="1"><span class="check-mark"></span>Propia
            </label> &nbsp&nbsp&nbsp&nbsp
            <label class="radio radio-info col-3">
                <input type="radio" name="tipoVivienda" value="2"> <span class="check-mark"></span>Alquilada
            </label>&nbsp&nbsp&nbsp&nbsp
            <label class="radio radio-info col-3">
                <input type="radio" name="tipoVivienda" value="3"> <span class="check-mark"></span>Prestada
            </label>&nbsp&nbsp&nbsp&nbsp
            <label class="radio radio-info col-3">
                <input type="radio" name="tipoVivienda" value="4"> <span class="check-mark"></span>Precario
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <center>
        <label>Estado de la casa</label>
    </center>
    <div class="form-group">
        <div class="btn-group col-12">
            <label class="radio radio-info col-3">
                <input type="radio" name="estadoCasa" value="1"><span class="check-mark"></span>Excelente
            </label> &nbsp&nbsp&nbsp&nbsp
            <label class="radio radio-info col-3">
                <input type="radio" name="estadoCasa" value="2"> <span class="check-mark"></span>Muy buena
              </label>&nbsp&nbsp&nbsp&nbsp
             <label class="radio radio-info col-3">
               <input type="radio" name="estadoCasa" value="3"> <span class="check-mark"></span>Regular
            </label>&nbsp&nbsp&nbsp&nbsp
            <label class="radio radio-info col-3">
                <input type="radio" name="estadoCasa" value="4"> <span class="check-mark"></span>Mala
            </label>
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="form-group col-6">
        <label >Pago en concepto de vivienda</label>
        {!! Form::number('pagoVivienda',null,['class'=>'form-control form-control-sm','placeholder'=>'$']) !!}
    </div>
    <div class="form-group col-6">
        <label >Cantidad de personas que residen en la vivienda</label>
        {!! Form::number('personasEnVivienda',null,['class'=>'form-control form-control-sm']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-6">
        <label>¿Tiene acceso a internet?</label>
        <div class="form-group">
            <div class="btn-group">
                <label class="radio radio-info">
                    <input type="radio" name="internet" value="1"> <span class="check-mark"></span>Si
                </label>&nbsp&nbsp
                <label class="radio radio-info">
                    <input type="radio" name="internet" value="0"> <span class="check-mark"></span>No
                </label>
            </div>
        </div>
    </div>
    <div class="form-group col-6">
        <label>Ingreso familiar total</label>
        {!! Form::number('ingresoFamiliar',null,['class'=>'form-control form-control-sm','placeholder'=>'$']) !!}
    </div>
</div>
<br>
<div class="flex-row">
    <center>
        <div class="mb-3 font-weight-bold">
            Beneficios Sociales
        </div>
    </center>
</div>
<table class="table" id='tablaEnfermedadesPariente'>
    <thead>
        <th>Beca</th>
        <th>Bono Escolar</th>
        <th>Transporte</th>
        <th>¿Asiste con prioridad al comedor escolar?</th>
        <th>Otro tipo de ayuda</th>
    </thead>
    <tbody>
        <tr>
            <td><label class="checkbox checkbox-success">
                <input name="beca" type="checkbox"/>
                <span class="check-mark"></span>
                <span class="check-mark"></span>
            </label></td>
            <td><label class="checkbox checkbox-success">
                <input name="bonoEscolar" type="checkbox"/>
                <span class="check-mark"></span>
                <span class="check-mark"></span>
            </label></td>
            <td><label class="checkbox checkbox-success">
                <input name="transporte" type="checkbox"/>
                <span class="check-mark"></span>
                <span class="check-mark"></span>
            </label></td>
            <td><label class="checkbox checkbox-success">
                <input name="prioridadComedor" type="checkbox"/>
                <span class="check-mark"></span>
                <span class="check-mark"></span>
            </label></td>
            <td>
                {!!Form::text('tomaMedicamento[]',null,['class'=>'form-control'])!!}
            </td>
        </tr>
    </tbody>
</table>
