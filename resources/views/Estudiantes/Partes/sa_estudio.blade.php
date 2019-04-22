<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Centro Escolar procedente
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        @if ($estudiante->centroEscolarProcedente == null)
            <span class="badge border border-secondary text-secondary col-5">Sin Información</span>
        @else
            {{$estudiante->centroEscolarProcedente}}
        @endif
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Estudio Parvularia
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        @if ($estudiante->parvularia)
            <span class="badge border border-primary text-primary col-2">
                <i class="fas fa-check"></i> Si
            </span>
        @else
            <span class="badge border border-danger text-danger col-2">
                <i class="fas fa-times"></i> No
            </span>
        @endif
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Presentó Libreta de Notas
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        @if ($estudiante->libretaNotas)
            <span class="badge border border-primary text-primary col-2">
                <i class="fas fa-check"></i> Si
            </span>
        @else
            <span class="badge border border-danger text-danger col-2">
                <i class="fas fa-times"></i> No
            </span>
        @endif
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Presentó Certificado
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        @if ($estudiante->certificado)
            <span class="badge border border-primary text-primary col-2">
                <i class="fas fa-check"></i> Si
            </span>
        @else
            <span class="badge border border-danger text-danger col-2">
                <i class="fas fa-times"></i> No
            </span>
        @endif
    </span>
</div>
