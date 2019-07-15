@extends('PDF.hoja')
@section('layout')
@if ($docentes != null)
    @foreach ($docentes as $docente)
        <div class="page">
            <div class="flex-row">
                <center>
                    <h3>
                        Listado de docentes
                    </h3>
                </center>
            </div>
            <div class="row">
                <div class="col-9">
                    Docente Asesor:
                    <b>
                        {{$docente->nombre.' '.$docente->apellido}}
                    </b>
                </div>
                <div class="col-3">
                    <span class="float-right">
                        Año Lectivo:
                        <b>
                            {{$lectivo->anio}}
                        </b>
                    </span>
                </div>
            </div>
            <hr>
            @php
                $consulta_1 = App\AsignaturaGrado::join('grados','grados.id','asignatura_grados.f_grado')->distinct()->select('asignatura_grados.f_grado','grados.grado','grados.seccion','grados.turno','grados.numero','asignatura_grados.f_profesor')->where('grados.f_lectivo',$lectivo->id)->where('asignatura_grados.f_profesor',$docente->id)->where('grados.f_profesor','!=',$docente->id);

                $grados = App\Grado::select('id','grado','seccion','turno','numero','f_profesor')->where('f_profesor',$docente->id)->where('f_lectivo',$lectivo->id)->union($consulta_1)->orderBy('numero')->get();
            @endphp
            @foreach ($grados as $k => $grado)
                <div class="flex-row">
                    <span class="font-lg font-weight-bold">
                        @if ($grado->turno)
                            <span class="badge badge-warning col-2">
                                Matutino
                            </span>
                        @else
                            <span class="badge badge-info col-2">
                                Vespertino
                            </span>
                        @endif
                         {{$grado->grado}}
                         <span class="badge border border-primary text-primary">{{$grado->seccion}}</span>
                        @if ($docente->id == $grado->f_profesor)
                             <span class="badge badge-success">
                                Asesor
                            </span>
                        @endif
                    </h4>
                </div>
                @if ($docente->id == $grado->f_profesor)
                    {{-- Obtener las materias en las que el docente es asesor de grado o no hay un docente encargado --}}
                    @php
                        $asignaturas_propias = App\AsignaturaGrado::where('f_grado',$grado->id)
                        ->where(function ($query) use($docente) {
                            $query->where('f_profesor', $docente->id)
                            ->orWhere('f_profesor', null);
                        })->get();
                    @endphp
                @else
                    {{-- Obtener las materias en las cuales el docente asesora en ese grado --}}
                    @php
                        $asignaturas_propias = App\AsignaturaGrado::where('f_profesor',$docente->id)->where('f_grado',$grado->id)->get();
                    @endphp
                @endif
                @foreach ($asignaturas_propias as $asignatura)
                    <div class="flex-row">
                        <i class="far fa-bookmark"></i>
                        {{$asignatura->asignatura->nombre}}
                    </div>
                @endforeach
                <hr class="my-1">
            @endforeach
        </div>

    @endforeach
@endif
@endsection
