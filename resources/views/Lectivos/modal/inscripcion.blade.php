<div class="modal fade" tabindex="-1" role="dialog" id="m_estudiante_buscar" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Estudiante
                    <span class="badge badge-info">Inscripción</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-row">
                    <center>
                        Estudiantes que el año anterior han aprobado, reprobado o no fueron inscritos.
                    </center>
                </div>
                @php
                    $correlativo = 1;
                @endphp
                @if ($p_matricula != null)
                    <div class="row" id="contenedor">
                        @foreach ($p_matricula as $xm => $mat)
                            @if ($xm == 0 || $xm == round($p_matricula->count()/2))
                                <div class="col-6">
                            @endif
                                <hr class="my-1">
                                <div class="row">
                                    <div class="col-1">
                                        <span class="text-monospace">{{$correlativo}}</span>
                                    </div>
                                    <div class="col-9">
                                        @if ($mat->sexo)
                                            <span class="text-danger border border-danger badge">
                                                <i class="fas fa-female"></i>
                                            </span>
                                        @else
                                            <span class="text-primary border border-primary badge">
                                                <i class="fas fa-male"></i>
                                            </span>
                                        @endif
                                        <span class="">{{$mat->apellido.', '.$mat->nombre}}</span>
                                        <br>
                                        @if ($mat->nie == null)
                                            <span class="badge border border-secondary text-secondary">Sin NIE</span>
                                        @else
                                            <span class="text-primary text-monospace">{{$mat->nie}}</span>
                                        @endif
                                    </div>
                                    <div class="col-2">
                                        @php
                                            $reg = App\Matricula::join('grados','matriculas.f_grado','grados.id')
                                            ->where('matriculas.f_estudiante',$mat->id)->where('grados.f_lectivo',$grado->f_lectivo)->first();
                                            if($reg == null){
                                                $estado = 0;
                                            }else if($reg->f_grado == $grado->id){
                                                $estado = 1;
                                            }else{
                                                $estado = 2;
                                            }
                                        @endphp
                                        @if ($estado == 0)
                                            <button type="button" class="btn btn-sm btn-primary" id="add_student" data-value="{{$mat->id}}">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        @elseif($estado == 1)
                                            <button type="button" class="btn btn-sm btn-success" disabled>
                                                <i class="fas fa-check"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-secondary" disabled>
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @if ($xm == round($p_matricula->count()/2)-1 || $xm == count($p_matricula)-1)
                                </div>
                            @endif
                            @php
                                $correlativo++;
                            @endphp
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" onclick="location.reload()">Cerrar</button>
            </div>
        </div>
    </div>
</div>

