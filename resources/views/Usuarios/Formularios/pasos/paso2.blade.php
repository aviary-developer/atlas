<div class="row">
  <div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
      <label>Usuario</label>
      {!! Form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Nombre de usuario', 'required']) !!}
    </div>
  </div>
  <div class="col-12 col-md-3 col-lg-3">
    <div class="form-group">
      <label>Tipo de usuario</label>
      <div class="input-group">
        <div class="input-group-prepend">
        <span class="fa fa-user form-control" aria-hidden="true"></span>
        </div>
        <select class="form-control" name="tipoUsuario" id="tipoUsuario">
          @if($create)
            <option value="Dirección">Dirección</option>
            <option value="Subdirección">Subdirección</option>
            <option value="Docente">Docente</option>
          @else
            <option value="{{$usuario->tipoUsuario}}" selected>{{$usuario->tipoUsuario}}</option>
            <option value="Dirección">Dirección</option>
            <option value="Subdirección">Subdirección</option>
            <option value="Docente">Docente</option>
          @endif
        </select>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-3 col-lg-3">
    <div class="form-group">
      @if($create)
          <label>Contraseña</label>
      {!! Form::text('password','ENA'.str_pad($nuevoId,4,"0",STR_PAD_LEFT),['id'=>'password','class'=>'form-control','placeholder'=>'Nombre de usuario', 'required']) !!}
    @elseif ($password)
      <label></label>
      <button type="button" onclick="cambiarPassword();" class="btn btn-info btn-block">
        Cambiar contraseña
      </button>
      <div id="divNotificacionPasswordIgual">
        <center>
          <small class="badge badge-pill badge-danger">
            No se ha cambiado la contraseña.
          </small>
        </center>
      </div>
    @else
      <label></label>
      <button type="button" onclick="cambiarPassword();" class="btn btn-info btn-block">
        Cambiar contraseña
      </button>
    @endif
    <div id="divNotificacionPassword" style="display:none;">
      <center>
        <small class="badge badge-pill badge-warning">
          El cambio se efectuará al guardar.
        </small>
      </center>
    </div>
    <input type="hidden" id="nuevaContra" name="nuevaContra" value=""/>
    </div>
  </div>
</div>
<div id="modalPassword" style="display:none;">
  <div class="form-group">
  <label>Nueva contraseña</label>
{!! Form::password('passwordEdit',['id'=>'passwordEditModal','class'=>'form-control','autocomplete'=>'off']) !!}
</div>
<div class="form-group">
  <label>Confirme contraseña</label>
<div class="form-group">
{!! Form::password('passwordConfirm',['id'=>'passwordConfirmModal','class'=>'form-control','autocomplete'=>'off']) !!}
</div>
</div>
</div>
<script>
function cambiarPassword(){
  var notice = new PNotify({
    title: '<span class="badge badge-primary">Editar</span> Contraseña',
    text: $('#modalPassword').html(),
    icon: false,
    width: 'auto',
    type:'info',
    hide: false,
    buttons: {
        closer: true,
        sticker: false
    },
    confirm: {
        buttons: [{
            text: "Guardar"
        }, {
            text: "Cancelar"
        }],
        confirm:true,
    },
    insert_brs: false,
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
});
notice.get().on('pnotify.confirm', function() {
  var password = $(this).find('input[name=passwordEdit]').val();
  var passwordConfirm = $(this).find('input[name=passwordConfirm]').val();
  if(password==""){
    new PNotify({
    title: 'Error',
    text: 'Ingrese contraseña',
    type: 'error'
    });
  }else if(password===passwordConfirm){
    new PNotify({
    title: 'Hecho',
    text: 'Contraseña modificada',
    type: 'success'
    });
    $('#nuevaContra').val(password);
    $('#divNotificacionPasswordIgual').hide('slow');
    $('#divNotificacionPassword').show('slow');
  }else {
    new PNotify({
    title: 'Error',
    text: 'Contraseñas no coinciden',
    type: 'error'
    });
  }
}).on('pnotify.cancel', function() {
});
  }
</script>
