@extends('PDF.hoja')
@section('layout')
@if ($estudiantes != null)
@foreach ($estudiantes as $estudiante)
<div class="page">

    <div class="flex-row">
        <center>
            <h3>
                Hoja de calificaciones
            </h3>
        </center>
    </div>
    <div class="flex-row">
        <div class="row">
            <div class="col-10">
                Estudiante: <b>{{$estudiante->nombre.' '.$estudiante->apellido}}</b>
            </div>
            <div class="col-2">
                NIE: <b>{{$estudiante->nie}}</b>
            </div>
        </div>
    </div>
    <div class="flex-row">
        <table class="table table-sm table-striped">
            <thead>
                <th>Asignatura</th>
                <th>Primer Trimestre</th>
                <th>Segundo Trimestre</th>
                <th>Tercer Trimestre</th>
                <th>Promedio Final</th>
            </thead>
            <tbody>
                @foreach ($asignaturas as $asignatura)
                    <tr>
                        <td>{{$asignatura->nombre}}</td>
                        @php
                            $notas = App\Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')
                                ->join('notas','matriculas.id','notas.f_estudiante')
                                ->join('asignatura_grados','notas.f_asignatura','asignatura_grados.id')
                                ->where('matriculas.f_grado',$grado)
                                ->where('asignatura_grados.f_asignatura',$asignatura->id)
                                ->where('estudiantes.id',$estudiante->id)
                                ->select('estudiantes.id as estudiante_id','notas.*','asignatura_grados.f_asignatura as asignatura_id')
                                ->orderBy('estudiantes.apellido')
                                ->first();

                            if($notas != null){
                                $p1 = ($notas->n1p1 * 0.35) + ($notas->n2p1 * 0.35) + ($notas->n3p1 * 0.3);
                                $p2 = ($notas->n1p2 * 0.35) + ($notas->n2p2 * 0.35) + ($notas->n3p2 * 0.3);
                                $p3 = ($notas->n1p3 * 0.35) + ($notas->n2p3 * 0.35) + ($notas->n3p3 * 0.3);
                                $pf = ($p1 + $p2 + $p3) / 3;
                            }else{
                                $p1 = $p2 = $p3 = $pf = 0;
                            }
                        @endphp
                        <td>{{number_format($p1,2)}}</td>
                        <td>{{number_format($p2,2)}}</td>
                        <td>{{number_format($p3,2)}}</td>
                        <td>{{number_format($pf,2)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endforeach
@endif
@endsection
