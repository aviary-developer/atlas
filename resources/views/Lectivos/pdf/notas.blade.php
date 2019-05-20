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
    <br>
    <div class="row">
        <div class="col-8">
            <h4>Calificaciones</h4>
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
                            <td>{{round($pf)}}</td>
                        </tr>
                    @endforeach
                </tbody>
						</table>
						<br>
						<h4>Conduncta</h4>
						@php
								$conducta = App\Conducta::where('f_estudiante',$estudiante->matricula)->first();

								if($conducta != null){
									$c[0] = (($conducta->a11 == 2)?"Excelente":(($conducta->a11 == 1)?"Muy Bueno":(($conducta->a11 == 0)?"Bueno":" ")));
									$c[1] = (($conducta->a12 == 2)?"Excelente":(($conducta->a12 == 1)?"Muy Bueno":(($conducta->a12 == 0)?"Bueno":" ")));
									$c[2] = (($conducta->a13 == 2)?"Excelente":(($conducta->a13 == 1)?"Muy Bueno":(($conducta->a13 == 0)?"Bueno":" ")));

									$c[3] = (($conducta->a21 == 2)?"Excelente":(($conducta->a21 == 1)?"Muy Bueno":(($conducta->a21 == 0)?"Bueno":" ")));
									$c[4] = (($conducta->a22 == 2)?"Excelente":(($conducta->a22 == 1)?"Muy Bueno":(($conducta->a22 == 0)?"Bueno":" ")));
									$c[5] = (($conducta->a23 == 2)?"Excelente":(($conducta->a23 == 1)?"Muy Bueno":(($conducta->a23 == 0)?"Bueno":" ")));

									$c[6] = (($conducta->a31 == 2)?"Excelente":(($conducta->a31 == 1)?"Muy Bueno":(($conducta->a31 == 0)?"Bueno":" ")));
									$c[7] = (($conducta->a32 == 2)?"Excelente":(($conducta->a32 == 1)?"Muy Bueno":(($conducta->a32 == 0)?"Bueno":" ")));
									$c[8] = (($conducta->a33 == 2)?"Excelente":(($conducta->a33 == 1)?"Muy Bueno":(($conducta->a33 == 0)?"Bueno":" ")));

									$c[9] = (($conducta->a41 == 2)?"Excelente":(($conducta->a41 == 1)?"Muy Bueno":(($conducta->a41 == 0)?"Bueno":" ")));
									$c[10] = (($conducta->a42 == 2)?"Excelente":(($conducta->a42 == 1)?"Muy Bueno":(($conducta->a42 == 0)?"Bueno":" ")));
									$c[11] = (($conducta->a43 == 2)?"Excelente":(($conducta->a43 == 1)?"Muy Bueno":(($conducta->a43 == 0)?"Bueno":" ")));

									$c[12] = (($conducta->a51 == 2)?"Excelente":(($conducta->a51 == 1)?"Muy Bueno":(($conducta->a51 == 0)?"Bueno":" ")));
									$c[13] = (($conducta->a52 == 2)?"Excelente":(($conducta->a52 == 1)?"Muy Bueno":(($conducta->a52 == 0)?"Bueno":" ")));
									$c[14] = (($conducta->a53 == 2)?"Excelente":(($conducta->a53 == 1)?"Muy Bueno":(($conducta->a53 == 0)?"Bueno":" ")));
								}else{
									for($ii = 0; $ii < 15; $ii++){
										$c[$ii] = " ";
									}
								}
						@endphp
						<table class="table table-sm table-striped">
							<thead>
								<th>Aspectos de conduncta</th>
								<th>Primer Trimestre</th>
								<th>Segundo Trimestre</th>
								<th>Tercer Trimestre</th>
							</thead>
							<tbody>
								<tr>
									<td>Respeto a sí mismo y a los demás</td>
									<td>{{$c[0]}}</td>
									<td>{{$c[1]}}</td>
									<td>{{$c[2]}}</td>
								</tr>
								<tr>
									<td>Convivencia armónica y solidaria</td>
									<td>{{$c[3]}}</td>
									<td>{{$c[4]}}</td>
									<td>{{$c[5]}}</td>
								</tr>
								<tr>
									<td>Toma de decisiones responsablemente</td>
									<td>{{$c[6]}}</td>
									<td>{{$c[7]}}</td>
									<td>{{$c[8]}}</td>
								</tr>
								<tr>
									<td>Cumplimiento de deberes y correcto ejercicio de derecho</td>
									<td>{{$c[9]}}</td>
									<td>{{$c[10]}}</td>
									<td>{{$c[11]}}</td>
								</tr>
								<tr>
									<td>Práctica de valores morales y cívicos</td>
									<td>{{$c[12]}}</td>
									<td>{{$c[13]}}</td>
									<td>{{$c[14]}}</td>
								</tr>
							</tbody>
						</table>
        </div>
        <div class="col-4">
            <h4>Asistencia</h4>
            <table class="table table-sm table-striped">
                <thead>
                    <th>Mes</th>
                    <th>Días asistidos</th>
                    <th>Días no asistidos</th>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 12; $i++)
                        <tr>
                            @php
                                $si_mes = App\Asistencia::whereMonth('fecha',$i + 1)->where('f_matricula',$estudiante->matricula)->where('estado',1)->count();
                                $no_mes = App\Asistencia::whereMonth('fecha',$i + 1)->where('f_matricula',$estudiante->matricula)->where('estado','<>',1)->count();
                            @endphp
                            <td>{{App\Asistencia::meses($i)}}</td>
                            <td class="text-center">{{$si_mes}}</td>
                            <td class="text-center">{{$no_mes}}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>

</div>

@endforeach
@endif
@endsection
