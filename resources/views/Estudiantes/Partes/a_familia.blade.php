<div class="flex-row">
    <center>
        <div class="mb-0 font-weight-bold">
            Familiares
        </div>
    </center>
    <center>
        <div class="mb-3">
            Seleccione una opción
        </div>
    </center>
</div>
<div class="row">
    <div class="col-6">
        <center>
            <button type="button" class="btn btn-lg btn-success col-8" data-target="#m_pariente" data-toggle="modal" onclick="$('#h-pariente').val('create');"
                <i class="fas fa-plus"></i> Crear nuevo
            </button>
        </center>
    </div>
    <div class="col-6">
        <center>
            <button type="button" class="btn btn-lg btn-primary col-8" data-target="#m_pariente_buscar" data-toggle="modal" id="reset_buscar">
                <i class="fas fa-search"></i> Agregar existente
            </button>
        </center>
    </div>
</div>
<br>
<div class="row m-1 p-1 border rounded border-primary">
    <div class="col-12 mb-2">
        <center class="font-weight-bold">
            Personas agregadas
        </center>
    </div>
    <div class="col-12">
        <div id="campo_familia" class="row">
            @if (!$create)
                @if ($parientes->count() >  0)
                    @foreach ($parientes as $relacion)
                    @php
                        $img = ($relacion->pariente->sexo == 0)?'chica.png':'chico.png';
                    @endphp
                        <div id="tag" class="col-4 rounded border">
                            <div class="flex-row">
                                <center>
                                    <img src="{{asset('/img/'.$img)}}" alt="" class="w-50 rounded-circle mt-2 mb-2">
                                </center>
                            </div>
                            <div class="flex-row mb-0">
                                <center>
                                    <span class="font-weight-bold font-sm">{{$relacion->pariente->nombre}}</span> <span class="font-weight-light font-sm">{{$relacion->pariente->apellido}}</span>
                                </center>
                            </div>
                            <div class="flex-row mt-0">
                                <center>
                                    <span class="badge badge-primary badge-pill">{{$relacion->parentesco}}</span>
                                    @if ($relacion->encargado)
                                        <span class="badge badge-success badge-pill" title="Responsable">R</span>
                                    @else
                                        <span></span>
                                    @endif
                                </center>
                            </div>
                            <hr class="mb-1 mt-1">
                            <div class="flex-row">
                                <center>
                                    <span class="font-sm"><i class="fas fa-id-card"></i>
                                        @if ($relacion->pariente->dui != null || $relacion->pariente->dui != "")
                                            {{$relacion->pariente->dui}}
                                        @else
                                            <span class="badge border border-secondary text-secondary">Sin DUI</span>
                                        @endif
                                    </span>
                                </center>
                            </div>
                            <div class="flex-row">
                                <center>
                                    <span class="font-sm" id="x-f"><i class="fas fa-phone"></i>
                                        @if ($relacion->pariente->telefono_fijo != null || $relacion->pariente->telefono_fijo != "")
                                            {{$relacion->pariente->telefono_fijo}}
                                        @else
                                            <span class="badge border border-secondary text-secondary">Sin Teléfono</span>
                                        @endif
                                    </span>
                                    <span class="badge badge-pill badge-primary">&#183;</span>
                                    <span class="font-sm" id="x-c"><i class="fas fa-mobile-alt"></i>
                                        @if ($relacion->pariente->telefono_celular != null || $relacion->pariente->telefono_celular != "")
                                            {{$relacion->pariente->telefono_celular}}
                                        @else
                                            <span class="badge border border-secondary text-secondary">Sin Teléfono</span>
                                        @endif
                                    </span>
                                </center>
                            </div>
                            <div class="flex-row">
                                <center>
                                    <span class="font-sm"><i class="fas fa-home"></i> {{$relacion->pariente->direccion}}</span>
                                </center>
                            </div>
                            <hr class="mb-1 mt-1">
                            <div class="flex-row">
                                <div class="btn-group col-12 mb-2">
                                    <button type="button" class="btn btn-sm btn-info col-4" id="btn-vpariente" data-toggle="modal" data-target="#show_pariente" data-value="{{$relacion->f_pariente}}">
                                        <i-fas class="fas fa-eye"></i-fas>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary col-4" id="btn-epariente" data-toggle="modal" data-target="#m_pariente"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger col-4" id="btn-dpariente"><i class="fas fa-trash"></i></button>
                                </div>
                                <input type="hidden" name="par_parentesco[]" value="{{$relacion->parentesco}}">
                                <input type="hidden" name="par_responsable[]" value="{{$relacion->encargado}}">
                                <input type="hidden" name="par_id[]" value="{{$relacion->f_pariente}}">
                                <input type="hidden" name="par_tipo[]" value="old">
                                <input type="hidden" name="rel_id[]" value="{{$relacion->id}}">
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
</div>

@include('Estudiantes.Modal.pariente')
@include('Estudiantes.Modal.buscar_pariente')
@include('Estudiantes.Modal.ver_familiar')
<script src= {{asset("js/system/parientes.js")}}></script>
