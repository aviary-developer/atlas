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
      {!! Form::text('passwordEdit',null,['id'=>'password','class'=>'form-control', 'required']) !!}
      <small class="text-danger">No se ha cambiado la contraseña</small>
    </div>
      <label>Confirme contraseña</label>
      <div class="form-group">
      {!! Form::text('passwordConfirm',null,['id'=>'password','class'=>'form-control','required']) !!}
    </div>
    @else
      <label></label>
      <button type="button" class="btn btn-info btn-block">
        Cambiar contraseña
      </button>
    @endif
    </div>
  </div>
</div>
