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
      <th>Tabaco</th>
      <th style="width : 70px">Presion alta</th>
      <th>Alcohol</th>
      <th>Renales</th>
      <th>Otros</th>
    </thead>
    <tbody>
      <tr>
        <td><strong>Madre</strong></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="0" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="0" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="0" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="0" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="0" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="0" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="0" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control form-control-sm'])!!}</td>
      </tr>
      <tr>
        <td><strong>Padre</strong></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control form-control-sm'])!!}</td>
      </tr>
      <tr>
        <td><strong>Hermanos</strong></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control form-control-sm'])!!}</td>
      </tr>
      <tr>
        <td><strong>Tíos</strong></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control form-control-sm'])!!}</td>
      </tr>
      <tr>
        <td><strong>Abuelos</strong></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control form-control-sm'])!!}</td>
      </tr>
      <tr>
        <td><strong>Otro familiar</strong></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="0" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)"/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',null,['class'=>'form-control form-control-sm'])!!}</td>
      </tr>
</tbody>
</table>
</div>
  </div>
</div>

<script>
    function check_act(o){
        console.log($(o).is(':checked'));
        var valor = $(o).parent('label').find('input:eq(0)');
        if($(o).is(":checked")){
            valor.val(1);
        }else{
            valor.val(0);
        }

    }
</script>
