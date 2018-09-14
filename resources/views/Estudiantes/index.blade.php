@extends('welcome')
@section('layout')
  <?php
  $estadoOpuesto=true;
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
      <a class="navbar-brand" href="#">
          Estudiantes
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link" href={!! asset('/estudiantes/create') !!}>
                      Nuevo
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href={!! asset('/estudiantes/')!!}>
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
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Fecha de nacimiento</th>
      <th>NIE</th>
      <th>Opciones</th>
      </thead>
      <tbody>
        @if ($estudiantes!=null)
              @php
              $correlativo = 1;
              @endphp
              @foreach ($estudiantes as $estudiante)
           <tr>
             <td>{{$correlativo}}</td>
             <td>{{$estudiante->nombre}}</td>
             <td>{{$estudiante->apellido}}</td>
             <td>{{$estudiante->fechaNacimiento}}</td>
             <td>{{$estudiante->nie}}</td>
             <td>
                @include('Estudiantes.Formularios.desactivate')
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
