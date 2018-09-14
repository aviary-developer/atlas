@extends('welcome')
@section('layout')
  <table class="table">
                    <tr>
                      <th>Nombre</th>
                      <td>{{$usuario->nombre}}</td>
                    </tr>
                    <tr>
                      <th>Nombre</th>
                      <td>{{$usuario->apellido}}</td>
                    </tr>
                    <tr>
                      <th>Fecha de nacimiento</th>
                      <td>{{$usuario->fechaNacimiento}}</td>
                    </tr>
                    <tr>
                      <th>Sexo</th>
                      @if($usuario->sexo)
                      <td>Femenino</td>
                    @else
                      <td>Masculino</td>
                    @endif
                    </tr>
                    <tr>
                      <th>DUI</th>
                      <td>{{$usuario->dui}}</td>
                    </tr>
                    <tr>
                      <th>Correo</th>
                      <td>{{$usuario->email}}</td>
                    </tr>
                    <tr>
                      <th>Direccion</th>
                      <td>{{$usuario->direccion}}</td>
                    </tr>
                    <tr>
                      <th>Teléfono</th>
                      <td>
                      @foreach ($telefonos as $key => $tel)
                        {{$tel->telefono}}<br>
                      @endforeach
                    </td>
                    </tr>
                    <tr>
                      <th>Usuario</th>
                      <td>{{$usuario->name}}</td>
                    </tr>
                    <tr>
                      <th>Rol de Usuario</th>
                      <td>{{$usuario->tipoUsuario}}</td>
                    </tr>
                    <tr>
                      <th>Fecha de creación</th>
                      <td>{{ $usuario->created_at->formatLocalized('%d de %B de %Y a las %H:%M:%S') }}</td>
                    </tr>
                    <tr>
                      <th>Fecha de modificación</th>
                      <td>{{ $usuario->updated_at->formatLocalized('%d de %B de %Y a las %H:%M:%S') }}</td>
                    </tr>
                  </table>
                </div>
@endsection
