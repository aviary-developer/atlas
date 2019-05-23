<table class="table table-sm table-striped">
    <thead>
        <th>#</th>
        <th>NIE</th>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>Fecha nacimiento</th>
        <th>Estado</th>
    </thead>
    <tbody>
        @php
            $correlativo = 1;
        @endphp
        @foreach ($estudiantes_a as $estudiante)
            <tr>
                <td>{{$correlativo}}</td>
                <td>{{($estudiante->nie == null)?'--':$estudiante->nie}}</td>
                <td>{{$estudiante->apellido}}</td>
                <td>{{$estudiante->nombre}}</td>
                <td>
                    {{$estudiante->fechaNacimiento->format('d / m / Y')}}
                    <span class="badge badge-pill badge-primary">
                        {{$estudiante->fechaNacimiento->age.' años'}}
                    </span>
                </td>
                <td>
                    @if ($estudiante->estado)
                        <span class="badge badge-success col-10">
                            Activo
                        </span>
                    @else
                        <span class="badge badge-danger col-10">
                            Retirado
                        </span>
                    @endif
                </td>
            </tr>
            @php
                $correlativo++;
            @endphp
        @endforeach
    </tbody>
</table>
