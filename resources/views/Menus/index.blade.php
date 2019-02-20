@extends('welcome')
@section('layout')
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Menús
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
                <a class="nav-link" href={!! asset('/menus/create') !!} id="new-menu">
                    Nuevo
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter" id="new-calendario">
                    Calendario
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ver
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if ($estado)
                        <a class="dropdown-item" href={{asset('menus?estado=0')}}>
                            Papelera
                        </a>
                    @else
                        <a class="dropdown-item" href={{asset('menus')}}>
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
                    <th>Nombre</th>
                    <th class="w-25">Opciones</th>
                </thead>
                <tbody>
                    @php
                        $correlativo = 1;
                        $menuses=$menus;
                    @endphp
                  @foreach ($menus as $menus)
                        <tr>
                            <td>{{$correlativo}}</td>
                            <td>{{$menus->nombre}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm" onclick={{"ver(".$menus->id.")"}} data-tooltip="tooltip" title="Ver">
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Calendario Menús Semanal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @php
        $dias=['Lunes','Martes','Miércoles','Jueves','Viernes'];
        @endphp
        <div class="row">
        <div class="col-5">
        <div class="form-group">
        <label>Días</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="fas fa-calendar form-control" aria-hidden="true"></span>
          </div>
          <select class="form-control" name="dia" onchange="verMenuDia(this);" id="diaCalendario" disabled>
            @foreach ($calendario as $cont =>$calendar)
              <option value={{$calendar->id}}>
                {{$dias[$cont]}}
              </option>
            @endforeach
          </select>
        </div>
      </div>
      </div>
      <div class="col-5">
        <div class="form-group">
        <label>Menú</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="fas fa-utensils form-control" aria-hidden="true"></span>
          </div>
          <select class="form-control" onchange="cambiarDiaMenu(this);" name="menu" id="menuCalendario" disabled>
            <option value="" disabled selected>Elija menú</option>
            @foreach ($menuses as $menus)
              <option value={{$menus->id}}>
                {{$menus->nombre}}
              </option>
            @endforeach
            <option value="0" style="color:red;">Quitar Menú</option>
          </select>
        </div>
      </div>
    </div>
    <input type="hidden" id="bandera" value="0">
        <div class="col-1">
        <div class="form-group">
        <label>Opción</label>
        <button type="button" class="btn btn-primary btn-sm" onclick="editarCalendario()" data-tooltip="tooltip" title="Editar">
            <i class="fas fa-edit"></i>
        </button>
      </div>
      </div>
      </div>
        <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Dia</th>
      <th scope="col">Menú</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($calendario as $contador => $calendar)
      <tr>
        <td>{{$dias[$contador]}}</td>
        @if($calendar->menu)
        <td>{{$calendar->menu->nombre}}</td>
      @else
        <td><span class="badge badge-info">No Asignado</span></td>
      @endif
      </tr>
    @endforeach
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script>
function editarCalendario(){
  if($("#bandera").val()==0){
    $("#menuCalendario").prop('disabled',false);
    $("#diaCalendario").prop('disabled',false);
    $("#bandera").val(1);
  }else if ($("#bandera").val()==1) {
    $("#menuCalendario").prop('disabled',true);
    $("#diaCalendario").prop('disabled',true);
    $("#bandera").val(0);
  }
}
function cambiarDiaMenu(select) {
  var idDia=$("#diaCalendario").val();
  var idMenu=select.value;
  $.ajax({
      type: 'post',
      url: '/atlas/public/cambioDiaMenu',
      data: {
          dia: idDia,
          menu: idMenu,
      },
      success: function (r) {
          console.log(r);
          sessionStorage.setItem('msg', 'msg');
          location.reload();
      },
      error: function () {
        new PNotify({
            type: 'error',
            title: '¡Error!',
            text: 'Algo salio mal'
        });
   }
  });
}
</script>
@endsection
