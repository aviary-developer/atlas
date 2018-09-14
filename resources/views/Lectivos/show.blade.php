@extends('welcome')
@section('layout')
    <nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Grado
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
                <a class="nav-link" href={{asset('#')}}>
                    Otro
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{asset('#')}}>
                    Otro
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{asset('#')}}>
                    Otro
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
@endsection
