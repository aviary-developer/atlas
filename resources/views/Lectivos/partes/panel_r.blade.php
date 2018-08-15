<div class="nav-tabs-responsive">
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a href="#tb1" class="nav-link active" data-toggle="tab">
            <i class="icon-calendar"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="#tb2" class="nav-link" data-toggle="tab">
                <i class="icon-briefcase"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="#tb3" class="nav-link" data-toggle="tab">
                <i class="icon-user"></i>
            </a>
        </li>
    </ul>
    <div id="tab-contents" class="tab-content">
        <div id="tb1" class="tab-pane show active mb-3">
            <div id="tb1-collapse" class="collapse show" data-parent="#tab-contents">
                <div class="row">
                    <div class="col-8">
                        <div class="mb-3 font-weight-bold">Años Lectivos</div>
                    </div>
                    <div class="col-4 text-right">
                        <button type="button" class="btn btn-sm btn-secondary" id="new-lectivo" data-toggle="tooltip" data-placement="left" title="Nuevo">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
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
        </div>
        <div id="tb2" class="tab-pane">
            <div id="tb2-collapse" class="collapse" data-parent="#tab-contents">
                <div class="mb-3 font-weight-bold">Grados</div>
            </div>
        </div>
        <div id="tb3" class="tab-pane">
            <div id="tb3-collapse" class="collapse" data-parent="#tab-contents">
                <div class="mb-3 font-weight-bold">Docentes</div>
            </div>
        </div>
    </div>
</div>
