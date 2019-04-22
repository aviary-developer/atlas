<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        NIE
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        @if ($estudiante->nie == null)
            <span class="badge border border-secondary text-secondary col-5">Sin Información</span>
        @else
            {{$estudiante->nie}}
        @endif
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Nombre Completo
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        {{$estudiante->nombre.' '.$estudiante->apellido}}
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Sexo
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        @if ($estudiante->sexo)
            <span class="badge border border-danger text-danger col-5">Femenino</span>
        @else
            <span class="badge border border-primary text-primary col-5">Masculino</span>
        @endif
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Fecha de nacimiento
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        {{$estudiante->fechaNacimiento->format('d / m / Y')}}
        <span class="badge badge-pill badge-primary float-right">
            {{$estudiante->fechaNacimiento->age.' años'}}
        </span>
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Lugar de nacimiento
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        {{$estudiante->lugarNacimiento}}
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Partida de nacimiento
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        @if ($partida)
            <div class="row">
                <div class="col-6">
                    <div class="flex-row">
                        Número
                        <span class="badge badge-pill border border-primary text-primary float-right col-5">{{$partida->numero}}</span>
                    </div>
                    <div class="flex-row">
                        Tomo
                        <span class="badge badge-pill border border-primary text-primary float-right col-5">{{$partida->tomo}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="flex-row">
                        Folio
                        <span class="badge badge-pill border border-primary text-primary float-right col-5">{{$partida->folio}}</span>
                    </div>
                    <div class="flex-row">
                        Libro
                        <span class="badge badge-pill border border-primary text-primary float-right col-5">{{$partida->libro}}</span>
                    </div>
                </div>
            </div>
        @else
            <span class="badge border border-secondary text-secondary col-5">Sin Información</span>
        @endif
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Dirección
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        {{$estudiante->direccion}}
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Zona de residencia
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        @if ($estudiante->zonaResidencia)
            <span class="badge border border-success text-success col-5">Rural</span>
        @else
            <span class="badge border border-primary text-primary col-5">Urbana</span>
        @endif
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        País
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        {{$estudiante->pais}}
        <span class="badge badge-pill badge-primary float-right">
            {{$estudiante->nacionalidad}}
        </span>
    </span>
</div>
<hr class="mb-1 mt-1">

@if ($estudiante->condicionExtranjeria != null)
    <div class="flex-row">
        <span class="font-weight-light text-monospace font-sm">
            Condición de extranjería
        </span>
    </div>
    <div class="flex-row">
        <span class="font-weight-bold">
            {{$estudiante->condicionExtranjeria}}
        </span>
    </div>
    <hr class="mb-1 mt-1">
@endif

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Estado Civil
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        {{$estudiante->estadoCivil}}
    </span>
</div>
<hr class="mb-1 mt-1">

<div class="flex-row">
    <span class="font-weight-light text-monospace font-sm">
        Correo Electrónico
    </span>
</div>
<div class="flex-row">
    <span class="font-weight-bold">
        @if ($estudiante->correo == null)
            <span class="badge border border-secondary text-secondary col-5">Sin Información</span>
        @else
            {{$estudiante->correo}}
        @endif
    </span>
</div>
