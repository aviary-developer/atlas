@extends('welcome')
@section('layout')
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href={{asset('grados')}}>
        Grado
        <input type="hidden" id="id-g" value={{$grado->id}}>
        <span class="badge badge-light text-primary">
            {{$grado->grado}}
        </span>
        <span class="badge badge-success">
            {{$grado->seccion}}
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href={{asset('/grado/lista_estudiante?grado='.$grado->id)}} target="_blank">
                    Nomina
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{asset('/grado/notas?grado='.$grado->id)}} target="_blank">
                    Notas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{asset('/grado/cuadro_final?grado='.$grado->id)}} target="_blank">
                    Cuadro final
                </a>
            </li>
        </ul>
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
            @include('Lectivos.partes.ver_panel')
        </div>
        <div class="col-3">
            @include('Lectivos.partes.ver_der')
        </div>
    </div>
</div>
<input type="hidden" name="id-g" value={{$grado->id}}>

<script src= {{asset("js/system/grados.js")}}></script>
@endsection
