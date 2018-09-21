<div class="flex-row">
    <center>
        <span class="mb-3 font-weight-bold">
            Información
            <i class="icon-info"></i>
        </span>
    </center>
</div>
<div class="row mt-3">
    <div class="col-3">
        Grado:
    </div>
    <div class="col-9 text-right">
        <span class="badge border border-primary text-primary font-sm col-8">
            {{$grado->grado}}
        </span>
    </div>
</div>
<div class="row mt-1">
    <div class="col-3">
        Sección:
    </div>
    <div class="col-9 text-right">
        <span class="badge border border-primary text-primary font-sm col-8">
            {{$grado->seccion}}
        </span>
    </div>
</div>
<div class="row mt-1">
    <div class="col-3">
        Turno:
    </div>
    <div class="col-9 text-right">
        @if ($grado->turno)
            <span class="badge border border-warning font-sm col-8">Matutino</span>
        @else
            <span class="badge border border-info font-sm col-8">Vespertino</span>
        @endif
    </div>
</div>
<div class="flex-row mt-3">
    <center>
        Docente:
    </center>
</div>
<div class="flex-row">
    <center>
        @if ($grado->f_profesor != null)
        <span class="font-weight-bold">
            {{
                $grado->docente->nombre.' '.$grado->docente->apellido
            }}
        </span>
        @else
            <span class="badge badge-light text-danger border-danger border">No asignado</span>
        @endif
    </center>
</div>
