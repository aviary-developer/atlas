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
        @if ($grado->numero > 2)
            @if ($grado->numero == 9 || $grado->numero == 10 || $grado->numero == 11)
                <input type="hidden" id="ciclo" value="3">
            @else
                <input type="hidden" id="ciclo" value="0">
            @endif
            <table class="table table-sm a-table" id="asignatura_show_table">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    @if ($grado->numero == 9 || $grado->numero == 10 || $grado->numero == 11)
                        <th>Responsable</th>
                    @endif
                    <th>Opción</th>
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
                                @php
                                    $relacion = App\AsignaturaGrado::where('f_grado',$grado->id)->where('f_asignatura',$asignatura->id)->first();
                                @endphp
                                <td>
                                    @include('Lectivos.partes.asesor_seleccion')
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
        @else
            <br><br><br>
            <center>
                <h4><i class="fas fa-exclamation-triangle text-warning"></i> Advertencia</h4>
                <span>El sistema no lleva el control de las asignaturas de parvularia.</span>
            </center>
        @endif
    </div>
</div>
@include('Lectivos.partes.agregar_docente')
