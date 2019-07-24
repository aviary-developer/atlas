@extends('welcome')
@section('layout')
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
        <a class="navbar-brand" href="#">
            Grados
            @if ($anio_activo != null)
                <span class="badge badge-light text-primary" id="b-year">
                    {{$anio_activo->anio}}
                </span>
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="nuevo_grado">
                        Nuevo
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/lectivo/reprobados?anio='.$anio_activo->id)}}" id="link_reprobado" target="_blank">
                        Reprobados
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/lectivo/retirados?anio='.$anio_activo->id)}}" id="link_retirado" target="_blank">
                        Retirados
                    </a>
                </li>

            </ul>
            <div class="mr-5">
                @if ($anio_activo != null)
                    <label class="switch switch-sm switch-to-primary">
                        <span class="mr-2 text-light">Activar</span>
                        @if ($anio_activo->estado == 0)
                            <input type="checkbox" id="sw-activo" checked/>
                        @else
                            <input type="checkbox" id="sw-activo"/>
                        @endif
                        <span class="switch-slider"></span>
                    </label>
                @endif
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Ayuda
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-9">
            @if ($anio_activo != null)
                <table class="table table-sm" id="lista_grados">
                    <thead>
                        <th>#</th>
                        <th>Grado</th>
                        <th>Sección</th>
                        <th>Turno</th>
                        <th>Asesor</th>
                        <th style="width: 100px;">Opciones</th>
                    </thead>
                    <tbody>
                        @php
                            $correlativo = 1;
                        @endphp
                        @foreach ($anio_activo->grados as $grado)
                            <tr>
                                <td>{{$correlativo}}</td>
                                <td>{{$grado->grado}}</td>
                                <td>{{$grado->seccion}}</td>
                                <td>
                                    @if ($grado->turno)
                                        <span class="badge badge-warning col-12">Matutino</span>
                                    @else
                                        <span class="badge badge-info col-12">Vespertino</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($grado->f_profesor != null)
                                        {{
                                            $grado->docente->nombre.' '.$grado->docente->apellido
                                        }}
                                    @else
                                        <span class="badge badge-light text-danger border-danger border">No asignado</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href={{asset('grados/'.$grado->id)}} class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                                        <button type="button" class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Editar" onclick={{"editar_grado(".$grado->id.",".$grado->turno.",".$grado->f_profesor.")"}}><i class="fas fa-edit" ></i></button>

                                    </div>
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
        <div class="col-3">
            @include('Lectivos.partes.panel_r')
        </div>
    </div>
</div>
<input type="hidden" id="y-id" value={{($anio_activo != null)?$anio_activo->id:null}}>

@include('Lectivos.partes.editar_grado')
@include('Lectivos.partes.nuevo_grado')

<script src= {{asset("js/system/grados.js")}}></script>
@endsection
