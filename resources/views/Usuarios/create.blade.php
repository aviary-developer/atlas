@extends('welcome')
@section('layout')
  @php
    $create=true;
    $fecha = Carbon\Carbon::now();
  @endphp
  @include('Usuarios.Barra.create')

  <div class="container-fluid">
    <div class="nav-tabs-responsive">
    <ul class="nav nav-tabs-progress nav-tabs-3 mb-3">
      <li class="nav-item">
        <a href="#personal" class="nav-link active" data-toggle="tab">
          <span class="font-lg">1.</span> Información personal
          <small class="d-block text-secondary">
            Datos personales del nuevo usuario
          </small>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cuenta" class="nav-link" data-toggle="tab">
          <span class="font-lg">2.</span> Información cuenta de usuario
          <small class="d-block text-secondary">
            Datos de la cuenta de usuario
          </small>
        </a>
      </li>
      <li class="nav-item">
        <a href="#resumen" class="nav-link" data-toggle="tab" onclick="vistaPrevia();">
          <span class="font-lg">3.</span> Resumen de datos
          <small class="d-block text-secondary">
            Vista previa de datos
          </small>
        </a>
      </li>
    </ul>
    <input type="hidden" id="method" value="create">
    {!!Form::open(['class' =>'tab-content','route' =>'usuarios.store','method' =>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'formUsuario'])!!}
   @include('Usuarios.Formularios.form')
    {!!Form::close()!!}

    <script>
        $("#save_me").click(async function(){
            var is_valid = true;
            var texto = "La información no es válida en los campos: ";
            var valido = new Validated('nombre');
            valido.required();
            valido.min(2);
            valido.max(30);
            is_valid = valido.value(is_valid);
            texto += (!valido.value(true))?'<br><i class="fas fa-times"></i> Nombre':'';

            var valido = new Validated('apellido');
            valido.required();
            valido.min(2);
            valido.max(30);
            is_valid = valido.value(is_valid);
            texto += (!valido.value(true))?'<br><i class="fas fa-times"></i> Apellido':'';

            var valido = new Validated('fechaNacimiento');
            valido.required();
            is_valid = valido.value(is_valid);
            texto += (!valido.value(true))?'<br><i class="fas fa-times"></i> Fecha de nacimiento':'';

            if($("#dui").val() == "00000000-0"){
                $("#dui").val("");
            }

            var valido = new Validated('dui');
            valido.required();
            is_valid = valido.value(is_valid);
            texto += (!valido.value(true))?'<br><i class="fas fa-times"></i> DUI':'';

            var valido = new Validated('email');
            valido.required();
            await valido.unique('users', 'email');
            is_valid = valido.value(is_valid);
            texto += (!valido.value(true))?'<br><i class="fas fa-times"></i> Email':'';

            var valido = new Validated('direccion');
            valido.required();
            is_valid = valido.value(is_valid);
            texto += (!valido.value(true))?'<br><i class="fas fa-times"></i> Dirección':'';

            var valido = new Validated('name');
            valido.required();
            valido.min(2);
            valido.max(30);
            await valido.unique('users', 'name');
            is_valid = valido.value(is_valid);
            texto += (!valido.value(true))?'<br><i class="fas fa-times"></i> Usuario':'';

            var valido = new Validated('password');
            valido.required();
            valido.min(4);
            is_valid = valido.value(is_valid);
            texto += (!valido.value(true))?'<br><i class="fas fa-times"></i> Contraseña':'';

            if(is_valid){
                $('#form').submit();
            }else{
                new PNotify({
                    title: 'Error',
                    text: texto,
                    icon: false,
                    type: 'error',
                    hide: false,
                    confirm: {
                        buttons: [{
                            text: "Aceptar"
                        }, {
                            text: "Cancelar"
                        }],
                        confirm: true
                    },
                    buttons: {
                        closer: false,
                        sticker: false
                    },
                    history: {
                        history: false
                    },
                    addclass: 'stack-modal',
                    stack: {
                        'dir1': 'down',
                        'dir2': 'right',
                        'modal': true
                    }
                });
            }
      });
    </script>
@endsection
