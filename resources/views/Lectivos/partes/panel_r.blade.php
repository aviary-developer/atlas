<div class="flex-row">
    <center>
        <button type="button" class="btn btn-primary" id="btn-cierre" data-toggle="modal" data-tooltip="tooltip" data-target="#m_cierre_anio" title="Cuadrar notas" data-option="{{$anio_activo->id}}">
            Cuadrar notas
        </button>
    </center>
</div>
<hr class="my-2">
<div class="row">
    <div class="col-8">
        <div class="mb-3 font-weight-bold">Años Lectivos</div>
    </div>
    <div class="col-4 text-right">
        @if ($count_anio == 0 || $count_anio_next == 0)
            <button type="button" class="btn btn-sm btn-secondary" id="new-lectivo" data-toggle="modal" data-tooltip="tooltip" data-target="#m_nuevo_lectivo" title="Nuevo">
                <i class="fas fa-plus"></i>
            </button>
        @endif
    </div>
</div>
<div>
    @if ($lectivos != null)
        @foreach ($lectivos as $lectivo)
            <div class="col-12 m-1">
                <center>
                    @if ($lectivo->id == $anio_activo->id)
                        <button type="button" class="btn btn-sm btn-info col-10 btn-d" onclick={{"selected_year(".$lectivo->anio.",".$lectivo->id.",".$lectivo->estado.",this)"}}>
                            {{$lectivo->anio}}
                            @if ($lectivo->estado == false)
                                <span class="badge badge-dark">A</span>
                            @endif
                        </button>
                    @else
                        <button type="button" class="btn btn-sm btn-secundary col-10 btn-d" onclick={{"selected_year(".$lectivo->anio.",".$lectivo->id.",".$lectivo->estado.",this)"}}>
                            {{$lectivo->anio}}
                            @if ($lectivo->estado == false)
                                <span class="badge badge-dark">A</span>
                            @endif
                        </button>
                    @endif
                </center>
            </div>
        @endforeach
    @endif
</div>
@include('Lectivos.modal.nuevo_lectivo')
@include('Lectivos.modal.cierre_anio')
