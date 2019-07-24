@extends('welcome')
@section('layout')
  @php
setlocale(LC_ALL,'es');
$fecha = Carbon\Carbon::now();
  @endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Libro de Banco
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" id="botonLibro" data-target="#modalRegistroLibroBanco" data-toggle="modal">
                  Nuevo
              </a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Ayuda
                </a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid mt-3">
    <div class="col-10">
        <div class="table-responsive">
            <table class="table table-sm a-table">
                <thead>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Concepto</th>
                    <th>Egresos</th>
                    <th>Ingresos</th>
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
                          <td>{{Carbon\Carbon::parse($movimiento->fecha)->format('d/m/Y')}}</td>
                          <td>{{$movimiento->concepto}}</td>
                          <td>{{($movimiento->egreso)?number_format($movimiento->egreso, 2):' '}}</td>
                          <td>{{($movimiento->ingreso)?number_format($movimiento->ingreso, 2):' '}}</td>
                          <td>{{number_format($movimiento->saldo, 2)}}</td>
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
<!-- INICIO MODAL SHOW -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalRegistroLibroBanco" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="formLibroBanco" action="{{action('LibroBancoController@store')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <h5 class="modal-title">
            Nuevo movimiento
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        <div class="row">
        <div class="col-3"><center>Fecha</center>
        </div>
        <div class="col-md-auto"><center>
          {!! Form::date('fechaRegistroLibro',$fecha,['max'=>$fecha->format('Y-m-d'),'id'=>'idFechaRegistroLibro','class'=>'form-control']) !!}
        </center>
        </div>
        </div>
        <br>
        <div class="row">
          <div class="col-3"><center>Movimiento</center>
          </div>
          <div class="col-4"><center>
            <select class="form-control" name="tipoMovimientoRegistroLibro" id="tipoMovimientoRegistroLibro">
                <option value="1">Ingreso</option>
                <option value="0">Egreso</option>
            </select>
          </center>
          </div>
        </div>
        <br>
        <div class="row">
        <div class="col-3"><center>Concepto</center>
        </div>
        <div class="col-9"><center>
          {!!Form::text('conceptoRegistroLibro',null,['id'=>'conceptoRegistroLibro','class'=>'form-control','placeholder'=>'Describa el movimiento','required'])!!}
        </center>
        </div>
        </div>
        <br>
        <div class="row">
        <div class="col-3"><center>Cantidad</center>
        </div>
        <div class="col-4"><center>
          {!! Form::number('cantidadRegistroLibro',null,['min'=>'0.01','step'=>'0.01','placeholder'=>'$0.00','id'=>'cantidadRegistroLibro','class'=>'form-control','required']) !!}
        </center>
        </div>
        </div>
        </div>
      <div class="modal-footer">
        <button onclick="enviarRegistro();" type="button" class="btn btn-primary btn-sm">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- FINAL MODAL SHOW -->
<script>
function enviarRegistro(){
  var concepto=$("#conceptoRegistroLibro").val();
  var cantidad=$("#cantidadRegistroLibro").val();
  if (!concepto) {
    new PNotify({
        type: 'error',
        title: '¡Describa el movimiento!',
        text: 'Error'
    });
  }
  else if (!cantidad) {
    new PNotify({
      type: 'error',
      title: '¡Cantidad igual a 0!',
      text: 'Error'
    });
  }
  else {
    $("#formLibroBanco").submit();
  }
}
</script>
@endsection