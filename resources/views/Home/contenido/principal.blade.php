<div class="bg-olive p-1 rounded-top mt-2">
    <center>
        <span class="text-light font-lg font-weight-light">
            Asistencia
        </span>
    </center>
</div>
<div class="bg-lime">
    <div class="row font-sm">
        <div class="col-2">
            <center>
                <b>Grado</b>
            </center>
        </div>
        <div class="col-1">
            <b>Sección</b>
        </div>
        <div class="col-2">
            <center>
                <b>Turno</b>
            </center>
        </div>
        <div class="col-2">
            <center>
                <b>Estado</b>
            </center>
        </div>
        <div class="col-1"></div>
        <div class="col-4">
            <div class="row">
                <div class="col-4">
                    <center><i class="fas fa-check"></i></center>
                </div>
                <div class="col-4">
                    <center><i class="fas fa-times"></i></center>
                </div>
                <div class="col-4">
                    <center><i class="fas fa-minus"></i></center>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-success rounded-bottom">
    @foreach ($grados_a as $grado)
        <div class="row px-2">
            <div class="col-2">
                <i class="fas fa-chevron-right"></i>
                {{$grado->grado}}
            </div>
            <div class="col-1">
                <center>
                    <span class="badge badge-dark">
                        {{$grado->seccion}}
                    </span>
                </center>
            </div>
            <div class="col-2">
                <center>
                    @if ($grado->turno)
                        <span class="badge bg-light col-10">
                            Matutino
                        </span>
                    @else
                        <span class="badge bg-aqua col-10">
                            Vespertino
                        </span>
                    @endif
                </center>
            </div>
            @php
                $asistencia = App\Asistencia::join('matriculas','asistencias.f_matricula','matriculas.id')->where('matriculas.f_grado',$grado->id)->whereDate('asistencias.fecha',date('Y-m-d'))->count();
                $a_asistio = App\Asistencia::join('matriculas','asistencias.f_matricula','matriculas.id')->where('matriculas.f_grado',$grado->id)->whereDate('asistencias.fecha',date('Y-m-d'))->where('asistencias.estado',1)->count();
                $a_no_asistio = App\Asistencia::join('matriculas','asistencias.f_matricula','matriculas.id')->where('matriculas.f_grado',$grado->id)->whereDate('asistencias.fecha',date('Y-m-d'))->where('asistencias.estado',0)->count();
                $a_permiso = App\Asistencia::join('matriculas','asistencias.f_matricula','matriculas.id')->where('matriculas.f_grado',$grado->id)->whereDate('asistencias.fecha',date('Y-m-d'))->where('asistencias.estado',2)->count();
            @endphp
            <div class="col-2">
                <center>
                    @if ($asistencia > 0)
                        <span class="badge badge-primary col-10">
                            Completo
                        </span>
                    @else
                        <span class="badge badge-danger col-10">
                            Pendiente
                        </span>
                    @endif
                </center>
            </div>
            <div class="col-1"></div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4">
                        <center>
                            <span class="badge bg-lime col-10">
                                {{$a_asistio}}
                            </span>
                        </center>
                    </div>
                    <div class="col-4">
                        <center>
                            <span class="badge badge-danger col-10">
                                {{$a_no_asistio}}
                            </span>
                        </center>
                    </div>
                    <div class="col-4">
                        <center>
                            <span class="badge bg-aqua col-10">
                                {{$a_permiso}}
                            </span>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
