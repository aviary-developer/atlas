<div class="row">
  <div class="col-12 col-lg-12">
    <center><label>Parientes cercanos que padezcan de alguno de los siguientes problemas o enfermedades</label></center>
    <button type="button" id="agregarEnfermedadParienteBoton" class="btn btn-outline-success btn-sm" onclick="agregarEnfermedad();" data-toggle="tooltip" data-placement="top" title="Agregar enfermedad" style="display:none;">
    <i class="fa fa-plus"></i>
    </button>
  <div id="divEnfermedadesPariente">
  <table class="table" id='tablaEnfermedadesPariente'>
    <thead>
      <th>Familia</th>
      <th>Asma</th>
      <th>Drogas</th>
      <th>Diabetes</th>
      <th>Tabaquismo</th>
      <th style="width : 120px">Presion alta</th>
      <th>Alcoholismo</th>
      <th>Renales</th>
      <th>Otros</th>
    </thead>
    <tbody>
      <tr>
        <td><strong>Madre</strong></td>
        <td><label class="checkbox checkbox-success">
          <input name="asma[]" type="checkbox"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="drogas[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="diabetes[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="tabaquismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="presionAlta[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="alcoholismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="renales[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control'])!!}</td>
      </tr>
      <tr>
        <td><strong>Padre</strong></td>
        <td><label class="checkbox checkbox-success">
          <input name="asma[]" type="checkbox"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="drogas[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="diabetes[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="tabaquismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="presionAlta[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="alcoholismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="renales[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control'])!!}</td>
      </tr>
      <tr>
        <td><strong>Hermanos</strong></td>
        <td><label class="checkbox checkbox-success">
          <input name="asma[]" type="checkbox"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="drogas[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="diabetes[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="tabaquismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="presionAlta[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="alcoholismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="renales[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control'])!!}</td>
      </tr>
      <tr>
        <td><strong>Tíos</strong></td>
        <td><label class="checkbox checkbox-success">
          <input name="asma[]" type="checkbox"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="drogas[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="diabetes[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="tabaquismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="presionAlta[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="alcoholismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="renales[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control'])!!}</td>
      </tr>
      <tr>
        <td><strong>Abuelos</strong></td>
        <td><label class="checkbox checkbox-success">
          <input name="asma[]" type="checkbox"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="drogas[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="diabetes[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="tabaquismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="presionAlta[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="alcoholismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="renales[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control'])!!}</td>
      </tr>
      <tr>
        <td><strong>Otro familiar</strong></td>
        <td><label class="checkbox checkbox-success">
          <input name="asma[]" type="checkbox"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="drogas[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="diabetes[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="tabaquismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="presionAlta[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="alcoholismo[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input name="renales[]" type="checkbox"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control'])!!}</td>
      </tr>
</tbody>
</table>
</div>
  </div>
</div>
