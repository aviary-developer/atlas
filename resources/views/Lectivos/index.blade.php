@extends('welcome')
@section('layout')
<div class="row">
    <div class="col-9">
        <div class="">
            <h1>Grados
                @if ($anio_activo != null)
                    <span class="badge badge-primary" id="b-year">
                        {{$anio_activo->anio}}
                    </span>
                @endif
            </h1>
        </div>
        <div class="row">
            <div class="col-10">
                @if ($anio_activo != null)
                    <button type="button" class="btn btn-sm btn-dark" id="nuevo_grado">
                        <i class="fas fa-plus"></i> Nuevo
                    </button>
                @endif
            </div>
            <div class="col-2">
                @if ($anio_activo != null)
                    <label class="switch switch-sm switch-to-info">
                        <span class="mr-1">Activar</span>
                        @if ($anio_activo->estado == 0)
                            <input type="checkbox" id="sw-activo" checked/>
                        @else
                            <input type="checkbox" id="sw-activo"/>
                        @endif
                        <span class="switch-slider"></span>
                    </label>
                @endif
            </div>
        </div>
        <div class="row mt-3 ml-1" id="tablero-grado">
            @if ($anio_activo != null)
                <table class="table" id="lista_grados">
                    <thead>
                        <th>#</th>
                        <th>Grado</th>
                        <th>Sección</th>
                        <th>Turno</th>
                        <th>Docente</th>
                        <th>Opciones</th>
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
                                        <span class="badge badge-light text-danger border-danger border">Sin docente</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Editar" onclick={{"editar_grado(".$grado->id.",".$grado->turno.",".$grado->f_profesor.")"}}><i class="fas fa-edit" ></i></button>
                                        <button type="button" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></button>
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
    </div>
    <div class="col-3">
        @include('Lectivos.partes.panel_r')
    </div>
</div>
<input type="hidden" id="y-id" value={{($anio_activo != null)?$anio_activo->id:null}}>

@include('Lectivos.partes.editar_grado')
@include('Lectivos.partes.nuevo_grado')
@endsection
