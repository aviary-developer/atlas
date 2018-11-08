@extends('welcome')
@section('layout')
  @php
    $create=true;
    $fecha = Carbon\Carbon::now();
  @endphp
  <h1>Estudiantes</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Nuevo</li>
    </ol>
  </nav>
  <div class="container-fluid">
    <div class="nav-tabs-responsive">
    <ul class="nav nav-tabs-progress nav-tabs-3 mb-3">
      <li class="nav-item">
        <a href="#personal" class="nav-link active" data-toggle="tab">
          <span class="font-lg">1.</span> Información personal
          <small class="d-block text-secondary">
            Datos personales del nuevo estudiante
          </small>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cuenta" class="nav-link" data-toggle="tab">
          <span class="font-lg">2.</span> Área de salud
          <small class="d-block text-secondary">
            Peso y talla de estudiante
          </small>
        </a>
      </li>
      <li class="nav-item">
        <a href="#resumen" class="nav-link" data-toggle="tab" onclick="vistaPrevia();">
          <span class="font-lg">3.</span> Datos Socieconómicos
          <small class="d-block text-secondary">
            Datos Socieconómicos del estudiante
          </small>
        </a>
      </li>
    </ul>
    {!!Form::open(['class' =>'tab-content','route' =>'estudiantes.store','method' =>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'formEstudiante'])!!}
   @include('Estudiantes.Formularios.form')
   <div class="d-block d-md-flex">
     <div class="d-block d-md-inline ml-auto mb-3">
       {!!Form::button('Guardar y matricular',['onclick'=>'matricular();','class'=>'btn btn-danger btn-block'])!!}
     </div>
   </div>
   <div id="tituloMatricula" style="display:none;">
   <span class="badge badge-primary">Matricula</span> {{$lectivo->anio}}
 </div>
   <div id="modalMatricula" style="display:none;">
     <div class="row">
         <div class="form-group col-10">
             <label>Grados</label>
             <div class="input-group">
                 <div class="input-group-prepend">
                     <span class="fa fa-cube form-control" aria-hidden="true"></span>
                 </div>
                 <select name="grado" id="grado_numero" class="form-control" onchange="detalleGrado(this)">
                   <option value="">
                       [Seleccione grado]
                   </option>
                   @foreach ($grados as $grado)
                       <option value={{$grado->id}}>
                           {{$grado->grado.' '.$grado->seccion}}
                       </option>
                   @endforeach
                 </select>
             </div>
         </div>
     </div>
     <div class="form-group">
       <label>Turno</label><br>
       <span class="badge badge-warning" id="badgeTurno">gfgf</span>
     </div>
     <div class="form-group">
       <label>Docente asesor</label><br>
       <span class="badge badge-info" id="badgeDocente">fgf</span>
     </div>
   </div>
    {!!Form::close()!!}
    <script>
    function detalleGrado(grado){
      $.ajax({
          type: 'get',
          url: '/atlas/public/grado/turno',
          data: {
              id:grado.value,
          },
          success: function (r) {
            console.log(r.turno);
            $('#badgeTurno').text(r.turno);
            $('#badgeDocente').text(r.docente);
          }
      });
    }
      function matricular(){
        var notice = new PNotify({
          title: $('#tituloMatricula').html(),
          text: $('#modalMatricula').html(),
          icon: false,
          width: 'auto',
          type:'info',
          hide: false,
          buttons: {
              closer: true,
              sticker: false
          },
          confirm: {
              buttons: [{
                  text: "Matricular"
              }, {
                  text: "Cancelar"
              }],
              confirm:true,
          },
          insert_brs: false,
          addclass: 'stack-modal',
          stack: {
              'dir1': 'down',
              'dir2': 'right',
              'modal': true
          }
      });
      notice.get().on('pnotify.confirm', function() {
      }).on('pnotify.cancel', function() {
      });
        //document.forms["formEstudiante"].submit();
      }
    </script>
@endsection
