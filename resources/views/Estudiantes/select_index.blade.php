@extends('welcome')
@section('layout')
  <?php
  $estadoOpuesto=true;
  ?>
    @include('Estudiantes.Barra.select_index')
  <div class="container-fluid mt-3">
      <div class="col-8">

          <div class="table-responsive">
          <table class="table table-hover table-striped table-sm">
            <thead>
            <th>#</th>
            <th>Grado</th>
            <th>Sección</th>
            <th>Turno</th>
            <th>Matriculados</th>
            <th>Ver</th>
            </thead>
            <tbody>
              @if ($grados!=null || $grados->count() != 0)
                    @php
                    $correlativo = 1;
                    @endphp
                    @foreach ($grados as $grado)
                 <tr>
                   <td>{{$correlativo}}</td>
                   <td>{{$grado->grado}}</td>
                   <td>{{$grado->seccion}}</td>
                   <td>
                       @if ($grado->turno)
                          <span class="badge badge-warning col-10">Matutino</span>
                       @else
                           <span class="badge badge-info col-10">Vespertino</span>
                       @endif
                   </td>
                   <td>{{App\Matricula::where('f_grado',$grado->id)->count().' estudiantes'}}</td>
                   <td>
                      <a href="{{asset('/estudiantes?grado='.$grado->id)}}" class="btn btn-sm btn-info">
                          <i class="fas fa-eye"></i>
                      </a>
                   </td>
                 </tr>
                 @php
                 $correlativo++;
                 @endphp
               @endforeach
               @if (Auth::user()->tipoUsuario != "Docente")
                    <tr>
                        <td>{{$correlativo}}</td>
                        <td colspan="3">
                            <center>
                                Estudiantes no matriculados
                            </center>
                            </td>
                            <td>
                                {{$estudiantes = App\Estudiante::whereNotExists(
                                    function ($query) use ($lectivo){
                                        $query->select(DB::raw(1))
                                        ->from('matriculas')
                                        ->join('grados','matriculas.f_grado','grados.id')
                                        ->where('grados.f_lectivo',$lectivo->id)
                                        ->whereRaw('estudiantes.id = matriculas.f_estudiante');
                                    }
                                )->where('estado',1)->orderBy('apellido')->count().' estudiantes'}}
                            </td>
                        <td>
                            <a href="{{asset('/estudiantes?grado=0')}}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
               @endif
            @else
                <tr>
                    <td colspan="6">
                        <center>
                            No tiene grados asignados
                        </center>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        </div>
      </div>
  </div>
@endsection
