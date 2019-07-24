@extends('PDF.hoja')
@section('layout')
    <div class="flex-row">
        <center>
            <h3>
                Listado de estudiantes reprobados
            </h3>
        </center>
    </div>
    <div class="row">
        <div class="col-3">
            <span>
                Año Lectivo:
                <b>
                    {{$lectivo->anio}}
                </b>
            </span>
        </div>
    </div>
    <br>
    @if ($estudiantes != null)
        <div class="flex-row">
            <table class="table table-sm table-striped">
                <thead>
                    <th>#</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>NIE</th>
                    <th>Sexo</th>
                    <th>Grado</th>
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
                                {{$estudiante->grado.' "'.$estudiante->seccion.'"'}}
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
    @endif
@endsection
