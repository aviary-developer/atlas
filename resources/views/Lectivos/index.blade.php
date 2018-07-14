@extends('welcome')
@section('layout')
<div class="row">
    <div class="col-9">
        <div class="">
                <h1>Grados <span class="badge badge-primary" id="b-year">{{$anio_activo->anio}}</span></h1>
        </div>
        <div class="row">
            <div class="col-10"></div>
            <div class="col-2">
                <label class="switch switch-sm switch-to-info">
                    <span class="mr-1">Activar</span>
                    @if ($anio_activo->estado == 0)
                        <input type="checkbox" id="sw-activo" checked/>
                    @else
                        <input type="checkbox" id="sw-activo"/>
                    @endif
                    <span class="switch-slider"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-3">
        @include('Lectivos.partes.panel_r')
    </div>
</div>
<input type="hidden" id="y-id" value={{$anio_activo->id}}>
@endsection
