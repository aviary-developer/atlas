@extends('welcome')
@section('layout')
    @include('Notas.Barra.create')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-8">
                <div class="flex-row">
                    <div class="nav justify-content-center nav-pills border-0" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                        <a class="nav-link active" id="1-p-tab" data-toggle="pill" href="#1-p" role="tab" aria-controls="1-p" aria-selected="true">
                            Primer Periodo
                        </a>

                        <a class="nav-link" id="2-p-tab" data-toggle="pill" href="#2-p" role="tab" aria-controls="2-p" aria-selected="false">
                            Segundo Periodo
                        </a>

                        <a class="nav-link" id="3-p-tab" data-toggle="pill" href="#3-p" role="tab" aria-controls="3-p" aria-selected="false">
                            Tercer Periodo
                        </a>
                    </div>
                </div>
                <div class="flex-row mt-3">
                    <div class="tab-content" id="v-pills-tabContent">
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
                                        <th>Nota 1</th>
                                        <th>Nota 2</th>
                                        <th>Nota 3</th>
                                        <th>Promedio</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $correlativo = 1;
                                        @endphp
                                        @foreach ($estudiantes as $estudiante)
                                            <tr>
                                                <td class="table-primary">{{$correlativo}}</td>
                                                <td class="table-primary">{{$estudiante->apellido.', '.$estudiante->nombre}}</td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" min="0.00" max="10.00" step="1.00">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" min="0.00" max="10.00" step="1.00">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" min="0.00" max="10.00" step="1.00">
                                                </td>
                                                <td>

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
            <div class="col-4">
                Resumen
            </div>
        </div>
    </div>
@endsection
