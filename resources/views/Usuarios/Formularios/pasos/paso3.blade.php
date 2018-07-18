<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Nombres</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">john_doe</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Apellidos</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">john_doe@email.com</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Fecha de nacimiento</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">John Doe</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Sexo</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">Male</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">DUI</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">January 10, 1980</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Correo electrónico</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">John Doe</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Dirección</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">111 W.App Ave. Suite 123, Sunway, CA</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Teléfono</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">94086</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Usuario</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">USA</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Tipo de usuario</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">**** 2086</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Contraseña</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">VISA</div>
      </div>
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
@else
  <div class="d-block d-md-flex">
    <div class="d-block d-md-inline ml-auto mb-3">
      <button type="submit" class="btn btn-success btn-block">
        Editar
      </button>
    </div>
  </div>
@endif
