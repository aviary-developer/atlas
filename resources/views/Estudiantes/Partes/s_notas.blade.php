<div class="flex-row mt-2">
    <center>
        <h4>Notas</h4>
    </center>
</div>
<table class="table table-sm table-striped">
    <thead>
        <th class="w-25">Asignatura</th>
        <th>N1</th>
        <th>N2</th>
        <th>N3</th>
        <th>P1</th>
        <th>N1</th>
        <th>N2</th>
        <th>N3</th>
        <th>P2</th>
        <th>N1</th>
        <th>N2</th>
        <th>N3</th>
        <th>P3</th>
        <th>PF</th>
    </thead>
    <tbody>
        @foreach ($grado->asignaturas as $asignaturas)
            @php
                $notas = App\Nota::where('f_asignatura',$asignaturas->id)->where('f_estudiante',$grado->f_matricula)->first();
            @endphp
            <tr>
                <td>{{$asignaturas->asignatura->nombre}}</td>
                @if ($notas!= null)
                    <td class="text-right">{{number_format($notas->n1p1,2)}}</td>
                    <td class="text-right">{{number_format($notas->n2p1,2)}}</td>
                    <td class="text-right">{{number_format($notas->n3p1,2)}}</td>
                    @php
                        $p1 = ($notas->n1p1 + $notas->n2p1 + $notas->n3p1) / 3;
                    @endphp
                    <td class="table-primary font-weight-bold text-right">{{number_format($p1,2)}}</td>
                    <td class="text-right">{{number_format($notas->n1p2,2)}}</td>
                    <td class="text-right">{{number_format($notas->n2p2,2)}}</td>
                    <td class="text-right">{{number_format($notas->n3p2,2)}}</td>
                    @php
                        $p2 = ($notas->n1p2 + $notas->n2p2 + $notas->n3p2) / 3;
                    @endphp
                    <td class="table-primary font-weight-bold text-right">{{number_format($p2,2)}}</td>
                    <td class="text-right">{{number_format($notas->n1p3,2)}}</td>
                    <td class="text-right">{{number_format($notas->n2p3,2)}}</td>
                    <td class="text-right">{{number_format($notas->n3p3,2)}}</td>
                    @php
                        $p3 = ($notas->n1p3 + $notas->n2p3 + $notas->n3p3) / 3;
                    @endphp
                    <td class="table-primary font-weight-bold text-right">{{number_format($p3,2)}}</td>
                    @php
                        $pf = ($p1 + $p2 + $p3)/3;
                    @endphp
                    <td class="table-success font-weight-bold text-right">{{number_format($pf,2)}}</td>
                @else
                    <td class="text-right">0.00</td>
                    <td class="text-right">0.00</td>
                    <td class="text-right">0.00</td>
                    <td class="table-primary font-weight-bold text-right">0.00</td>
                    <td class="text-right">0.00</td>
                    <td class="text-right">0.00</td>
                    <td class="text-right">0.00</td>
                    <td class="table-primary font-weight-bold text-right">0.00</td>
                    <td class="text-right">0.00</td>
                    <td class="text-right">0.00</td>
                    <td class="text-right">0.00</td>
                    <td class="table-primary font-weight-bold text-right">0.00</td>
                    <td class="table-success font-weight-bold text-right">0.00</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
