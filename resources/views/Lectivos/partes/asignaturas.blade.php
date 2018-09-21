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
        <table class="table table-sm a-table" id="asignatura_show_table">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                @if ($grado->numero == 9 || $grado->numero == 10 || $grado->numero == 11)
                    <th>Responsable</th>
                @endif
                <th style="width:55px">Opción</th>
                <th style="width:100px">Estado</th>
            </thead>
            <tbody>
                @php
                    $correlativo = 1;
                @endphp
                @foreach ($asignaturas as $asignatura)
                    <tr>
                        <td>{{$correlativo}}</td>
                        <td>{{$asignatura->nombre}}</td>
                        @if ($grado->numero== 9 || $grado->numero == 10 || $grado->numero == 11)
                            <td>
                                @if (App\AsignaturaGrado::asignatura_grado($asignatura->id,$grado->id))
                                    <center>
                                        <button type="button" class="btn btn-sm btn-success">
                                            <i class="fas fa-plus"></i> Agregar
                                        </button>
                                    </center>
                                @else
                                    Agregue la asignatura
                                @endif
                            </td>
                        @endif
                        <td>
                            <label class="switch switch-sm switch-to-success switch-danger">
                                @if (App\AsignaturaGrado::asignatura_grado($asignatura->id,$grado->id))
                                    <input type="checkbox" id="sw-add" data-value="{{$asignatura->id}}" checked/>
                                    <span class="switch-slider"></span>
                                @else
                                    <input type="checkbox" id="sw-add" data-value="{{$asignatura->id}}"/>
                                    <span class="switch-slider"></span>
                                @endif
                            </label>
                        </td>
                        <td>
                            @if (App\AsignaturaGrado::asignatura_grado($asignatura->id,$grado->id))
                                <span class="ml-2 badge border border-success text-success col-10">Activa</span>
                            @else
                                <span class="ml-2 badge border border-danger text-danger col-10">Inactiva</span>
                            @endif
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
