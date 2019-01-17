<div class="flex-row">
    <center>
        <h5>
            Buscar Familiar
        </h5>
    </center>
</div>
<div class="flex-row">
    <div class="form-group">
        <label>Buscar</label>
        {!!Form::text('buscar_pariente_m',null,['id'=>'buscar_pariente_m','class'=>'form-control form-control-sm','placeholder'=>'Digitar el nombre o apellido a buscar'])!!}
    </div>
</div>
<hr>
<div class="flex-row">
    <center>
        <h5>Resultado de la busqueda</h5>
    </center>
</div>
<div class="flex-row">
    <table class="table table-sm" id="tabla-busqueda_familiar">
        <thead>
            <tr>
                <th>Nombre</th>
                <th style="width:80px">Opción</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
