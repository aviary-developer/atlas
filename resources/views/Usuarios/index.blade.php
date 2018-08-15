@extends('welcome')
@section('layout')
  <?php
  $estadoOpuesto=true;
  ?>
  <h1>Usuarios</h1>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-7 col-xs-12">
        <div class="form-group">
          <div class="btn-group">
          <a href={!! asset('/usuarios/create') !!} class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Nuevo</a>
          <a href={!! asset('/usuarios/')!!} class="btn btn-dark btn-sm"><i class="fa fa-user"></i> Mi Perfil</a>
          <a href="" class="btn btn-dark btn-sm"><i class="fa fa-file"></i> Reporte</a>
          <a href="" class="btn btn-dark btn-sm">
            @if ($estadoOpuesto)
              <i class="fa fa-check"></i> Activos
              <span class="label label-success"></span>
            @else
              <i class="fa fa-trash"></i> Papelera
              <span class="label label-warning"></span>
            @endif
          </a>
          <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-question"></i> Ayuda</button>
        </div>
        </div>
      </div>
    </div>
    <div class="table-responsive">
    <table class="table" id="tablaIndex">
      <thead>
      <th>#</th>
      <th>Usuario</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Rol usuario</th>
      <th>DUI</th>
      <th>Opciones</th>
      </thead>
      <tbody>
        @if ($usuarios!=null)
              @php
              $correlativo = 1;
              @endphp
              @foreach ($usuarios as $usuario)
           <tr>
             <td>{{$correlativo}}</td>
             <td>{{$usuario->name}}</td>
             <td>{{$usuario->nombre}}</td>
             <td>{{$usuario->apellido}}</td>
             <td>{{$usuario->tipoUsuario}}</td>
             <td>{{$usuario->dui}}</td>
             <td>
                @include('Usuarios.Formularios.desactivate')
             </td>
           </tr>
           @php
           $correlativo++;
           @endphp
         @endforeach
       @endif
         </tbody>
  </table>
  </div>
  </div>
@endsection
