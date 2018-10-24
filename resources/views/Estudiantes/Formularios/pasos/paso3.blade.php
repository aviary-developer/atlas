<div class="row">
      <div class="col-12 col-lg-5">
        <div class="form-group">
          <center>
          <label>Tipo de vivienda</label>
        </center>
        <div class="form-group">
          <div class="btn-group">
              <label class="radio radio-info">
                <input type="radio" name="tipoVivienda" value="1"><span class="check-mark"></span>Propia
              </label> &nbsp&nbsp&nbsp&nbsp
              <label class="radio radio-info">
                <input type="radio" name="tipoVivienda" value="2"> <span class="check-mark"></span>Alquilada
              </label>&nbsp&nbsp&nbsp&nbsp
             <label class="radio radio-info">
               <input type="radio" name="tipoVivienda" value="3"> <span class="check-mark"></span>Prestada
             </label>&nbsp&nbsp&nbsp&nbsp
            <label class="radio radio-info">
              <input type="radio" name="tipoVivienda" value="4"> <span class="check-mark"></span>Precario
            </label>
          </div>
      </div>
        </div>
      </div>
      <div class="col-12 col-lg-5">
          <p class="text-right">Pago en concepto de vivienda:</p>
          <p class="text-right">Cantidad de personas que residen en la vivienda:</p>
        </div>
        <div class="col-12 col-lg-1">
          {!! Form::number('pagoVivienda',null,['class'=>'form-control form-control-sm','placeholder'=>'$']) !!}
          {!! Form::number('personasEnVivienda',null,['class'=>'form-control form-control-sm']) !!}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-lg-5">
        <div class="form-group">
          <center>
          <label>Estado de la casa</label>
        </center>
        <div class="form-group">
          <div class="btn-group">
              <label class="radio radio-info">
                <input type="radio" name="estadoCasa" value="1"><span class="check-mark"></span>Excelente
              </label> &nbsp&nbsp&nbsp&nbsp
              <label class="radio radio-info">
                <input type="radio" name="estadoCasa" value="2"> <span class="check-mark"></span>Muy buena
              </label>&nbsp&nbsp&nbsp&nbsp
             <label class="radio radio-info">
               <input type="radio" name="estadoCasa" value="3"> <span class="check-mark"></span>Regular
             </label>&nbsp&nbsp&nbsp&nbsp
            <label class="radio radio-info">
              <input type="radio" name="estadoCasa" value="4"> <span class="check-mark"></span>Mala
            </label>
          </div>
      </div>
        </div>
      </div>
      <div class="col-12 col-lg-3">
        <div class="form-group">
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
      </div>
      <div class="col-12 col-lg-2">
        <div class="form-group">
          <label>Ingreso familiar total</label>
          <div class="form-group">
          {!! Form::number('ingresoFamiliar',null,['class'=>'form-control','placeholder'=>'$']) !!}
        </div>
        </div>
      </div>
</div>
<div class="row">
  <div class="col-12 col-lg-3">
  </div>
  <div class="col-12 col-lg-2">
    <div class="form-group">
      <center><label><strong>Beneficios Sociales</strong></label></center>
      </div>
      </div>
</div>
<div class="row">
  <div class="col-12 col-lg-8">
    <div class="form-group">
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
      </div>
      </div>
</div>
<hr>
@if ($create)
  <div class="d-block d-md-flex">
    <div class="d-block d-md-inline ml-auto mb-3">
      <button type="submit" class="btn btn-success btn-block">
        Guardar
      </button>
    </div>
  </div>
@endif
