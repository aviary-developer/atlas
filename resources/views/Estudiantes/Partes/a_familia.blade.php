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
    </div>
</div>

</div>

@include('Estudiantes.Modal.pariente')
@include('Estudiantes.Modal.buscar_pariente')
@include('Estudiantes.Modal.ver_familiar')
<script src= {{asset("js/system/parientes.js")}}></script>
