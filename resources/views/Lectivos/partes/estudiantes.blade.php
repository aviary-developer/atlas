<div class="flex-row">
    <center>
        <button type="button" class="btn btn-lg btn-success" data-target="#m_estudiante_buscar" data-toggle="modal">
            <i class="fas fa-plus"></i> Agregar Estudiante
        </button>
    </center>
</div>
<hr>
<div class="flex-row mt-3">
    @if ($estudiantes->count() == 0)
        <center>
            No hay ningun estudiante asignado a este grado
        </center>
    @else
        <table class="table table-sm table-hover table-striped">
            <thead>
                <th>#</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Sexo</th>
                <th>Fecha de nacimiento</th>
                <th>NIE</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @php
                    $correlativo = 1;
                @endphp
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{$correlativo}}</td>
                        <td>{{$estudiante->apellido}}</td>
                        <td>{{$estudiante->nombre}}</td>
                        <td>
                            @if ($estudiante->sexo)
                                <span class="badge border border-danger text-danger">Femenino</span>
                            @else
                                <span class="badge border border-primary text-primary">Masculino</span>
                            @endif
                        </td>
                        <td>
                            {{$estudiante->fechaNacimiento->format('d/m/Y')}}
                            <span class="badge badge-pill badge-primary">{{$estudiante->fechaNacimiento->age.' años'}}</span>
                        </td>
                            <td>
                                @if ($estudiante->nie == null)
                                    <span class="badge border border-secondary text-secondary col-10">
                                        Vacio
                                    </span>
                                @else
                                    {{$estudiante->nie}}
                                @endif
                            </td>
                        <td>
                        </td>
                    </tr>
                    @php
                        $correlativo++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@include('Lectivos.modal.buscar_estudiante')
