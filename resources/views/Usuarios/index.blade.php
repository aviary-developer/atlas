@extends('welcome')
@section('layout')
  <?php
  $estadoOpuesto=true;
  ?>
  <h1>Usuarios</h1>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-7 col-xs-12">
        <div class="form-group">
          <div class="btn-group">
          <a href={!! asset('/usuarios/create') !!} class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Nuevo</a>
          <a href={!! asset('/usuarios/')!!} class="btn btn-dark btn-sm"><i class="fa fa-user"></i> Mi Perfil</a>
          <a href="" class="btn btn-dark btn-sm"><i class="fa fa-file"></i> Reporte</a>
          <a href="" class="btn btn-dark btn-sm">
            @if ($estadoOpuesto)
              <i class="fa fa-check"></i> Activos
              <span class="label label-success"></span>
            @else
              <i class="fa fa-trash"></i> Papelera
              <span class="label label-warning"></span>
            @endif
          </a>
          <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-question"></i> Ayuda</button>
        </div>
        </div>
      </div>
    </div>
    <div class="table-responsive">
    <table class="table" id="tablaIndex">
      <thead>
      <th>#</th>
      <th>Usuario</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>DUI</th>
      <th>Opciones</th>
      </thead>
      <tbody>
           <tr>
               <td>Caesar Vance</td>
               <td>Pre-Sales Support</td>
               <td>New York</td>
               <td>21</td>
               <td>2011/12/12</td>
               <td>$106,450</td>
           </tr>
         </tbody>
  </table>
  </div>
  </div>
@endsection
