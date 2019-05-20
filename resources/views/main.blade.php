@extends('welcome')
@section('layout')
    {{-- Barra superior --}}

    <nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Atlas
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
    </div>
</nav>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <center>
                <h3>Bienvenido</h3>
                <h5>
                    {{Auth::user()->nombre.' '.Auth::user()->apellido}}
                </h5>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <center>
                <span>Fecha: <b>{{date('d / m / Y')}}</b></span>
            </center>
        </div>
        <div class="col-12">
            <center>
                <span>Año lectivo:
                    @php
                        $a_lectivo = App\Lectivo::where('estado',0)->first();
                        if($a_lectivo == null){
                            $anio = "Ninguno";
                        }else{
                            $anio = $a_lectivo->anio;
                        }
                    @endphp
                    <b class="badge badge-primary font-sm">{{$anio}}</b>
                </span>
            </center>
        </div>
    </div>
    <hr>
    <div class="flex-row">
        <center>
            <h4>Asistencia</h4>
        </center>
    </div>
    <div class="row">
        @php
            $grados_a = App\Grado::where('f_profesor',Auth::user()->id)->where('f_lectivo',$a_lectivo->id)->where('estado',0)->orderBy('numero')->get();
        @endphp
        @foreach ($grados_a as $grado)
            <div class="col-4 px-1 my-1">
                <div class="bg-light rounded border border-primary p-1">
                    <div class="row">
                        <div class="col-12">

                            <span class="text-primary font-lg ml-3">
                                {{$grado->grado}}
                            </span>
                            @php
                                if($grado->turno){
                                    $class = "badge badge-warning font-sm";
                                }else{
                                    $class = "badge badge-info font-sm";
                                }
                            @endphp
                            <span class="{{$class}}">
                                {{$grado->seccion}}
                            </span>
                            @php
                                //$asistencia = App\Asistencia::whereDate('fecha',date('Y-m-d'))->count();
                                $asistencia = App\Asistencia::join('matriculas','asistencias.f_matricula','matriculas.id')->where('matriculas.f_grado',$grado->id)->whereDate('asistencias.fecha',date('Y-m-d'))->count();
                                $a_asistio = App\Asistencia::join('matriculas','asistencias.f_matricula','matriculas.id')->where('matriculas.f_grado',$grado->id)->whereDate('asistencias.fecha',date('Y-m-d'))->where('asistencias.estado',1)->count();
                                $a_no_asistio = App\Asistencia::join('matriculas','asistencias.f_matricula','matriculas.id')->where('matriculas.f_grado',$grado->id)->whereDate('asistencias.fecha',date('Y-m-d'))->where('asistencias.estado',0)->count();
                                $a_permiso = App\Asistencia::join('matriculas','asistencias.f_matricula','matriculas.id')->where('matriculas.f_grado',$grado->id)->whereDate('asistencias.fecha',date('Y-m-d'))->where('asistencias.estado',2)->count();
                            @endphp
                            @if ($asistencia > 0)
                                <span class="badge badge-success float-right">Completo</span>
                            @else
                                <span class="badge badge-danger float-right">Pendiente</span>
                            @endif
                        </div>
                    </div>
                    <hr class="my-1">
                    <div class="row">
                        @if ($asistencia > 0)
                            <div class="col-4">
                                <center>
                                    <span class="col-8 badge border border-success text-success">
                                        <i class="fas fa-check"></i>
                                        {{$a_asistio.' est.'}}
                                    </span>
                                </center>
                            </div>
                            <div class="col-4">
                                <center>
                                    <span class="col-8 badge border border-danger text-danger">
                                        <i class="fas fa-times"></i>
                                        {{$a_no_asistio.' est.'}}
                                    </span>
                                </center>
                            </div>
                            <div class="col-4">
                                <center>
                                    <span class="col-8 badge border border-primary text-primary">
                                        <i class="fas fa-minus"></i>
                                        {{$a_permiso.' est.'}}
                                    </span>
                                </center>
                            </div>
                        @else
                            <div class="col-12">
                                <center>
                                    <span class="text-danger">
                                        Sin asistencia
                                    </span>
                                </center>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
