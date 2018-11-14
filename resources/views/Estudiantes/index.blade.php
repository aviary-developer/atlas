@extends('welcome')
@section('layout')
  <?php
  $estadoOpuesto=true;
  ?>
    @include('Estudiantes.Barra.index')
  <div class="container-fluid mt-3">
    <div class="table-responsive">
    <table class="table a-table table-hover table-striped table-sm">
      <thead>
      <th>#</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Sexo</th>
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
             <td>
                 @if ($estudiante->sexo)
                    <span class="badge border border-danger text-danger">Femenino</span>
                 @else
                     <span class="badge border border-primary text-primary">Masculino</span>
                 @endif
             </td>
             <td>
                 {{$estudiante->fechaNacimiento->format('d / m / Y')}}
                <span class="badge badge-pill badge-primary">{{$estudiante->fechaNacimiento->age.' años'}}</span>
             </td>
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
