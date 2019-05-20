<div class="flex-row mt-2">
    <center>
        <h4>Notas</h4>
    </center>
</div>
<div class="flex-row">
    <div class="nav justify-content-center nav-pills border-0" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
        <a class="nav-link active" id="1-p-tab" data-toggle="pill" href="#1-p" role="tab" aria-controls="1-p" aria-selected="true" data-value="1">
            Primer Periodo
        </a>

        <a class="nav-link" id="2-p-tab" data-toggle="pill" href="#2-p" role="tab" aria-controls="2-p" aria-selected="false" data-value="2">
            Segundo Periodo
        </a>

        <a class="nav-link" id="3-p-tab" data-toggle="pill" href="#3-p" role="tab" aria-controls="3-p" aria-selected="false" data-value="3">
            Tercer Periodo
        </a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="tab-content" id="v-pills-tabContent">
            <div id="contenedor" class="tab-content">
                @for ($i = 1; $i < 4; $i++)
                    @if ($i==1)
                        <div class="tab-pane fade show active" id={{$i."-p"}} role="tabpanel" aria-labelledby={{$i."-p-tab"}}>
                    @else
                        <div class="tab-pane fade" id={{$i."-p"}} role="tabpanel" aria-labelledby={{$i."-p-tab"}}>
                    @endif
                        <table class="table table-sm table-hover table-striped">
                            <thead>
                                <th style="width: 40%;">Asignatura</th>
                                <th class="text-right">N1</th>
                                <th class="text-right">N2</th>
                                <th class="text-right">N3</th>
                                <th class="text-right">{{'P'.$i}}</th>
                                <th style="width: 30px; background: none; border:none;"></th>
                                <th class="text-right">P1</th>
                                <th class="text-right">P2</th>
                                <th class="text-right">P3</th>
                                <th class="text-right">PF</th>
                            </thead>
                            <tbody>
                                @foreach ($grado->asignaturas as $asignaturas)
                                    @php
                                        $notas = App\Nota::where('f_asignatura',$asignaturas->id)->where('f_estudiante',$grado->f_matricula)->first();

                                        $ns = [];

                                        if($notas != null){
                                            $ns[1][1] = $notas->n1p1;
                                            $ns[1][2] = $notas->n2p1;
                                            $ns[1][3] = $notas->n3p1;
                                            $ns[2][1] = $notas->n1p2;
                                            $ns[2][2] = $notas->n2p2;
                                            $ns[2][3] = $notas->n3p2;
                                            $ns[3][1] = $notas->n1p3;
                                            $ns[3][2] = $notas->n2p3;
                                            $ns[3][3] = $notas->n3p3;
                                        }else{
                                            $ns[1][1] = 0;
                                            $ns[1][2] = 0;
                                            $ns[1][3] = 0;
                                            $ns[2][1] = 0;
                                            $ns[2][2] = 0;
                                            $ns[2][3] = 0;
                                            $ns[3][1] = 0;
                                            $ns[3][2] = 0;
                                            $ns[3][3] = 0;
                                        }

                                        $p[1] = ($ns[1][1] * 0.35) + ($ns[1][2] * 0.35) + ($ns[1][3] * 0.3);
                                        $p[2] = ($ns[2][1] * 0.35) + ($ns[2][2] * 0.35) + ($ns[2][3] * 0.3);
                                        $p[3] = ($ns[3][1] * 0.35) + ($ns[3][2] * 0.35) + ($ns[3][3] * 0.3);
                                        $p[4] = ($p[1] + $p[2] + $p[3])/3;

                                        $clase1 = $clase2 = $clase3 = "text-right";
                                        if($i==1){
                                            $clase1 = "text-right table-primary font-weight-bold";
                                        }else if($i == 2){
                                            $clase2 = "text-right table-primary font-weight-bold";
                                        }else{
                                            $clase3 = "text-right table-primary font-weight-bold";
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{$asignaturas->asignatura->nombre}}</td>
                                        <td class="text-right">{{number_format($ns[$i][1],2)}}</td>
                                        <td class="text-right">{{number_format($ns[$i][2],2)}}</td>
                                        <td class="text-right">{{number_format($ns[$i][3],2)}}</td>
                                        <td class="text-right font-weight-bold text-primary">{{number_format($p[$i],2)}}</td>
                                        <td style="border: none; background: #e9ecef;"></td>
                                        <td class="{{$clase1}}">{{number_format($p[1],2)}}</td>
                                        <td class="{{$clase2}}">{{number_format($p[2],2)}}</td>
                                        <td class="{{$clase3}}">{{number_format($p[3],2)}}</td>
                                        <td class="text-right font-weight-bold text-success">{{round($p[4])}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
