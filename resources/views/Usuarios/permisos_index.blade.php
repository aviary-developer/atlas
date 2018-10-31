@extends('welcome')
@section('layout')
  <?php
  $estadoOpuesto=true;
  ?>

  @include('Usuarios.Barra.permiso_index')

  <div class="container-fluid mt-3">
    <div class="table-responsive">
    <table class="table table-sm table-hover table-striped">
      <thead>
      <th>#</th>
      <th>Nombre</th>
      <th>Apellido</th>
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
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->apellido}}</td>
                <td>
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
