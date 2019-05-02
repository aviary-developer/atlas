@extends('welcome')
@section('layout')
    @include('Estudiantes.Barra.show')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-8">
                @php
                    if($grado == null){
                        $class = "row bg-danger rounded-right py-1";
                    }else{
                        $class = "row bg-success rounded-right py-1";
                    }
                @endphp
                <div class="{{$class}}">
                    <div class="col-10">
                        @if ($grado != null)
                            <span class="badge badge-light text-success font-lg">
                                {{$grado->grado}}
                            </span>
                            <span class="badge badge-dark font-lg">
                                {{$grado->seccion}}
                            </span>
                            <input type="hidden" id="id_m" value="{{$grado->f_matricula}}">
                        @else
                            <span class="badge badge-light text-danger font-lg">
                                ¡Estudiante sin matricula!
                            </span>
                        @endif
                    </div>
                    <div class="col-2">
                        <select name="anio" id="anio" class="form-control form-control-sm" onchange="reload_year(this)">
                            @foreach ($lectivos as $lectivo)
                                @if ($lectivo->id == $lectivo_a->id)
                                    <option value="{{$lectivo->id}}" selected>{{$lectivo->anio}}</option>
                                @else
                                    <option value="{{$lectivo->id}}">{{$lectivo->anio}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="nav-tabs-responsive">
                    <ul class="nav nav-tabs my-2">
                        <li class="nav-item">
                            <a href="#tb1" class="nav-link active" data-toggle="tab">
                            <i class="icon-calculator"></i> Notas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tb2" class="nav-link" data-toggle="tab">
                                <i class="icon-check"></i> Asistencia
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tab-contents">
                        <div id="tb1" class="tab-pane show active">
                            <div id="tb1-collapse" class="collapse" data-parent="#tab-contents">
                                @if ($grado != null)
                                    @include('Estudiantes.Partes.s_notas')
                                @else
                                    <center>
                                        El estudiante no posee notas en este año.
                                    </center>
                                @endif
                            </div>
                        </div>
                        <div id="tb2" class="tab-pane">
                            <div id="tb2-collapse" class="collapse" data-parent="#tab-contents">
                                @if ($grado != null)
                                    @include('Estudiantes.Partes.s_asistencia')
                                @else
                                    <center>
                                        El estudiante no posee registro de asistencia en este año.
                                    </center>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                @include('Estudiantes.Partes.s_acordeon')
            </div>
        </div>
    </div>
@endsection
<script>
    function reload_year(o){
        var url = new URL(window.location.href);
        url.searchParams.set('anio',$(o).val());
        window.location.href = url.href;
        window.location.reload;
    }
</script>
