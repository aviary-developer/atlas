<div class="row">
  <div class="col-12 col-lg-6">
    <div class="form-group">
      <label>Nombre</label>
      {!!Form::text('nombre',null,['id'=>'nombre','class'=>'form-control form-control-sm','placeholder'=>'Nombres de usuario', 'required'])!!}
    </div>
  </div>
  <div class="col-12 col-lg-6">
    <div class="form-group">
      <label>Apellido</label>
      {!!Form::text('apellido',null,['id'=>'apellido','class'=>'form-control form-control-sm','placeholder'=>'Apellidos de usuario', 'required'])!!}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-lg-3">
    <div class="form-group">
      <label>Fecha de nacimiento</label>
      @php
        $hoy = Carbon\Carbon::now();
        $hoy = $hoy->subYears(12);
        if($create){
          $fecha = $fecha->subYears(12);
        }
      @endphp
      {!! Form::date('fechaNacimiento',$fecha,['max'=>$hoy->format('Y-m-d'),'id'=>'fechaNacimiento','class'=>'form-control form-control-sm has-feedback-left','required']) !!}
    </div>
  </div>
  <div class="col-12 col-lg-3">
    <div class="form-group">
      <label>Sexo</label><br>
      <div class="form-group">
        <div id="radioBtn" class="btn-group">
          @if ($create)
            <label class="radio radio-info">
              <input type="radio" name="sexo" value="0" checked> <span class="check-mark"></span>Masculino
            </label> &nbsp
            <label class="radio radio-danger">
              <input type="radio" name="sexo" value="1"> <span class="check-mark"></span>Femenino
            </label>
          @else
            @if(!$usuario->sexo)
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
  </div>
    <div class="col-12 col-lg-3">
      <div class="form-group">
        <label>DUI</label>
        {!! Form::text('dui',null,['id'=>'dui','class'=>'form-control form-control-sm','placeholder'=>'Ej. 00000000-0','data-inputmask'=>"'mask' : '99999999-9'", 'required']) !!}
      </div>
    </div>
    <div class="col-12 col-lg-3">
      <div class="form-group">
        <label>Correo</label>
      {!! Form::email('email',null,['id'=>'email','class'=>'form-control form-control-sm','placeholder'=>'Dirección correo electrónico', 'required']) !!}
      </div>
    </div>
</div>
<div class="row">
  <div class="col-12 col-lg-6">
    <label>Dirección</label>
    {!! Form::textarea('direccion',null,['id'=>'direccion','class'=>'form-control form-control-sm','placeholder'=>'Dirección del nuevo usuario','rows'=>'2', 'required']) !!}
  </div>
  <div class="col-12 col-lg-3">
    <div class="form-group">
      <label>Teléfono</label>
      <div class="input-group">
      {!! Form::text('telefono',null,['id'=>'telefonoUsuario','class'=>'form-control form-control-sm','placeholder'=>'Ej. 0000-0000','data-inputmask'=>"'mask' : '9999-9999'"]) !!}
        <div class="input-group-append">
          <button type="button" name="button" class="btn btn-outline-primary btn-sm" onclick="agregarTelefono();" data-toggle="tooltip" data-placement="top" title="Guardar teléfono">
          <i class="fa fa-save"></i>
          </button>
        </button>
    </div>
    </div>
</div>
</div>
  <div class="col-12 col-lg-3">
    <div class="form-group">
      <label></label>
      <table class="table table-sm" id='tablaTelefonos'>
        <thead>
          <th colspan="2">Teléfono</th>
          <th style="width : 80px">Acción</th>
        </thead>
        <tbody>
          @if (!$create)
            @foreach ($telefonos_usuarios as $key => $telUser)
              <tr>
                <td>
                  <input type="hidden" name="telefono[]" value = "{{$telUser->telefono}}"></input>
                </td>
                <td>{{$telUser->telefono}}</td>
                <td>
                  <button type = "button" name="button" class="btn btn-outline-danger btn-sm" onclick="eliminarTelefono(this);" data-toggle="tooltip" data-placement="top" title="Eliminar">
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
function agregarTelefono(){
    var telefono=$('#telefonoUsuario').val();
    if(telefono){
      var tabla=$('#tablaTelefonos');
      var html="<tr><td><input type='hidden' name='telefono[]' value = '"+telefono+"'></input></td><td>"+telefono+"</td><td><button type = 'button' name='button' class='btn btn-outline-danger btn-sm' onclick='eliminarTelefono(this);' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fa fa-trash'></i></button></td></tr>";
      tabla.append(html);
    new PNotify({
        type: 'success',
        text: 'Agregado'
    })
    $('#telefonoUsuario').val("");
  }else {
    new PNotify({
        type: 'error',
        text: 'Ingrese número teléfono'
    })
  }
  }

function eliminarTelefono(telefono){
    $(telefono).parent('td').parent('tr').remove();
    new PNotify({
        type: 'error',
        text: 'Eliminado'
    })
  }
  // });
</script>
