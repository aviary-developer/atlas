<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Nombres</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2" id="divNombre"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Apellidos</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2" id="divApellido"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Fecha de nacimiento</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2" id="divFecha"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Sexo</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2" id="divSexo"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">DUI</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2" id="divDui"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Correo electrónico</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2" id="divCorreo"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Dirección</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2" id="divDireccion"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Teléfono</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2" id="divTelefono"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Usuario</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2" id="divNombreUsuario"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Tipo de usuario</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2" id="divTipoUsuario"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-3 col-lg-2">
        <label class="text-secondary">Contraseña</label>
      </div>
      <div class="col-12 col-md-9 col-lg-10">
        <div class="mb-2" id="divPassword"></div>
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
<script>
async function vistaPrevia(){
    var nombre=$("#nombre").val();
    var apellido=$("#apellido").val();
    var fechaNacimiento=$("#fechaNacimiento").val();
    var sexo=$('input:radio[name=sexo]:checked').val();
    var dui=$("#dui").val();
    var email=$("#email").val();
    var direccion=$("#direccion").val();
    var telefono=$("#tablaTelefonos tbody tr");
    var name=$("#name").val();
    var tipoUsuario=$("#tipoUsuario option:selected").text();
    var password=$("#password").val();
    resetDivs();
    $("#divNombre").text(nombre);
    $("#divApellido").text(apellido);
    fechaNacimiento=convertirFormatoFecha(fechaNacimiento);
    $("#divFecha").text(fechaNacimiento);
    if(sexo==0){
      sexo="Masculino";
    }else {
      sexo="Femenino"
    }
    $("#divSexo").text(sexo);
    $("#divDui").text(dui);
    $("#divCorreo").text(email);
    $("#divDireccion").text(direccion);
    await telefono.each(function(index, element){
    tel=$(element).find("td").eq(1).html();
 $("#divTelefono").append('<i class="icon-phone"></i> ');
 $("#divTelefono").append(tel);
 $("#divTelefono").append('<br>');
 });
    $("#divNombreUsuario").text(name);
    $("#divTipoUsuario").text(tipoUsuario);
    $("#divPassword").text(password);
  }
  function resetDivs(){
    $("#divNombre").text('');
    $("#divApellido").text('');
    $("#divFecha").text('');
    $("#divSexo").text('');
    $("#divDui").text('');
    $("#divCorreo").text('');
    $("#divDireccion").text('');
    $("#divTelefono").text('');
    $("#divNombreUsuario").text('');
    $("#divTipoUsuario").text('');
    $("#divPassword").text('');
  }
</script>
