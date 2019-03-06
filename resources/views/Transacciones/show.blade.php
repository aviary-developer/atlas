@extends('welcome')
@section('layout')
  @php
setlocale(LC_ALL,'es');
  @endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
      @php
        $fecha = new \Carbon\Carbon($transaccion->fecha);
      @endphp
        Detalles de entrada <span class="badge badge-success">{{$fecha->formatLocalized('%d de %B de %Y')}}</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
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
                    <th>Insumo</th>
                    <th>Cantidad</th>
                </thead>
                <tbody>
                    @php
                        $correlativo = 1;
                    @endphp
                    @foreach ($detalles as $key => $detalle)
                      <tr>
                      <td>{{$correlativo}}</td>
                      <td>{{$detalle->insumo->nombre}}</td>
                      <td>{{$detalle->cantidad}} kg</td>
                      @php
                        $correlativo++;
                      @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
</script>
@endsection
