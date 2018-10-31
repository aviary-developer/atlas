@extends('welcome')
@section('layout')
  <?php
  $estadoOpuesto=true;
  ?>

  @include('Usuarios.Barra.index')

  <div class="container-fluid mt-3">
    <div class="table-responsive">
    <table class="table a-table table-sm table-hover table-striped">
      <thead>
      <th>#</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Rol</th>
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
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->apellido}}</td>
                <td>
                    @if ($usuario->tipoUsuario == "Docente")
                        <span class="badge badge-success col-8">
                            {{$usuario->tipoUsuario}}
                        </span>
                    @elseif($usuario->tipoUsuario == "Dirección")
                        <span class="badge badge-primary col-8">
                            {{$usuario->tipoUsuario}}
                        </span>
                    @else
                        <span class="badge badge-info col-8">
                            {{$usuario->tipoUsuario}}
                        </span>
                    @endif
                </td>
                <td>{{$usuario->dui}}</td>
                <td>
                    <center>
                        @include('Usuarios.Formularios.desactivate')
                    </center>
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
