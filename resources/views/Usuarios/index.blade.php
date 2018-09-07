@extends('welcome')
@section('layout')
  <?php
  $estadoOpuesto=true;
  ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
        <a class="navbar-brand" href="#">
            Usuarios
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href={!! asset('/usuarios/create') !!}>
                        Nuevo
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={!! asset('/usuarios/')!!}>
                        Mi Perfil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={!! asset('#')!!}>
                        Reporte
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Ayuda
                    </a>
                </li>
            </ul>
        </div>
    </nav>

  <div class="container-fluid mt-3">
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
