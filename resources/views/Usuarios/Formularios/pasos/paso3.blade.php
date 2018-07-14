<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Username</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">john_doe</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Email ID</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">john_doe@email.com</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Full name</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">John Doe</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Gender</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">Male</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Date of birth</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">January 10, 1980</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Phone number</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">John Doe</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Address</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">111 W.App Ave. Suite 123, Sunway, CA</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">ZIP Code</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">94086</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Country</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">USA</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Card number</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2">**** 2086</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Card type</label>
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
