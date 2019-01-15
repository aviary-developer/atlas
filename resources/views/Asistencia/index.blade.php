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
  <div class="col-3"><div class="form-group">
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
    <div class="col-7">
        <div class="table-responsive">
            <table class="table table-sm a-table" id="tablaEstudiantes">
                <thead>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#gradoSeleccionado').load('omitir-este-error',function(){
  var grado = $(this).val();
  var url='asistencia/verEstudiantes/'+grado;
  var tabla=$("#tablaEstudiantes");
  $.get(url, function(data){
    $('#tablaEstudiantes tbody > tr').remove();
    $.each(data, function(index) {
      tabla.append("<tr><td>"+data[index].id+"</td><td>"+data[index].nombre+"</td><td>"+data[index].apellido+"</td></tr>");
    });
  });
});
$('#gradoSeleccionado').on('change',function(){
  var grado = $(this).val();
  var url='asistencia/verEstudiantes/'+grado;
  var tabla=$("#tablaEstudiantes");
  $.get(url, function(data){
    $('#tablaEstudiantes tbody > tr').remove();
    $.each(data, function(index) {
      tabla.append("<tr><td>"+data[index].id+"</td><td>"+data[index].nombre+"</td><td>"+data[index].apellido+"</td></tr>");
        console.log(data[index]);
    });
  });
});
</script>
@endsection
