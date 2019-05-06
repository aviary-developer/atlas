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
            @endphp
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$estudiante->nie}}</td>
                    <td>{{$estudiante->apellido.', '.$estudiante->nombre}}</td>
                    @foreach ($asignaturas as $asignatura)
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
        </tbody>
    </table>
@endif
@endsection
