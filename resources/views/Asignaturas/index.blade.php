@extends('welcome')
@section('layout')
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Asignaturas
        @if ($estado)
            <span class=" badge badge-success">
                Activas
            </span>
        @else
            <span class="badge badge-danger">
                Papelera
            </span>
        @endif
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" id="new-asignatura">
                    Nuevo
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ver
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if ($estado)
                        <a class="dropdown-item" href={{asset('asignaturas?estado=0')}}>
                            Papelera
                        </a>
                    @else
                        <a class="dropdown-item" href={{asset('asignaturas')}}>
                            Activas
                        </a>
                    @endif
                </div>
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
    <div class="col-7">
        <div class="table-responsive">
            <table class="table table-sm" id="tablaIndex">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th class="w-25">Opciones</th>
                </thead>
                <tbody>
                    @php
                        $correlativo = 1;
                    @endphp
                    @foreach ($asignaturas as $asignatura)
                        <tr>
                            <td>{{$correlativo}}</td>
                            <td>{{$asignatura->nombre}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm" onclick={{"edit_asignatura(".$asignatura->id.",'".$asignatura->nombre."')"}} data-tooltip="tooltip" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    @if ($asignatura->bloqueo == false && $estado)
                                        <button type="button" class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Enviar a papelera" onclick={{'disabled_asignatura('.$asignatura->id.')'}}>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @elseif(!$estado)
                                        <button type="button" class="btn btn-sm btn-success" data-tooltip="tooltip" title="Activar" onclick={{'disabled_asignatura('.$asignatura->id.',1)'}}>
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" id="dar_baja" data-tooltip="tooltip" title="Eliminar" onclick={{'delete_asignatura('.$asignatura->id.')'}}>
                                            <i class="fas fa-times"></i>
                                        </button>
                                    @else
                                        <button type="button" disabled class="btn btn-sm btn-secondary" data-tooltip="tooltip" title="No se puede dar de baja">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @php
                            $correlativo++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
