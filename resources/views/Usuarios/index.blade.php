@extends('welcome')
@section('layout')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Usuarios</li>
    </ol>
  </nav>
  <div class="container-fluid">
    <div class="nav-tabs-responsive">
      <ul class="nav nav-tabs-progress nav-tabs-3 mb-3">
        <li class="nav-item">
          <a href="#personal" class="nav-link active" data-toggle="tab">
            <span class="font-lg">1.</span> Datos personales
            <small class="d-block text-secondary">
              Información personal del usuario
            </small>
          </a>
        </li>
        <li class="nav-item">
          <a href="#account" class="nav-link" data-toggle="tab">
            <span class="font-lg">2.</span> Datos de usuario
            <small class="d-block text-secondary">
              Información para uso del sistema
            </small>
          </a>
        </li>
        <li class="nav-item">
          <a href="#confirmation" class="nav-link" data-toggle="tab">
            <span class="font-lg">3.</span> Confirmación de datos
            <small class="d-block text-secondary">
              Resumen de los datos registrados previo a guardarlos
            </small>
          </a>
        </li>
      </ul>
      {!!Form::open(['class' =>'tab-content','route' =>'usuarios.store','method' =>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'formUsuario'])!!}
        <div id="personal" class="tab-pane show active">
          <div class="mb-3">
            <a href="#account-collapse" data-toggle="collapse">
              <span class="font-lg">1.</span> Datos personales
              <small class="d-block text-secondary">
                Información personal del usuario
              </small>
            </a>
          </div>
          <div id="personal-collapse" class="collapse" data-parent="#formUsuario">
            <div class="text-secondary mb-3">
              <small>Paso 1 de 3</small>
            </div>
            <div class="row">
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label>Nombre</label>
                    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre del nuevo usuario']) !!}
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label>Apellido</label>
                    {!! Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Apellido del nuevo usuario']) !!}
                </div>
              </div>
            </div>
                <div class="row">
                  <div class="col-2 col-md-2 col-lg-2">
                    <div class="form-group">
                      <label>Fecha nacimiento</label>
                      @php
                        $hoy = Carbon\Carbon::now();
                        $hoy = $hoy->subYears(12);
                        /*if($create){
                          $fecha = $fecha->subYears(12);
                        }*/
                      @endphp
                      {!! Form::date('fechaNacimiento',$hoy,['max'=>$hoy->format('Y-m-d'),'class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="col-2 col-md-2 col-lg-2">
                    <div class="form-group">
                      <label>Sexo</label>
                      <select class="form-control">
                        <option>Masculino</option>
                        <option>Femenino</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2 col-md-2 col-lg-2">
                    <div class="form-group">
                      <label>DUI</label>
                      <input type="text" class="form-control" placeholder="00000000-0">
                    </div>
                  </div>
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="form-group">
                    <label>Correo</label>
                    <input type="text" class="form-control" placeholder="ejemplo@correo.com">
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-12 col-md-4 col-lg-4">
                <div class="form-group">
                  <label>Teléfono</label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-2 col-md-2 col-lg-2">
                <div class="form-group">
                  <label></label>
                  <button type="button" class="btn btn-primary ml-auto">Agregar teléfono</button>
                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="form-group">
                  <label>Dirección</label>
                  <input type="text" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
              <table class="table" id='tablaTelefono'>
                <thead>
                  <th>Teléfono</th>
                  <th style="width : 80px">Acción</th>
                </thead>
                <tbody>
                      <tr>
                        <td>
                          <input type="hidden" id="" value="" name="tel_id[]">
                          <input type="hidden" value="" name="tel_tel[]">
                          <button type="button" name="button" class="btn btn-danger btn-xs" id="eliminar_telefono_antiguo">
                            <i class="fas fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                </tbody>
              </table>
            </div>
          </div>
            <div class="d-none d-md-block">
              <hr>
              <div class="d-flex mb-3">
                <button type="button" class="btn btn-success ml-auto" data-form-step="#payment">
                   Datos de usuario &nbsp;
                  <i class="fa fa-angle-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div id="account" class="tab-pane">
          <div class="mb-3">
            <a href="#account-collapse" data-toggle="collapse">
              <span class="font-lg">2.</span> Personal information
              <small class="d-block text-secondary">
                Lorem ipsum dolor sit amet, venenatis adipiscing
              </small>
            </a>
          </div>
          <div id="account-collapse" class="collapse show" data-parent="#formUsuario">
            <div class="text-secondary mb-3">
              <small>Paso 2 de 3</small>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="text" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control">
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Confirm password</label>
                  <input type="password" class="form-control">
                </div>
              </div>
            </div>
            <div class="d-none d-md-block">
              <hr>
              <div class="d-flex mb-3">
                <button type="button" class="btn btn-outline-success" data-form-step="#account">
                  <i class="fa fa-angle-left"></i>
                  &nbsp; Datos personales
                </button>
                <button type="button" class="btn btn-success ml-auto" data-form-step="#personal">
                  Confirmación de información &nbsp;
                  <i class="fa fa-angle-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div id="confirmation" class="tab-pane">
          <div class="mb-3">
            <a href="#confirmation-collapse" data-toggle="collapse">
              <span class="font-lg">4.</span> Confirm your details
              <small class="d-block text-secondary">
                Lorem ipsum dolor sit amet, venenatis adipiscing
              </small>
            </a>
          </div>
          <div id="confirmation-collapse" class="collapse" data-parent="#formUsuario">
            <div class="text-secondary mb-3">
              <small>Paso 3 de 3</small>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-3 col-lg-2">
                    <label class="text-secondary">Username</label>
                  </div>
                  <div class="col-12 col-md-9 col-lg-10">
                    <div class="mb-2">john_doe</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-3 col-lg-2">
                    <label class="text-secondary">Email ID</label>
                  </div>
                  <div class="col-12 col-md-9 col-lg-10">
                    <div class="mb-2">john_doe@email.com</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-3 col-lg-2">
                    <label class="text-secondary">Full name</label>
                  </div>
                  <div class="col-12 col-md-9 col-lg-10">
                    <div class="mb-2">John Doe</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-3 col-lg-2">
                    <label class="text-secondary">Gender</label>
                  </div>
                  <div class="col-12 col-md-9 col-lg-10">
                    <div class="mb-2">Male</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-3 col-lg-2">
                    <label class="text-secondary">Date of birth</label>
                  </div>
                  <div class="col-12 col-md-9 col-lg-10">
                    <div class="mb-2">January 10, 1980</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-3 col-lg-2">
                    <label class="text-secondary">Phone number</label>
                  </div>
                  <div class="col-12 col-md-9 col-lg-10">
                    <div class="mb-2">John Doe</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-3 col-lg-2">
                    <label class="text-secondary">Address</label>
                  </div>
                  <div class="col-12 col-md-9 col-lg-10">
                    <div class="mb-2">111 W.App Ave. Suite 123, Sunway, CA</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-3 col-lg-2">
                    <label class="text-secondary">ZIP Code</label>
                  </div>
                  <div class="col-12 col-md-9 col-lg-10">
                    <div class="mb-2">94086</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-3 col-lg-2">
                    <label class="text-secondary">Country</label>
                  </div>
                  <div class="col-12 col-md-9 col-lg-10">
                    <div class="mb-2">USA</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-3 col-lg-2">
                    <label class="text-secondary">Card number</label>
                  </div>
                  <div class="col-12 col-md-9 col-lg-10">
                    <div class="mb-2">**** 2086</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-3 col-lg-2">
                    <label class="text-secondary">Card type</label>
                  </div>
                  <div class="col-12 col-md-9 col-lg-10">
                    <div class="mb-2">VISA</div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="d-block d-md-flex">
              <button type="button" class="btn btn-outline-success d-none d-md-inline mb-3" data-form-step="#payment">
                <i class="fa fa-angle-left"></i>
                &nbsp; Payment information
              </button>
              <div class="d-block d-md-inline ml-auto mb-3">
                <button type="submit" class="btn btn-success btn-block">
                  Complete order
                </button>
              </div>
            </div>
          </div>
        </div>
        {!!Form::close()!!}
    </div>
  </div>
@endsection
