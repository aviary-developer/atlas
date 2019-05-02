@extends('welcome')
@section('layout')
    @include('Notas.Barra.create')

    {!!Form::open(['class' =>'','route' =>'conductas.store','method' =>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'])!!}

    <div class="container-fluid mt-3">
        <div class="flex-row">
            <center>
                <h2>
                    Conducta
                </h2>
            </center>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
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
                                            <th class="w-25">Estudiante</th>
                                            <th style="width: 15%">Respeto a sí mismo y a los demás</th>
                                            <th style="width: 15%">Convivencia armónica y solidaria</th>
                                            <th style="width: 15%">Toma de decisiones responsablemente</th>
                                            <th style="width: 15%">Cumplimiento de deberes y correcto ejercicio de derechos</th>
                                            <th style="width: 15%">Práctica de valores morales y cívicos</th>
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
                                                        $conducta = App\Conducta::where('f_estudiante',$estudiante->id)->first();

                                                        if($conducta == null){
                                                            $val[1][0] = -1;
                                                            $val[2][0] = -1;
                                                            $val[3][0] = -1;

                                                            $val[1][1] = -1;
                                                            $val[2][1] = -1;
                                                            $val[3][1] = -1;

                                                            $val[1][2] = -1;
                                                            $val[2][2] = -1;
                                                            $val[3][2] = -1;

                                                            $val[1][3] = -1;
                                                            $val[2][3] = -1;
                                                            $val[3][3] = -1;

                                                            $val[1][4] = -1;
                                                            $val[2][4] = -1;
                                                            $val[3][4] = -1;
                                                        }else{
                                                            $val[1][0] = $conducta->a11;
                                                            $val[2][0] = $conducta->a12;
                                                            $val[3][0] = $conducta->a13;

                                                            $val[1][1] = $conducta->a21;
                                                            $val[2][1] = $conducta->a22;
                                                            $val[3][1] = $conducta->a23;

                                                            $val[1][2] = $conducta->a31;
                                                            $val[2][2] = $conducta->a32;
                                                            $val[3][2] = $conducta->a33;

                                                            $val[1][3] = $conducta->a41;
                                                            $val[2][3] = $conducta->a42;
                                                            $val[3][3] = $conducta->a43;

                                                            $val[1][4] = $conducta->a51;
                                                            $val[2][4] = $conducta->a52;
                                                            $val[3][4] = $conducta->a53;
                                                        }
                                                    @endphp
                                                    <td>
                                                        <select name="{{'x1'.$i}}" id="" class="form-control form-control-sm" onchange="fill_array(this)">
                                                            @if ($val[$i][0] == -1)
                                                                <option value="-1" disabled selected>[Seleccione una opción]</option>
                                                            @else
                                                                <option value="-1" disabled>[Seleccione una opción]</option>
                                                            @endif
                                                            @if ($val[$i][0] == 2)
                                                                <option value="2" selected>Excelente</option>
                                                            @else
                                                                <option value="2">Excelente</option>
                                                            @endif
                                                            @if ($val[$i][0] == 1)
                                                                <option value="1" selected>Muy Bueno</option>
                                                            @else
                                                                <option value="1">Muy Bueno</option>
                                                            @endif
                                                            @if ($val[$i][0] == 0)
                                                                <option value="0" selected>Bueno</option>
                                                            @else
                                                                <option value="0">Bueno</option>
                                                            @endif
                                                        </select>
                                                        <input name="{{'a1'.$i.'[]'}}" value="{{$val[$i][0]}}" id="ai" type="hidden"/>
                                                    </td>
                                                    <td>
                                                        <select name="{{'x2'.$i}}" id="" class="form-control form-control-sm" onchange="fill_array(this)">
                                                            @if ($val[$i][1] == -1)
                                                                <option value="-1" disabled selected>[Seleccione una opción]</option>
                                                            @else
                                                                <option value="-1" disabled>[Seleccione una opción]</option>
                                                            @endif
                                                            @if ($val[$i][1] == 2)
                                                                <option value="2" selected>Excelente</option>
                                                            @else
                                                                <option value="2">Excelente</option>
                                                            @endif
                                                            @if ($val[$i][1] == 1)
                                                                <option value="1" selected>Muy Bueno</option>
                                                            @else
                                                                <option value="1">Muy Bueno</option>
                                                            @endif
                                                            @if ($val[$i][1] == 0)
                                                                <option value="0" selected>Bueno</option>
                                                            @else
                                                                <option value="0">Bueno</option>
                                                            @endif
                                                        </select>
                                                        <input name="{{'a2'.$i.'[]'}}" value="{{$val[$i][1]}}" id="ai" type="hidden"/>
                                                    </td>
                                                    <td>
                                                        <select name="{{'x3'.$i}}" id="" class="form-control form-control-sm" onchange="fill_array(this)">
                                                            @if ($val[$i][2] == -1)
                                                                <option value="-1" disabled selected>[Seleccione una opción]</option>
                                                            @else
                                                                <option value="-1" disabled>[Seleccione una opción]</option>
                                                            @endif
                                                            @if ($val[$i][2] == 2)
                                                                <option value="2" selected>Excelente</option>
                                                            @else
                                                                <option value="2">Excelente</option>
                                                            @endif
                                                            @if ($val[$i][2] == 1)
                                                                <option value="1" selected>Muy Bueno</option>
                                                            @else
                                                                <option value="1">Muy Bueno</option>
                                                            @endif
                                                            @if ($val[$i][2] == 0)
                                                                <option value="0" selected>Bueno</option>
                                                            @else
                                                                <option value="0">Bueno</option>
                                                            @endif
                                                        </select>
                                                        <input name="{{'a3'.$i.'[]'}}" value="{{$val[$i][2]}}" id="ai" type="hidden"/>
                                                    </td>
                                                    <td>
                                                        <select name="{{'x4'.$i}}" id="" class="form-control form-control-sm" onchange="fill_array(this)">
                                                            @if ($val[$i][3] == -1)
                                                                <option value="-1" disabled selected>[Seleccione una opción]</option>
                                                            @else
                                                                <option value="-1" disabled>[Seleccione una opción]</option>
                                                            @endif
                                                            @if ($val[$i][3] == 2)
                                                                <option value="2" selected>Excelente</option>
                                                            @else
                                                                <option value="2">Excelente</option>
                                                            @endif
                                                            @if ($val[$i][3] == 1)
                                                                <option value="1" selected>Muy Bueno</option>
                                                            @else
                                                                <option value="1">Muy Bueno</option>
                                                            @endif
                                                            @if ($val[$i][3] == 0)
                                                                <option value="0" selected>Bueno</option>
                                                            @else
                                                                <option value="0">Bueno</option>
                                                            @endif
                                                        </select>
                                                        <input name="{{'a4'.$i.'[]'}}" value="{{$val[$i][3]}}" id="ai" type="hidden"/>
                                                    </td>
                                                    <td>
                                                        <select name="{{'x5'.$i}}" id="" class="form-control form-control-sm" onchange="fill_array(this)">
                                                            @if ($val[$i][4] == -1)
                                                                <option value="-1" disabled selected>[Seleccione una opción]</option>
                                                            @else
                                                                <option value="-1" disabled>[Seleccione una opción]</option>
                                                            @endif
                                                            @if ($val[$i][4] == 2)
                                                                <option value="2" selected>Excelente</option>
                                                            @else
                                                                <option value="2">Excelente</option>
                                                            @endif
                                                            @if ($val[$i][4] == 1)
                                                                <option value="1" selected>Muy Bueno</option>
                                                            @else
                                                                <option value="1">Muy Bueno</option>
                                                            @endif
                                                            @if ($val[$i][4] == 0)
                                                                <option value="0" selected>Bueno</option>
                                                            @else
                                                                <option value="0">Bueno</option>
                                                            @endif
                                                        </select>
                                                        <input name="{{'a5'.$i.'[]'}}" value="{{$val[$i][4]}}" id="ai" type="hidden"/>
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
        </div>
    </div>

    {!! Form::close() !!}
    <script>
        $(document).ready(function(){

            load_border();
            function load_border(){
                $('select').each(function(k,o){
                    var valor = $(o).val();

                    if(valor == -1){
                        $(o).removeClass('border border-primary border-success border-warning');
                    }

                    if(valor == 0){
                        $(o).removeClass('border-primary border-success').addClass('border-warning');
                    }

                    if(valor == 1){
                        $(o).removeClass('border-warning border-success').addClass('border-primary');
                    }

                    if(valor == 2){
                        $(o).removeClass('border-primary border-warning').addClass('border-success');
                    }
                })
            }
        });
        function fill_array(o){
            $(o).parent('td').find('#ai').val($(o).val());

            var valor = $(o).val();

            if(valor == -1){
                $(o).removeClass('border border-primary border-success border-warning');
            }

            if(valor == 0){
                $(o).removeClass('border-primary border-success').addClass('border-warning');
            }

            if(valor == 1){
                $(o).removeClass('border-warning border-success').addClass('border-primary');
            }

            if(valor == 2){
                $(o).removeClass('border-primary border-warning').addClass('border-success');
            }
        }
    </script>
@endsection
