@php
    if(!$create){
        $v = [];
        foreach ($enfermedad_parientes as $k => $enfermedad){
            $v[$k]['asma'] = $enfermedad->asma;
            $v[$k]['drogas'] = $enfermedad->drogas;
            $v[$k]['diabetes'] = $enfermedad->diabetes;
            $v[$k]['tabaco'] = $enfermedad->tabaco;
            $v[$k]['presion_alta'] = $enfermedad->presion_alta;
            $v[$k]['alcohol'] = $enfermedad->alcohol;
            $v[$k]['renales'] = $enfermedad->renales;
            $v[$k]['otros'] = $enfermedad->otros;

            $v[$k]['asma_e'] = ($enfermedad->asma)?'checked':'';
            $v[$k]['drogas_e'] = ($enfermedad->drogas)?'checked':'';
            $v[$k]['diabetes_e'] = ($enfermedad->diabetes)?'checked':'';
            $v[$k]['tabaco_e'] = ($enfermedad->tabaco)?'checked':'';
            $v[$k]['presion_alta_e'] = ($enfermedad->presion_alta)?'checked':'';
            $v[$k]['alcohol_e'] = ($enfermedad->alcohol)?'checked':'';
            $v[$k]['renales_e'] = ($enfermedad->renales)?'checked':'';
        }
    }else{
        for($k=0;$k<6;$k++){
            $v[$k]['asma'] = 0;
            $v[$k]['drogas'] = 0;
            $v[$k]['diabetes'] = 0;
            $v[$k]['tabaco'] = 0;
            $v[$k]['presion_alta'] = 0;
            $v[$k]['alcohol'] = 0;
            $v[$k]['renales'] = 0;
            $v[$k]['otros'] = null;

            $v[$k]['asma_e'] = '';
            $v[$k]['drogas_e'] = '';
            $v[$k]['diabetes_e'] = '';
            $v[$k]['tabaco_e'] = '';
            $v[$k]['presion_alta_e'] = '';
            $v[$k]['alcohol_e'] = '';
            $v[$k]['renales_e'] = '';
        }
    }
@endphp
<div class="row">
  <div class="col-12 col-lg-12">
    <center><label>Parientes cercanos que padezcan de alguno de los siguientes problemas o enfermedades</label></center>
    {{--  <button type="button" id="agregarEnfermedadParienteBoton" class="btn btn-outline-success btn-sm" onclick="agregarEnfermedad();" data-toggle="tooltip" data-placement="top" title="Agregar enfermedad" style="display:none;">
    <i class="fa fa-plus"></i>
    </button>  --}}
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
            <input type="hidden" value="{{$v[0]['asma']}}" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)" {{$v[0]['asma_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="{{$v[0]['drogas']}}" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)" {{$v[0]['drogas_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="{{$v[0]['diabetes']}}" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)" {{$v[0]['diabetes_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="{{$v[0]['tabaco']}}" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[0]['tabaco_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="{{$v[0]['presion_alta']}}" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)" {{$v[0]['presion_alta_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="{{$v[0]['alcohol']}}" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[0]['alcohol_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
            <input type="hidden" value="{{$v[0]['renales']}}" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)" {{$v[0]['renales_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',$v[0]['otros'],['class'=>'form-control form-control-sm'])!!}</td>
      </tr>
      <tr>
        <td><strong>Padre</strong></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[1]['asma']}}" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)" {{$v[1]['asma_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[1]['drogas']}}" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)" {{$v[1]['drogas_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[1]['diabetes']}}" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)" {{$v[1]['diabetes_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[1]['tabaco']}}" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[1]['tabaco_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[1]['presion_alta']}}" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)" {{$v[1]['presion_alta_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[1]['alcohol']}}" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[1]['alcohol_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[1]['renales']}}" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)" {{$v[1]['renales_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',$v[1]['otros'],['class'=>'form-control form-control-sm'])!!}</td>
      </tr>
      <tr>
        <td><strong>Hermanos</strong></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[2]['asma']}}" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)" {{$v[2]['asma_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[2]['drogas']}}" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)" {{$v[2]['drogas_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[2]['diabetes']}}" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)" {{$v[2]['diabetes_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[2]['tabaco']}}" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[2]['tabaco_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[2]['presion_alta']}}" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)" {{$v[2]['presion_alta_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[2]['alcohol']}}" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[2]['alcohol_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[2]['renales']}}" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)" {{$v[2]['renales_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',$v[2]['otros'],['class'=>'form-control form-control-sm'])!!}</td>
      </tr>
      <tr>
        <td><strong>Tíos</strong></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[3]['asma']}}" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)" {{$v[3]['asma_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[3]['drogas']}}" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)" {{$v[3]['drogas_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[3]['diabetes']}}" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)" {{$v[3]['diabetes_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[3]['tabaco']}}" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[3]['tabaco_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[3]['presion_alta']}}" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)" {{$v[3]['presion_alta_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[3]['alcohol']}}" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[3]['alcohol_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[3]['renales']}}" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)" {{$v[3]['renales_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',$v[3]['otros'],['class'=>'form-control form-control-sm'])!!}</td>
      </tr>
      <tr>
        <td><strong>Abuelos</strong></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[4]['asma']}}" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)" {{$v[4]['asma_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[4]['drogas']}}" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)" {{$v[4]['drogas_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[4]['diabetes']}}" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)" {{$v[4]['diabetes_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[4]['tabaco']}}" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[4]['tabaco_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[4]['presion_alta']}}" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)" {{$v[4]['presion_alta_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[4]['alcohol']}}" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[4]['alcohol_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[4]['renales']}}" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)" {{$v[4]['renales_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',$v[4]['otros'],['class'=>'form-control form-control-sm'])!!}</td>
      </tr>
      <tr>
        <td><strong>Otro familiar</strong></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[5]['asma']}}" name="asma[]">
          <input name="asma_e[]" type="checkbox" onclick="check_act(this)" {{$v[5]['asma_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[5]['drogas']}}" name="drogas[]">
          <input name="drogas_e[]" type="checkbox" onclick="check_act(this)" {{$v[5]['drogas_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[5]['diabetes']}}" name="diabetes[]">
          <input name="diabetes_e[]" type="checkbox" onclick="check_act(this)" {{$v[5]['diabetes_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[5]['tabaco']}}" name="tabaquismo[]">
          <input name="tabaquismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[5]['tabaco_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[5]['presion_alta']}}" name="presionAlta[]">
          <input name="presionAlta_e[]" type="checkbox" onclick="check_act(this)" {{$v[5]['presion_alta_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[5]['alcohol']}}" name="alcoholismo[]">
          <input name="alcoholismo_e[]" type="checkbox" onclick="check_act(this)" {{$v[5]['alcohol_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td><label class="checkbox checkbox-success">
          <input type="hidden" value="{{$v[5]['renales']}}" name="renales[]">
          <input name="renales_e[]" type="checkbox" onclick="check_act(this)" {{$v[5]['renales_e']}}/>
          <span class="check-mark"></span>
        </label></td>
        <td>{!!Form::text('otraEnfermedad[]',$v[5]['otros'],['class'=>'form-control form-control-sm'])!!}</td>
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
