@extends('welcome')
@section('layout')
  @php
setlocale(LC_ALL,'es');
  @endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Movimientos de {{$insumo->nombre}}
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
                    <th>Fecha</th>
                    <th>Tipo de movimiento</th>
                    <th>Cantidad</th>
                    <th>Saldo</th>
                </thead>
                <tbody>
                    @php
                        $correlativo = 1;
                        $saldo=0.00;
                    @endphp
                  @foreach ($movimientos as $movimiento)
                        <tr>
                          <td>{{$correlativo}}</td>
                          <td>{{$movimiento->fecha}}</td>
                          <td>{{($movimiento->tipoMovimiento)?'Salida':'Entrada'}}</td>
                          <td>{{$movimiento->cantidad}}</td>
                          <td>{{$movimiento->saldo}}</td>
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
