@extends('welcome')
@section('layout')
  @php
setlocale(LC_ALL,'es');
  @endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Salidas de insumos
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
                <a class="nav-link" href={!! asset('/salidas/create') !!} id="new-insumo">
                    Nuevo
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="botonCalculadora" data-target="#modalCalculadora" data-toggle="modal" onclick="calculadoraMenu();">
                    Calculadora
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
                  @foreach ($salidas as $salida)
                        <tr>
                            <td>{{$correlativo}}</td>
                            @php
                              $dt = new \Carbon\Carbon();
                            @endphp
                            <td>{{$salida->created_at->formatLocalized('%d de %B de %Y')}}</td>
                            <td>
                                <div class="btn-group">
                                  <a href={{asset('salidas/'.$salida->id)}} class="btn btn-sm btn-info"  data-tooltip="tooltip" title="Ver detalles"><i class="fas fa-info-circle"></i></a>
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
<!-- INICIO MODAL SHOW -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalCalculadora" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="formCalculadora" action="{{action('SalidaController@guardarSalida')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="divDatos" hidden>
        </div>
      <div class="modal-header">
        <h5 class="modal-title">
            Calculadora de raciones
            <span class="badge badge-info" id="spanFecha"></span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-6"><center>Menú</center>
        </div>
        <div class="col-6"><center>Asistencia</center>
        </div>
        </div>
        <div class="row">
        <div class="col-6"><center><span class=" badge badge-info" id="spanMenu">

        </span></center>
        </div>
        <div class="col-6"><center><span class=" badge badge-success" id="spanAsistencia">
        </span>
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-sm" onclick="editarAsistencia()" data-tooltip="tooltip" title="Editar">
            <i class="fas fa-edit"></i>
        </button>
      </center>
        </div>
        </div>
        <div class="col-12">
            <div class="flex-row">
            </div>
            <div class="flex-row">
                <table class="table table-sm" id="tablaCalculadora">
                    <thead>
                        <tr>
                            <th>Insumo</th>
                            <th>Cantidad total a utilizar</th>
                            <th>Cantidad en inventario</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="comprobarSaldoInsumos" id="comprobarSaldoInsumos" value="0">
        <button onclick="enviarCalculacion();" type="button" class="btn btn-primary btn-sm">Guardar salida</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- FINAL MODAL SHOW -->
<script>
function calculadoraMenu(){
  var url='calculadora/';
  var div=$("#divDatos");
  var saldo=0;
  var menor=0;
  $.get(url, function(data){
    $("#spanMenu").text(data[0]);
    $("#spanAsistencia").text(data[1]);
    $("#spanFecha").text(data[4]);
    $('#tablaCalculadora tbody > tr').remove();
    div.empty();
    var tabla=$("#tablaCalculadora");
    div.append("<input id='fechaIngreso' name='fechaIngreso' value='"+data[4]+"' hidden/>");
    $.each(data[2], function(index) {
      if(data[3][index][0]===undefined){
        saldo=0;}else{ saldo=parseFloat(data[3][index][0].saldo).toFixed(1);}
        if(saldo<=parseFloat((data[2][index].cantidad)*data[1]).toFixed(1)){
          menor="danger"; $("#comprobarSaldoInsumos").val(1);}else{menor="success";}
      tabla.append("<tr><td>"+data[2][index].nombre+"</td><td>"+parseFloat((data[2][index].cantidad)*data[1]).toFixed(1)+"</td><td><span class='badge badge-"+menor+"'>"+saldo+"</span></td></tr>");
      div.append("<input name='insumos[]' value='"+data[2][index].id+"' hidden/><input name='cantidades[]' value='"+parseFloat((data[2][index].cantidad)*data[1]).toFixed(1)+"' hidden/>");
    });
  });
}
function enviarCalculacion(){
    if($("#comprobarSaldoInsumos").val()=='1'){
      new PNotify({
          type: 'error',
          title: 'Verifique las cantidades en inventario',
          text: 'Error'
      });
    }else{
    if(parseInt($("#spanAsistencia").text())>0){
    $("#formCalculadora").submit();
  }else {
      new PNotify({
          type: 'error',
          title: '¡Asistencia igual a 0!',
          text: 'Error'
      });
    }
  }
  }
  function editarAsistencia(){
    new PNotify({
      title: '<span class="badge badge-light">Asistencia</span>',
      text: 'Ingrese la asistencia a calcular',
      icon: false,
      type: 'info',
      hide: false,
      nonblock: true,
      confirm: {
          buttons: [{
              text: "Guardar"
          }, {
              text: "Cancelar"
          }],
          prompt: true
      },
      buttons: {
          closer: false,
          sticker: false
      },
      history: {
          history: false
      },
      addclass: 'stack-modal',
      stack: {
          'dir1': 'down',
          'dir2': 'right',
          'modal': true
      }
    }).get().on('pnotify.confirm', function(e, notice, val) {
      var valor = Number.parseInt(val);
      if (Number.isInteger(valor)) {
        $("#modalCalculadora").modal("show");
        var url='calculadoraConAsistencia/'+valor;
        var div=$("#divDatos");
        var saldo=0;
        var menor=0;
        $.get(url, function(data){
          $("#spanMenu").text(data[0]);
          $("#spanAsistencia").text(data[1]);
          $("#spanFecha").text(data[4]);
          $('#tablaCalculadora tbody > tr').remove();
          div.empty();
          var tabla=$("#tablaCalculadora");
          div.append("<input id='fechaIngreso' name='fechaIngreso' value='"+data[4]+"' hidden/>");
          $.each(data[2], function(index) {
            if(data[3][index][0]===undefined){
              saldo=0;}else{saldo=parseFloat(data[3][index][0].saldo).toFixed(1);}
              if(saldo<parseFloat((data[2][index].cantidad)*data[1]).toFixed(1)){
                menor="danger"; $("#comprobarSaldoInsumos").val(1);}else{menor="success";}
            tabla.append("<tr><td>"+data[2][index].nombre+"</td><td>"+parseFloat((data[2][index].cantidad)*data[1]).toFixed(1)+"</td><td><span class='badge badge-"+menor+"'>"+saldo+"</span></td></tr>");
            div.append("<input name='insumos[]' value='"+data[2][index].id+"' hidden/><input name='cantidades[]' value='"+parseFloat((data[2][index].cantidad)*data[1]).toFixed(1)+"' hidden/>");
          });
        });
      } else {
          new PNotify({
              type: 'error',
              title: 'Error',
              text: 'Ingrese un número valido'
          });
      }
}).on('pnotify.cancel', function(e) {
$("#botonCalculadora").click();
});
}
</script>
@endsection
