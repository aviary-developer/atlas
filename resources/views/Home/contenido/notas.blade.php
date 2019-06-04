<table class="table table-sm table-striped">
    <thead>
        <th class="font-sm">#</th>
        <th class="font-sm">Nombre</th>
        @foreach ($materias as $materia)
            <th class="font-sm">{{App\Asignatura::abrev($materia->indice)}}</th>
        @endforeach
        <th class="font-sm">PF</th>
    </thead>
    <tbody>
        @php
            $correlativo = 1;
        @endphp
        @foreach ($estudiantes_a as $e => $estudiante)
            <tr>
                <td>{{$correlativo}}</td>
                <td>
                    {{$estudiante->apellido.', '.$estudiante->nombre}}
                    @if (!$estudiante->estado)
                        <span class="badge badge-danger" title="Retirado" data-toogle="toogle">R</span>
                    @endif
                </td>
                @foreach ($materias as $a => $materia)
                    @php
                        $notas = App\Nota::where('f_asignatura',$materia->ag_id)->where('f_estudiante',$estudiante->matricula)->first();

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
                            $count_a_f = $count_a_m = $count_r_f = $count_r_m = $gnf = 0;
                        }

                        if($a == 0){
                            $e_e[$e]["notas"] = 0;
                            $e_e[$e]["bandera"] = true;
                        }

                        $pnf[$a] += round($pf);

                        $e_e[$e]["sexo"] = $estudiante->sexo;
                        $e_e[$e]["notas"] += round($pf);
                        $e_e[$e]["estado"] = $estudiante->estado;

                        if($materia->indice < 4 && round($pf) < 5){
                            $e_e[$e]["bandera"] = false;
                        }

                        $promedio_final[$e] = round($e_e[$e]["notas"]/count($materias));
                    @endphp
                    <td>
                        @if (round($pf) < 5)
                            @if ($materia->indice < 4)
                                <span class="badge badge-danger col-12">
                                    {{round($pf)}}
                                </span>
                            @else
                                <span class="badge badge-warning col-12">
                                    {{round($pf)}}
                                </span>
                            @endif
                        @else
                            <center>
                                {{round($pf)}}
                            </center>
                        @endif
                    </td>
                @endforeach
                @php
                    if($estudiante->sexo){
                        if(round($promedio_final[$e]) < 5 || !$e_e[$e]["bandera"]){
                            $count_r_f++;
                        }else{
                            $count_a_f++;
                        }
                    }else{
                        if(round($promedio_final[$e]) < 5 || !$e_e[$e]["bandera"]){
                            $count_r_m++;
                        }else{
                            $count_a_m++;
                        }
                    }

                    $gnf += $promedio_final[$e];
                @endphp
                <td>
                    @if ($promedio_final[$e] >= 5 && $e_e[$e]["bandera"])
                        <span class="badge badge-success col-12">
                            {{$promedio_final[$e]}}
                        </span>
                    @else
                        <span class="badge badge-danger col-12">
                            {{$promedio_final[$e]}}
                        </span>
                    @endif
                </td>
                @php
                    $correlativo++;
                @endphp
            </tr>
        @endforeach
    </tbody>
</table>
<div class="rounded-top bg-navy mt-2">
    <center>
        <span class="text-white font-lg font-weight-light">
            Estadística
        </span>
    </center>
</div>
<div class="bg-teal">
    <div class="row">
        <div class="col-2">
            <div class="row">
                <div class="col-12"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <center>
                        <b class="font-sm">Asignatura</b>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    <center>
                        <b class="font-sm">Aprobados</b>
                    </center>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <center>
                        <b class="font-sm">Masc.</b>
                    </center>
                </div>
                <div class="col-4">
                    <center>
                        <b class="font-sm">Fem.</b>
                    </center>
                </div>
                <div class="col-4">
                    <center>
                        <b class="font-sm">Total</b>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-3 border-left border-right">
            <div class="row">
                <div class="col-12">
                    <center>
                        <b class="font-sm">Reprobados</b>
                    </center>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <center>
                        <b class="font-sm">Masc.</b>
                    </center>
                </div>
                <div class="col-4">
                    <center>
                        <b class="font-sm">Fem.</b>
                    </center>
                </div>
                <div class="col-4">
                    <center>
                        <b class="font-sm">Total</b>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    <center>
                        <b class="font-sm">General</b>
                    </center>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <center>
                        <b class="font-sm">Masc.</b>
                    </center>
                </div>
                <div class="col-4">
                    <center>
                        <b class="font-sm">Fem.</b>
                    </center>
                </div>
                <div class="col-4">
                    <center>
                        <b class="font-sm">Total</b>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-1">
            <div class="row">
                <div class="col-12"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <center>
                        <b class="font-sm">PF</b>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-primary rounded-bottom pb-1">
    <div class="row">
        <div class="col-2">
            <center>
                <b class="font-sm">General</b>
            </center>
        </div>
        <div class="col-1">
            <center>
                <b class="font-sm">{{$count_a_m}}</b>
            </center>
        </div>
        <div class="col-1">
            <center>
                <b class="font-sm">{{$count_a_f}}</b>
            </center>
        </div>
        <div class="col-1 border-right">
            <center>
                <b class="font-sm">{{($count_a_f + $count_a_m)}}</b>
            </center>
        </div>
        <div class="col-1">
            <center>
                <b class="font-sm">{{$count_r_m}}</b>
            </center>
        </div>
        <div class="col-1">
            <center>
                <b class="font-sm">{{$count_r_f}}</b>
            </center>
        </div>
        <div class="col-1 border-right">
            <center>
                <b class="font-sm">{{($count_r_f + $count_r_m)}}</b>
            </center>
        </div>
        <div class="col-1">
            <center>
                <b class="font-sm">{{($count_a_m + $count_r_m)}}</b>
            </center>
        </div>
        <div class="col-1">
            <center>
                <b class="font-sm">{{($count_a_f + $count_r_f)}}</b>
            </center>
        </div>
        <div class="col-1">
            <center>
                <b class="font-sm">{{($count_a_f + $count_a_m + $count_r_f + $count_r_m)}}</b>
            </center>
        </div>
        <div class="col-1">
            <center>
                <b class="font-sm">{{number_format(($gnf/count($estudiantes_a)),1)}}</b>
            </center>
        </div>
    </div>
</div>
