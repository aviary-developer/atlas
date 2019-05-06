@extends('PDF.hoja')
@section('layout')
<style>
    th{
        word-break: break-all;
    }
</style>
<div class="flex-row">
    <center>
        <h3>
            {{'Cuadro final de evaluación de '.$grado->grado.' sección "'.$grado->seccion.'"'}}
        </h3>
    </center>
</div>
@if ($estudiantes != null)
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th style="width: 35px;" rowspan="2">No.</th>
                <th style="width: 7%" rowspan="2">NIE</th>
                <th style="width: " rowspan="2">Estudiante</th>
                <th colspan="{{count($asignaturas)}}"><center>Asignaturas</center></th>
                <th colspan="5"><center>Conducta</center></th>
            </tr>
            <tr>
                @foreach ($asignaturas as $asignatura)
                    <th style="width: 4%; font-size: 80%">{{App\Asignatura::abrev($asignatura->indice)}}</th>
                @endforeach
                <th style="width: 4%; font-size: 80%">ASP1</th>
                <th style="width: 4%; font-size: 80%">ASP2</th>
                <th style="width: 4%; font-size: 80%">ASP3</th>
                <th style="width: 4%; font-size: 80%">ASP4</th>
                <th style="width: 4%; font-size: 80%">ASP5</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $pnf = [];
                $e_e = []; // Vector para la estadistica de los estudiantes
                $count_mi_m = 0;
                $count_mi_f = 0;
                $count_re_m = 0;
                $count_re_f = 0;
                $count_pr_m = 0;
                $count_pr_f = 0;
            @endphp
            @foreach ($estudiantes as $e => $estudiante)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$estudiante->nie}}</td>
                    <td>{{$estudiante->apellido.', '.$estudiante->nombre}}</td>
                    @foreach ($asignaturas as $a => $asignatura)
                        @php
                            $notas = App\Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')
                                ->join('notas','matriculas.id','notas.f_estudiante')
                                ->join('asignatura_grados','notas.f_asignatura','asignatura_grados.id')
                                ->where('matriculas.f_grado',$grado->id)
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

                            if($e == 0){
                                $pnf[$a] = 0;
                            }

                            if($a == 0){
                                $e_e[$e]["notas"] = 0;
                            }

                            $pnf[$a] += round($pf);

                            $e_e[$e]["sexo"] = $estudiante->sexo;
                            $e_e[$e]["notas"] += round($pf);
                            $e_e[$e]["estado"] = $estudiante->estado;
                        @endphp
                        <td style="width: 5%">{{round($pf)}}</td>
                    @endforeach
                    @php
                        $conducta = App\Conducta::where('f_estudiante',$estudiante->matricula)->first();

                        if($conducta != null){
                            $a1 = round(($conducta->a11 + $conducta->a12 + $conducta->a13)/3);
                            $a2 = round(($conducta->a21 + $conducta->a22 + $conducta->a23)/3);
                            $a3 = round(($conducta->a31 + $conducta->a32 + $conducta->a33)/3);
                            $a4 = round(($conducta->a41 + $conducta->a42 + $conducta->a43)/3);
                            $a5 = round(($conducta->a51 + $conducta->a52 + $conducta->a53)/3);
                        }else{
                            $a1 = $a2 = $a3 = $a4 = $a5 = 0;
                        }
                    @endphp
                    <td>
                        @php
                            if($a1==0){
                                echo "B";
                            }else if($a1 == 1){
                                echo "MB";
                            }else if($a1 == 2){
                                echo "E";
                            }else{
                                echo "SN";
                            }
                        @endphp
                    </td>
                    <td>
                        @php
                            if($a2==0){
                                echo "B";
                            }else if($a2 == 1){
                                echo "MB";
                            }else if($a2 == 2){
                                echo "E";
                            }else{
                                echo "SN";
                            }
                        @endphp
                    </td>
                    <td>
                        @php
                            if($a3==0){
                                echo "B";
                            }else if($a3 == 1){
                                echo "MB";
                            }else if($a3 == 2){
                                echo "E";
                            }else{
                                echo "SN";
                            }
                        @endphp
                    </td>
                    <td>
                        @php
                            if($a4==0){
                                echo "B";
                            }else if($a4 == 1){
                                echo "MB";
                            }else if($a4 == 2){
                                echo "E";
                            }else{
                                echo "SN";
                            }
                        @endphp
                    </td>
                    <td>
                        @php
                            if($a5==0){
                                echo "B";
                            }else if($a5 == 1){
                                echo "MB";
                            }else if($a5 == 2){
                                echo "E";
                            }else{
                                echo "SN";
                            }
                        @endphp
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
						@endforeach
						<tr>
							<td colspan="3" class="text-center">Total de puntos</td>
							@foreach ($asignaturas as $a => $asignatura)
									<td>{{$pnf[$a]}}</td>
							@endforeach
							<td colspan="5"></td>
						</tr>
						<tr>
							<td colspan="3" class="text-center">Promedio</td>
							@foreach ($asignaturas as $a => $asignatura)
									<td>{{round(($pnf[$a]/count($estudiantes)))}}</td>
							@endforeach
							<td colspan="5"></td>
						</tr>
        </tbody>
		</table>
		<br>
		<div class="row">
			<div class="col-6">
                @php
                    //Inicio del calculo de la estadistica
                    foreach($e_e as $est){
                        if($est["sexo"] == 1){
                            $count_mi_f++;
                            if($est["estado"] == 0){
                                $count_re_f++;
                            }
                            if((($est["notas"])/count($asignaturas)) > 5){
                                $count_pr_f++;
                            }
                        }else{
                            $count_mi_m++;
                            if($est["estado"] == 0){
                                $count_re_m++;
                            }
                            if((($est["notas"])/count($asignaturas)) > 5){
                                $count_pr_m++;
                            }
                        }
                    }
                @endphp
				<h4>Estadística</h4>
				<table class="table table-sm table-striped">
					<thead>
						<th>Sexo</th>
						<th>Matrícula inicial</th>
						<th>Retirados</th>
						<th>Matrícula final</th>
						<th>Promovidos</th>
						<th>Retenidos</th>
					</thead>
					<tbody>
						<tr>
							<td>Masculino</td>
							<td class="text-center">{{$count_mi_m}}</td>
							<td class="text-center">{{$count_re_m}}</td>
							<td class="text-center">{{($count_mi_m - $count_re_m)}}</td>
							<td class="text-center">{{$count_pr_m}}</td>
							<td class="text-center">{{($count_mi_m - $count_re_m - $count_pr_m)}}</td>
						</tr>
						<tr>
							<td>Femenino</td>
							<td class="text-center">{{$count_mi_f}}</td>
							<td class="text-center">{{$count_re_f}}</td>
							<td class="text-center">{{($count_mi_f - $count_re_f)}}</td>
							<td class="text-center">{{$count_pr_f}}</td>
							<td class="text-center">{{($count_mi_f - $count_re_f - $count_pr_f)}}</td>
						</tr>
						<tr>
							<td>Total</td>
							<td class="text-center">{{($count_mi_f + $count_mi_m)}}</td>
							<td class="text-center">{{($count_re_f + $count_re_m)}}</td>
							<td class="text-center">{{($count_mi_f + $count_mi_m - $count_re_f - $count_re_m)}}</td>
							<td class="text-center">{{($count_pr_f + $count_pr_m)}}</td>
							<td class="text-center">{{($count_mi_f + $count_mi_m - $count_re_f - $count_re_m - $count_pr_f - $count_pr_m)}}</td>
						</tr>
					</tbody>
				</table>
            </div>
            <div class="col-6 px-4" style="font-size: 80%">
                <h4>Leyenda</h4>
                <div class="row">
                    @for ($i = 0; $i < count($asignaturas) + 5 ; $i++)
                        @if ($i == 0 || ($i == (round((count($asignaturas) + 5) / 2))))
                            <div class="col-6">
                        @endif
                        @if ($i < count($asignaturas))
                            <div class="row">
                                <b>{{App\Asignatura::abrev($asignaturas[$i]->indice).': '}}</b>
                                <span>{{App\Asignatura::i_abrev($asignaturas[$i]->indice)}}</span>
                            </div>
                        @endif
                        @if ($i == count($asignaturas))
                            <div class="row">
                                <b>ASP1 :</b>
                                <span>Respeto a sí mismo y a los demás</span>
                            </div>
                        @endif
                        @if ($i == count($asignaturas) + 1)
                            <div class="row">
                                <b>ASP2 :</b>
                                <span>Convivencia armónica y solidaria</span>
                            </div>
                        @endif
                        @if ($i == count($asignaturas) + 2)
                            <div class="row">
                                <b>ASP3 :</b>
                                <span>Toma de decisiones responsablemente</span>
                            </div>
                        @endif
                        @if ($i == count($asignaturas) + 3)
                            <div class="row">
                                <b>ASP4 :</b>
                                <span>Cumplimiento de deberes y correcto ejercicio de derechos</span>
                            </div>
                        @endif
                        @if ($i == count($asignaturas) + 4)
                            <div class="row">
                                <b>ASP5 :</b>
                                <span>Práctica de valores morales y cívicos</span>
                            </div>
                        @endif
                        @if ($i == count($asignaturas) + 4 || ($i == round((count($asignaturas) + 5) / 2) - 1))
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
		</div>
@endif
@endsection
