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
          @endif
        </select>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-3 col-lg-3">
    <div class="form-group">
      <label>Contraseña</label>
      @if($create)
      {!! Form::text('password','ENA'.str_pad($nuevoId,4,"0",STR_PAD_LEFT),['id'=>'password','class'=>'form-control','placeholder'=>'Nombre de usuario', 'required']) !!}
    @else
      {!! Form::password('password',null,['id'=>'password','class'=>'form-control','placeholder'=>'Nombre de usuario', 'required']) !!}
    @endif
    </div>
  </div>
</div>
