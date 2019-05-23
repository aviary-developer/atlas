@extends('welcome')
@section('layout')
    {{-- Title bar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
        <a class="navbar-brand" href="#">
            Inicio
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
        </div>
    </nav>
    {{-- Body page --}}

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-9">
                <div class="bg-primary p-1 rounded-top">
                    <center>
                        <span class="text-light font-lg font-weight-light">
                            @if (!$user->sexo)
                                ¡Bienvenido!
                            @else
                                ¡Bienvenida!
                            @endif
                        </span>
                        <br>
                        <span class="text-uppercase font-sm text-light font-weight-bold">
                            {{$user->nombre.' '.$user->apellido}}
                        </span>
                    </center>
                </div>
                <div class="rounded-bottom bg-info">
                    <div class="row">
                        <div class="col-9">
                            <span class="text-light px-2">
                                <i class="fas fa-calendar"></i>
                                <b class="text-uppercase text-center font-sm">
                                    @php
                                        setlocale(LC_ALL,"es_ES","esp");
                                        echo strftime("%A, %d de %B del %Y");
                                    @endphp
                                </b>
                            </span>
                        </div>
                        <div class="col-3">
                            <span class="text-light px-2">
                                <i class="fas fa-calendar-check"></i>
                                <b class="text-uppercase font-sm">
                                    {{'Año lectivo '.$lectivo->anio}}
                                </b>
                            </span>
                        </div>
                    </div>
                </div>
                @if ($ruta == null)
                    @include('Home.contenido.principal')
                @else
                    <div class="rounded p-1 mt-2">
                        <div class="nav-tabs-responsive">
                            <ul class="nav nav-tabs mb-2">
                                <li class="nav-item">
                                    <a href="#tb1" class="nav-link active" data-toggle="tab">
                                    <i class="icon-user"></i> Estudiantes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tb2" class="nav-link" data-toggle="tab">
                                        <i class="icon-calculator"></i> Notas
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-contents">
                                <div id="tb1" class="tab-pane show active">
                                    <div id="tb1-collapse" class="collapse p-1" data-parent="#tab-contents">
                                       @include('Home.contenido.lista_estudiante')
                                    </div>
                                </div>
                                <div id="tb2" class="tab-pane">
                                    <div id="tb2-collapse" class="collapse" data-parent="#tab-contents">
                                        @include('Home.contenido.notas')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-3">
                <div class="bg-gray p-1 rounded-top">
                    <center>
                        <span class="text-white font-lg font-weight-light">
                            Grados
                        </span>
                    </center>
                </div>
                <div class="bg-light rounded-bottom pb-1">
                    <center>
                        @if ($ruta == null)
                            <a href="{{asset('/inicio')}}" class="btn btn-sm btn-primary col-10 m-1 mt-2">
                                Todos
                            </a>
                        @else
                            <a href="{{asset('/inicio')}}" class="btn btn-sm bg-silver text-dark col-10 m-1 mt-2">
                                Todos
                            </a>
                        @endif
                        @foreach ($grados as $grado)
                            @if ($ruta == $grado->id)
                                <a href="{{asset('/inicio?grado='.$grado->id)}}" class="btn btn-sm btn-primary col-10 m-1">
                                    {{$grado->grado}} <span class="badge badge-dark float-right">{{$grado->seccion}}</span>
                                </a>
                            @else
                                <a href="{{asset('/inicio?grado='.$grado->id)}}" class="btn btn-sm bg-silver text-dark col-10 m-1">
                                    {{$grado->grado}} <span class="badge badge-dark float-right">{{$grado->seccion}}</span>
                                </a>
                            @endif
                        @endforeach
                    </center>
                </div>
                @if ($ruta != null)
                    @include('Home.contenido.estadistica')
                @endif
            </div>
        </div>
    </div>
@endsection
