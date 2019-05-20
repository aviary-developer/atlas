@extends('welcome')
@section('layout')
    @include('Notas.Barra.create')

    {!!Form::open(['class' =>'','route' =>'notas.store','method' =>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'])!!}
    <div class="container-fluid mt-3">
        <div class="flex-row">
            <center>
                <h2>
                    {{$asignatura->asignatura->nombre}}
                </h2>
            </center>
        </div>
        <hr>
        <div class="row">
            <div class="col-8">
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
                <div class="flex-row mt-3">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div id="contenedor" class="tab-content">
                            @php
                                $p = null;
                            @endphp
                            @for ($i = 1; $i < 4; $i++)
                                @if ($i == 1)
                                    <div class="tab-pane fade show active" id={{$i."-p"}} role="tabpanel" aria-labelledby={{$i."-p-tab"}}>
                                @else
                                    <div class="tab-pane fade" id={{$i."-p"}} role="tabpanel" aria-labelledby={{$i."-p-tab"}}>
                                @endif
                                <div class="flex-row">

                                    <table class="table table-sm">
                                        <thead>
                                            <th>#</th>
                                            <th class="w-50">Estudiante</th>
                                            <th>N1 <small>(35%)</small></th>
                                            <th>N2 <small>(35%)</small></th>
                                            <th>N3 <small>(30%)</small></th>
                                            <th>Promedio</th>
                                        </thead>
                                        <tbody>
                                            @php
                                                $correlativo = 1;
                                            @endphp
                                            @foreach ($estudiantes as $k => $estudiante)
                                                <tr>
                                                    <td class="table-primary">{{$correlativo}}</td>
                                                    <td class="table-primary">
                                                        {{$estudiante->apellido.', '.$estudiante->nombre}}
                                                        @php
                                                            if($i == 1){
                                                                $nombre = "f_estudiante[]";
                                                            }else{
                                                                $nombre = "none";
                                                            }
                                                        @endphp
                                                        <input type="hidden" name={{$nombre}} value={{$estudiante->id}}>
                                                    </td>
                                                    @php
                                                        //Buscar notas actuales del estudiante
                                                        $notas_actuales = App\Nota::where('f_estudiante',$estudiante->id)->where('f_asignatura',$asignatura->id)->first();

                                                        if($notas_actuales == null){
                                                            $valor[0][0] = 0;
                                                            $valor[0][1] = 0;
                                                            $valor[0][2] = 0;

                                                            $valor[1][0] = 0;
                                                            $valor[1][1] = 0;
                                                            $valor[1][2] = 0;

                                                            $valor[2][0] = 0;
                                                            $valor[2][1] = 0;
                                                            $valor[2][2] = 0;
                                                        }else{
                                                            $valor[0][0] = $notas_actuales->n1p1;
                                                            $valor[0][1] = $notas_actuales->n2p1;
                                                            $valor[0][2] = $notas_actuales->n3p1;

                                                            $valor[1][0] = $notas_actuales->n1p2;
                                                            $valor[1][1] = $notas_actuales->n2p2;
                                                            $valor[1][2] = $notas_actuales->n3p2;

                                                            $valor[2][0] = $notas_actuales->n1p3;
                                                            $valor[2][1] = $notas_actuales->n2p3;
                                                            $valor[2][2] = $notas_actuales->n3p3;
                                                        }

                                                        $p[$k][1] = ($valor[0][0] * 0.35) + ($valor[0][1] * 0.35) + ($valor[0][2] * 0.3);
                                                        $p[$k][2] = ($valor[1][0] * 0.35) + ($valor[1][1] * 0.35) + ($valor[1][2] * 0.3);
                                                        $p[$k][3] = ($valor[2][0] * 0.35) + ($valor[2][1] * 0.35) + ($valor[2][2] * 0.3);
                                                    @endphp
                                                    <td>
                                                        <input type="number" class="form-control form-control-sm" min="0.00" max="10.00" step="0.01" value={{$valor[($i-1)][0]}} name={{'n1p'.$i.'[]'}}>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control form-control-sm" min="0.00" max="10.00" step="0.01" value={{$valor[($i-1)][1]}} name={{'n2p'.$i.'[]'}}>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control form-control-sm" min="0.00" max="10.00" step="0.01" value={{$valor[($i-1)][2]}} name={{'n3p'.$i.'[]'}}>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <span class="badge border border-primary text-primary font-lg col-12" id="avg_nota">{{number_format($p[$k][$i],2,'.',',')}}</span>
                                                        </center>
                                                    </td>
                                                </tr>
                                                @php
                                                    $correlativo++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="flex-row">
                    <center>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href={{asset('/notas')}} class="btn btn-light">Cancelar</a>
                    </center>
                </div>
            </div>
            <div class="col-4">
                <div class="flex-row">
                    <center>
                        <h3>Resumen de notas</h3>
                    </center>
                </div>
                <hr class="mb-2">
                <table class="table table-sm" id="tabla-resumen">
                    <thead>
                        <th>P1</th>
                        <th>P2</th>
                        <th>P3</th>
                        <th>PF</th>
                    </thead>
                    <tbody>
                        @foreach ($estudiantes as $k => $estudiante)
                            @php
                                $final = ($p[$k][1] + $p[$k][2] + $p[$k][3])/3;
                            @endphp
                            <tr>
                                <td><span class="badge badge-primary font-lg col-12" id="pr1">{{number_format($p[$k][1],2,'.',',')}}</span></td>
                                <td><span class="badge border border-secondary text-secondary font-lg col-12" id="pr2">{{number_format($p[$k][2],2,'.',',')}}</span></td>
                                <td><span class="badge border border-secondary text-secondary font-lg col-12" id="pr3">{{number_format($p[$k][3],2,'.',',')}}</span></td>
                                <td><span class="badge border border-success text-success font-lg col-12" id="prf">{{round($final)}}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <input type="hidden" name="id_a" value={{$asignatura->id}}>
    <script src= {{asset("js/system/notas.js")}}></script>

    {!! Form::close() !!}

@endsection
