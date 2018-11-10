@extends('welcome')
@section('layout')
  <?php
  $estadoOpuesto=true;
  ?>

  @include('Usuarios.Barra.permiso_index')

  <div class="container-fluid mt-3">
    <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped table-hover" id="tabla-permiso">
        <thead>
            <th>#</th>
            <th style="width: 250px;">Nombre</th>
            <th style="width: 100px;">Consumo Mensual</th>
            <th>Horas restantes</th>
            <th style="width: 100px;">Consumo Anual</th>
            <th style="width: 100px;">Total Anual</th>
            <th style="width: 80px;">Acción</th>
        </thead>
        <tbody>
            @if ($usuarios!=null)
                @php
                    $correlativo = 1;
                @endphp
                @foreach ($usuarios as $usuario)
                    @php
                        $permisos = $usuario->permiso;
                        $inicio_mes = Carbon\Carbon::now();
                        $fin_mes = Carbon\Carbon::now();
                        $inicio_mes->startOfMonth();
                        $fin_mes->endOfMonth();

                        $horas_mes_salud = 0;
                        $horas_mes_personal = 0;
                        $horas_anio_salud = 0;
                        $horas_anio_personal = 0;

                        $total_personal = 5 * $usuario->turnos * 5;
                        $total_salud = 5 * $usuario->turnos * 15;

                        if($permisos != null){
                            $permisos_anio = $permisos->where('f_lectivo',App\Lectivo::activo());
                            foreach($permisos_anio as $p_a){
                                if($p_a->fecha_inicio->between($inicio_mes,$fin_mes)){
                                    if($p_a->categoria == 0){
                                        $horas_mes_personal += $p_a->horas;
                                    }else{
                                        $horas_mes_salud += $p_a->horas;
                                    }
                                }
                                if($p_a->categoria == 0){
                                    $horas_anio_personal += $p_a->horas;
                                }else{
                                    $horas_anio_salud += $p_a->horas;
                                }
                            }
                        }

                        $consumo_salud = $horas_anio_salud / $total_salud * 100;
                        $consumo_personal = $horas_anio_personal / $total_personal * 100;

                        $longitud_salud = 'width:'.(100 - $consumo_salud).'%';
                        $longitud_personal = 'width:'.(100 - $consumo_personal).'%';

                    @endphp
                    <tr>
                        <td>{{$correlativo}}</td>
                        <td>{{$usuario->nombre.' '.$usuario->apellido}}</td>
                        <td >
                            <span class="badge font-sm border border-primary text-primary col-12" data-tooltip="tooltip" title="Personal">
                                <i class="fas fa-user"></i>
                                {{$horas_mes_personal}}
                            </span>
                            <span class="badge font-sm border border-success text-success col-12" data-tooltip="tooltip" title="Salud">
                                <i class="fas fa-medkit"></i>
                                {{$horas_mes_salud}}
                            </span>
                        </td>
                        <td>
                            <div class="progress mb-2 mt-1 border border-primary">
                                <div class="progress-bar font-sm progress-bar-animated progress-bar-striped" role="progressbar" style={!!$longitud_personal!!} aria-valuenow={!! (100-$consumo_personal) !!} aria-valuemin="0" aria-valuemax="100">
                                    {{($total_personal - $horas_anio_personal).' horas'}}
                                </div>
                            </div>
                            <div class="progress border border-success">
                                <div class="progress-bar bg-success font-sm progress-bar-striped progress-bar-animated" role="progressbar" style={!!$longitud_salud!!} aria-valuenow={!! (100-$consumo_salud) !!} aria-valuemin="0" aria-valuemax="100">
                                    {{($total_salud - $horas_anio_salud).' horas'}}
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge font-sm border border-primary text-primary col-12" data-tooltip="tooltip" title="Personal">
                                <i class="fas fa-user"></i>
                                {{$horas_anio_personal}}
                            </span>
                            <span class="badge font-sm border border-success text-success col-12" data-tooltip="tooltip" title="Salud">
                                <i class="fas fa-medkit"></i>
                                {{$horas_anio_salud}}
                            </span>
                        </td>
                        <td>
                            <span class="badge font-sm border border-primary text-primary col-12" data-tooltip="tooltip" title="Personal">
                                <i class="fas fa-user"></i>
                                {{$total_personal}}
                            </span>
                            <span class="badge font-sm border border-success text-success col-12" data-tooltip="tooltip" title="Salud">
                                <i class="fas fa-medkit"></i>
                                {{$total_salud}}
                            </span>
                        </td>
                        <td>
                            <center>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-value={{$usuario->id}} id="new_permiso">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </center>
                        </td>
                    </tr>

                    @php
                    $correlativo++;
                    @endphp
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
  </div>
@include('Usuarios.Partes.nuevo_permiso')
<script src= {{asset("js/system/permiso.js")}}></script>
@endsection
