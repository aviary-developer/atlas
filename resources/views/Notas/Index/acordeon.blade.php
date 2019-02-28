<div class="accordion" id="acc_notas">
    @foreach ($grados as $k => $grado)
        @if ($grado->numero > 2)
            <div class="card">
                <div class="card-header p-1" id={{'H'.$k}}>
                    <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target={{'#C'.$k}} aria-expanded="false" aria-controls={{'C'.$k}} style="text-decoration: none !important">
                        {{$grado->grado}} <span class="badge badge-primary">{{$grado->seccion}}</span>
                    </button>
                    </h5>
                </div>
                <div id={{'C'.$k}} class="collapse p-2" aria-labelledby={{'H'.$k}} data-parent="#acc_notas">
                    {{-- Algoritmo para obtener las materias que el docente imparte en este grado --}}
                    @if ($docente->id == $grado->f_profesor)
                        {{-- Obtener las materias en las que el docente es asesor de grado o no hay un docente encargado --}}
                        @php
                            $asignaturas_propias = App\AsignaturaGrado::where('f_grado',$grado->id)
                            ->where(function ($query) use($docente) {
                                $query->where('f_profesor', $docente->id)
                                ->orWhere('f_profesor', null);
                            })->get();
                        @endphp
                    @else
                        {{-- Obtener las materias en las cuales el docente asesora en ese grado --}}
                        @php
                            $asignaturas_propias = App\AsignaturaGrado::where('f_profesor',$docente->id)->where('f_grado',$grado->id)->get();
                        @endphp
                    @endif
                    <table class="table table-sm table-hover table-striped table-bordered table-primary">
                        <thead>
                            <th>#</th>
                            <th>Asignatura</th>
                            <th>Editar</th>
                        </thead>
                        <tbody>
                            @php
                                $correlativo = 1;
                            @endphp
                            @foreach ($asignaturas_propias as $asignatura)
                                <tr>
                                    <td>{{$correlativo}}</td>
                                    <td>{{$asignatura->asignatura->nombre}}</td>
                                    <td>
                                        <a href={{asset('/notas/create?&asignatura='.$asignatura->id)}} class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
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
        @endif
    @endforeach
</div>
