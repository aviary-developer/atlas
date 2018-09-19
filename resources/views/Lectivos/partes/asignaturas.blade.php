<div class="flex-row">
    <center>
        <span class="mb-3 font-weight-bold">
            Asignaturas
            <i class="icon-briefcase"></i>
        </span>
    </center>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-sm" id="tablaIndex">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th class="w-25">Opción</th>
            </thead>
            <tbody>
                @php
                    $correlativo = 1;
                @endphp
                @foreach ($asignaturas as $asignatura)
                    <tr>
                        <td>{{$correlativo}}</td>
                        <td>{{$asignatura->nombre}}</td>
                        <td>
                            <label class="switch switch-sm switch-to-success switch-danger">
                                @if (App\AsignaturaGrado::asignatura_grado($asignatura->id,$grado->id))
                                    <input type="checkbox" id="sw-add" checked/>
                                    <span class="switch-slider"></span>
                                    <span class="ml-2 badge border border-success text-success col-sm-6">Activa</span>
                                @else
                                    <input type="checkbox" id="sw-add"/>
                                    <span class="switch-slider"></span>
                                    <span class="ml-2 badge border border-danger text-danger col-sm-6">Inactiva</span>
                                @endif
                            </label>
                        </td>
                    </tr>
                    @php
                        $correlativo++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
