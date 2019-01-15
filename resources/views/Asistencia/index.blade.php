@extends('welcome')
@section('layout')
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Grados Asignados
            <span class=" badge badge-success">
                {{$lectivo->anio}}
            </span>
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
                        <a class="dropdown-item" href={{asset('asignaturas?estado=0')}}>
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
  <form action="{{action('AsistenciaController@guardarAsistencia')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="row">
  <div class="col-3">
    <div class="form-group">
    <label>Grados</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="fa fa-users form-control" aria-hidden="true"></span>
      </div>
      <select class="form-control" name="grado" id="gradoSeleccionado">
        @foreach ($grados as $grado)
          <option value={{$grado->id}}>
            {{$grado->grado}}
          </option>
        @endforeach
      </select>
    </div>
  </div>
    </div>
    <div class="col-3">
    <div class="form-group">
      <label>Buscar fecha</label>
      @php
        $hoy = Carbon\Carbon::now();
        $minimo=Carbon\Carbon::parse('first day of january');
      @endphp
      {!! Form::date('fechaAsistencia',$hoy,['max'=>$hoy->format('Y-m-d'),'min'=>$minimo->format('Y-m-d'),'id'=>'idFecha','class'=>'form-control has-feedback-left','required']) !!}
    </div>
    </div>
  </div>
    <div class="col-7">
        <div class="table-responsive">
            <table class="table table-sm a-table" id="tablaEstudiantes">
                <thead>
                    <th style="width:80px;">Número</th>
                    <th class="w-50">Nombre</th>
                    <th>Asistencia</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
      <div class="col-5"></div>
    <div class="col-1">
      <button type="submit" class="btn btn-info btn-sm" data-tooltip="tooltip" title="Almacenar asistencias">
        <i class="fas fa-clipboard-check"></i>  Guardar asistencias
      </button>
    </div>
    </div>
  </form>
</div>
<script type="text/javascript">
$('#gradoSeleccionado').load('omitir-este-error',function(){
  var fecha=$("#idFecha").val();
  var grado = $(this).val();
  var url='asistencia/verEstudiantes/'+grado+'/'+fecha;
  var tabla=$("#tablaEstudiantes");
  $.get(url, function(data){
    $('#tablaEstudiantes tbody > tr').remove();
    $.each(data, function(index) {
      tabla.append("<tr><input type='hidden' name='idMatricula[]' value='"+data[index].id+"' hidden></input>"+
      "<td>"+parseInt(index+1)+"</td><td>"+data[index].apellido+", "+data[index].nombre+"</td>"+
      "<td><select class='form-control' name='selectAsistencia[]'>"+
      (data[index].estado==1?"<option value='1' selected>Asistió</option>":"<option value='1'>Asistió</option>")+
      (data[index].estado==0?"<option value='0' selected>No asistió</option>":"<option value='0'>No asistió</option>")+
      (data[index].estado==2?"<option value='2' selected>Con permiso</option>":"<option value='2'>Con permiso</option>")+
      "</select></td></tr>");
    });
  });
});
$('#gradoSeleccionado').on('change',function(){
  var fecha=$("#idFecha").val();
  var grado = $(this).val();
  var url='asistencia/verEstudiantes/'+grado+'/'+fecha;
  var tabla=$("#tablaEstudiantes");
  $.get(url, function(data){
    $('#tablaEstudiantes tbody > tr').remove();
    $.each(data, function(index) {
      tabla.append("<tr><input type='hidden' name='idMatricula[]' value='"+data[index].id+"' hidden></input>"+
      "<td>"+parseInt(index+1)+"</td><td>"+data[index].apellido+", "+data[index].nombre+"</td>"+
      "<td><select class='form-control' name='selectAsistencia[]'>"+
      (data[index].estado==1?"<option value='1' selected>Asistió</option>":"<option value='1'>Asistió</option>")+
      (data[index].estado==0?"<option value='0' selected>No asistió</option>":"<option value='0'>No asistió</option>")+
      (data[index].estado==2?"<option value='2' selected>Con permiso</option>":"<option value='2'>Con permiso</option>")+
      "</select></td></tr>");
    });
  });
});
$('#idFecha').on('change',function(){
  var fecha=$("#idFecha").val();
  var grado = $("#gradoSeleccionado").val();
  var url='asistencia/verEstudiantes/'+grado+'/'+fecha;
  var tabla=$("#tablaEstudiantes");
  $.get(url, function(data){
    $('#tablaEstudiantes tbody > tr').remove();
    $.each(data, function(index) {
      tabla.append("<tr><input type='hidden' name='idMatricula[]' value='"+data[index].id+"' hidden></input>"+
      "<td>"+parseInt(index+1)+"</td><td>"+data[index].apellido+", "+data[index].nombre+"</td>"+
      "<td><select class='form-control' name='selectAsistencia[]'>"+
      (data[index].estado==1?"<option value='1' selected>Asistió</option>":"<option value='1'>Asistió</option>")+
      (data[index].estado==0?"<option value='0' selected>No asistió</option>":"<option value='0'>No asistió</option>")+
      (data[index].estado==2?"<option value='2' selected>Con permiso</option>":"<option value='2'>Con permiso</option>")+
      "</select></td></tr>");
    });
  });
});
</script>
@endsection
