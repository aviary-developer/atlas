@extends('PDF.hoja')
@section('layout')
    <div class="flex-row">
        <center>
            <h3>
                Lista de estudiantes
            </h3>
        </center>
    </div>
    <div class="flex-row">
        <table class="table table-sm table-striped">
            <thead>
                <th>#</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>NIE</th>
                <th>Sexo</th>
                <th>Fecha de Nacimiento</th>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$estudiante->apellido}}</td>
                        <td>{{$estudiante->nombre}}</td>
                        <td>{{$estudiante->NIE}}</td>
                        <td>
                            @if ($estudiante->sexo)
                                Femenino
                            @else
                                Masculino
                            @endif
                        </td>
                        <td>
                            {{$estudiante->fechaNacimiento->format('d / m / Y')}}
                            <span class="badge badge-pill badge-secondary">
                                {{$estudiante->fechaNacimiento->age.' años'}}
                            </span>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
