@extends('welcome')
@section('layout')
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Entradas de insumos
        @if ($estado)
            <span class=" badge badge-success">
                Activos
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
                <a class="nav-link" href={!! asset('/transacciones/create') !!} id="new-insumo">
                    Nuevo
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ver
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if ($estado)
                        <a class="dropdown-item" href={{asset('insumos?estado=0')}}>
                            Papelera
                        </a>
                    @else
                        <a class="dropdown-item" href={{asset('insumos')}}>
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
            <table class="table table-sm a-table">
                <thead>
                    <th>#</th>
                    <th>Fecha</th>
                    <th class="w-25">Opciones</th>
                </thead>
                <tbody>
                    @php
                        $correlativo = 1;
                    @endphp
                  @foreach ($transacciones as $transaccion)
                        <tr>
                            <td>{{$correlativo}}</td>
                            <td>{{$transaccion->created_at->format('d-m-Y h:i:s a')}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm" onclick={{"ver(".$transaccion->id.")"}} data-tooltip="tooltip" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </button>
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
<script>
</script>
@endsection
