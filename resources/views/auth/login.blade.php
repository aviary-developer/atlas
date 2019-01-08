@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title">Acceder</h1>
        </div>
        <div class="panel-body">
          <form method="post" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group {{$errors->has('name')?'has-error':''}}">
              <label>Usuario</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Ingresa tu usuario">
              {!! $errors->first('name','<span class="help-block">:message</span>')!!}
            </div>
            <div class="form-group {{$errors->has('password')?'has-error':''}}">
              <label>Contraseña</label>
              <input type="password" name="password" class="form-control" placeholder="Ingresa tu Contraseña">
              {!! $errors->first('password','<span class="help-block">:message</span>')!!}
            </div>
            <button type="submit" name="button" class="btn btn-primary btn-block">Acceder</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
