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
            <div class="col-10"></div>
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
                @foreach ($anio_activo->grados as $grado)
                    <div class="col-3 rounded text-center btn-light border">
                        <div class="flex-row pt-3">
                            @if ($grado->turno)
                                <span class="text-warning far fa-sun" style="font-size: 300%" data-toggle="tooltip" title="Matutino"></span>
                            @else
                                <span class="text-info far fa-sun" style="font-size: 300%" data-toggle="tooltip" title="Vespertino"></span>
                            @endif
                        </div>
                        <div class="flex-row mt-2 border-bottom">
                            <span class="font-weight-bold">{{$grado->grado.' "'.$grado->seccion.'"'}}</span>
                        </div>
                        <div class="flex-row">
                            @if ($grado->f_profesor != null)
                                <span class="font-sm">Prof. Alejandro Antonio</span>
                            @else
                                <span class="badge badge-danger">Sin docente</span>
                            @endif
                        </div>
                        <div class="flex-row mb-2 btn-group">
                            <button type="button" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></button>
                            <button type="button" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></button>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
    <div class="col-3">
        @include('Lectivos.partes.panel_r')
    </div>
</div>
<input type="hidden" id="y-id" value={{($anio_activo != null)?$anio_activo->anio:null}}>
@endsection
