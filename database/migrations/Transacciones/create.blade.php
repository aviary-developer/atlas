@extends('welcome')
@section('layout')
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Entrada de Insumos
            <span class=" badge badge-success">
                {{$hoy = Carbon\Carbon::now()->format('d-m-Y')}}
            </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ver
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">
                            Algo
                        </a>
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
  <form action="{{action('TransaccionController@guardarTransaccion')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="row">
  <div class="col-3">
      <div class="form-group w-75">
        <label>Cantidad</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="fa fa-list-ol form-control" aria-hidden="true"></span>
          </div>
        {!! Form::number('cantidad',null,['min'=>'0.1','step'=>'0.1','placeholder'=>'Kilos','id'=>'cantidad','class'=>'form-control']) !!}
      </div>
      </div>
    <div class="form-group">
    <label>Insumo</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="fa fa-shopping-bag form-control" aria-hidden="true"></span>
      </div>
      <select class="form-control" name="insumo" id="insumo">
        @foreach ($insumos as $insumo)
          <option value={{$insumo->id}}>
            {{$insumo->nombre}}
          </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <button type="button" id="agregar" class="btn btn-info btn-block" data-tooltip="tooltip" data-placement="bottom" title="Agregar a tabla">
      <i class="fas fa-plus"></i> Agregar
    </button>
  </div>
    </div>
    <div class="col-7">
      <div class="table-responsive">
          <table class="table table-sm" id="tablaInsumos">{{--PARA PAGINAR AGREGAR A LA CLASE: a-table--}}
              <thead>
                  <th class="w-25">Cantidad</th>
                  <th>Insumo</th>
                  <th>Opciones</th>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <tr>
                  <td><strong>Total de insumos</strong></td>
                  <td><span id="totalInsumos" class="badge badge-pill badge-info">0</span></td>
                </tr>
              </tfoot>
          </table>
      </div>
    </div>
  </div>
    <div class="col-7">

    </div>
    <div class="row">
      <div class="col-5"></div>
    <div class="col-1">
      <button type="submit" class="btn btn-info btn-sm" data-tooltip="tooltip" title="Guardar entrada">
        <i class="fas fa-check-circle"></i> Guardar
      </button>
    </div>
    </div>
  </form>
</div>
<script type="text/javascript">
$("#agregar").on('click',function(e){
  var cantidad=$("#cantidad").val();
  var idInsumo = $("#insumo option:selected").val();
  var insumo = $("#insumo option:selected").text();
  var tabla=$("#tablaInsumos");
  if(cantidad=="" || cantidad==0){
    new PNotify({
        type: 'error',
        title: '¡Error!',
        text: 'Ingrese cantidad'
    });
  }else{
  tabla.append("<tr><input type='hidden' name='cantidades[]' value='"+cantidad+"'/>"+
  "<input type='hidden' name='insumos[]' value='"+idInsumo+"'/>"+
  "<td>"+cantidad+(parseInt(cantidad)>1?" Kilos":" Kilo")+"</td><td>"+insumo+"</td>"+
  "<td><button type='button' class='btn btn-sm btn-danger borrar' data-tooltip='tooltip' title='Eliminar de la tabla'"+
  "onclick=''><i class='fas fa-trash'></i></button></td></tr>");
  var nFilas = $("#tablaInsumos tr").length;
  $("#totalInsumos").text(nFilas-2);
  var cantidad=$("#cantidad").val("");
}
});
$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
    var nFilas = $("#tablaInsumos tr").length;
    $("#totalInsumos").text(nFilas-2);
});
</script>
@endsection
