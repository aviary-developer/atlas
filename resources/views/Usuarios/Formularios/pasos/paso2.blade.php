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
      <div class="form-group has-error">
        <label>Contraseña</label>
      {!! Form::text('passwordEdit',null,['id'=>'passwordEdit','class'=>'form-control']) !!}
      <small class="text-danger">No se ha cambiado la contraseña</small>
    </div>
      <label>Confirme contraseña</label>
      <div class="form-group">
      {!! Form::text('passwordConfirm',null,['id'=>'passwordConfirm','class'=>'form-control']) !!}
    </div>
    @else
      <label></label>
      <button type="button" onclick="cambiarPassword();" class="btn btn-info btn-block">
        Cambiar contraseña
      </button>
    @endif
    </div>
  </div>
</div>
<div id="modalPassword" style="display:none;">
  <label>Nueva contraseña</label>
{!! Form::text('passwordEdit',null,['id'=>'passwordEditModal','class'=>'form-control']) !!}
<label>Confirme contraseña</label>
<div class="form-group">
{!! Form::text('passwordConfirm',null,['id'=>'passwordConfirmModal','class'=>'form-control']) !!}
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
        confirm:true
    },
    insert_brs: false,
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
});
notice.get().find('form.pf-form').on('click', '[name=cancel]', function() {
    notice.remove();
}).submit(function() {
    var username = $(this).find('input[name=username]').val();
    if (!username) {
        alert('Please provide a username.');
        return false;
    }
    notice.update({
        title: 'Welcome',
        text: 'Successfully logged in as ' + username,
        icon: true,
        width: PNotify.prototype.options.width,
        hide: true,
        buttons: {
            closer: true,
            sticker: true
        },
        type: 'success'
    });
    return false;
});
  }
</script>
