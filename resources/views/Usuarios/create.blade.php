@extends('welcome')
@section('layout')
  @php
    $create=true;
    $fecha = Carbon\Carbon::now();
  @endphp
  <h1>Usuarios</h1>
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
            Datos personales del nuevo usuario
          </small>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cuenta" class="nav-link" data-toggle="tab">
          <span class="font-lg">2.</span> Información cuenta de usuario
          <small class="d-block text-secondary">
            Datos de la cuenta de usuario
          </small>
        </a>
      </li>
      <li class="nav-item">
        <a href="#resumen" class="nav-link" data-toggle="tab">
          <span class="font-lg">3.</span> Resumen de datos
          <small class="d-block text-secondary">
            Vista previa de datos
          </small>
        </a>
      </li>
    </ul>
    {!!Form::open(['class' =>'tab-content','route' =>'usuarios.store','method' =>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'formUsuario'])!!}
   @include('Usuarios.Formularios.form')
    {!!Form::close()!!}
@endsection
