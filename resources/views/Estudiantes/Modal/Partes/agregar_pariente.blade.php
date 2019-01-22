<div class="flex-row">
    <center>
        <h5>
            Familiar Seleccionado
        </h5>
    </center>
</div>
<div class="flex-row">
    <span class="text-monospace font-weight-light font-sm">
        Nombre completo
    </span>
    <h6 class="font-weight-bold" id="dp_nombre_completo">

    </h6>
</div>
<div class="row">
    <div class="col-6">
        <span class="text-monospace font-weight-light font-sm">
            Sexo
        </span>
        <h6 class="font-weight-bold" id="dp_sexo">

        </h6>
    </div>
    <div class="col-6">
        <span class="text-monospace font-weight-light font-sm">
            DUI
        </span>
        <h6 class="font-weight-bold" id="dp_dui">

        </h6>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <span class="text-monospace font-weight-light font-sm">
            Teléfono fijo
        </span>
        <h6 class="font-weight-bold" id="dp_fijo">

        </h6>
    </div>
    <div class="col-6">
        <span class="text-monospace font-weight-light font-sm">
            Teléfono celular
        </span>
        <h6 class="font-weight-bold" id="dp_celular">

        </h6>
    </div>
</div>
<div class="form-group">
    <label>Parentesco *</label>
    {!!Form::text('parentesco_m2',null,['id'=>'parentesco_m2','class'=>'form-control form-control-sm','placeholder'=>'Parentesco de la persona'])!!}
</div>
<div class="form-group">
    <label>Responsable del estudiante *</label><br>
    <div class="form-group">
        <div id="radioBtn" class="btn-group">
            <label class="radio radio-danger">
                <input id="responsable_s_pariente2" type="radio" name="responsable_pariente2" value="1"> <span class="check-mark"></span>Si
            </label>
            &nbsp
            <label class="radio radio-info">
                <input id="responsable_n_pariente2" type="radio" name="responsable_pariente2" value="0" checked> <span class="check-mark"></span>No
            </label>
        </div>
    </div>
</div>
<div>
    <input type="hidden" id="sp-nombre">
    <input type="hidden" id="sp-apellido">
    <input type="hidden" id="sp-sexo">
    <input type="hidden" id="sp-dui">
    <input type="hidden" id="sp-fijo">
    <input type="hidden" id="sp-celular">
    <input type="hidden" id="sp-id">
    <input type="hidden" id="sp-direccion">
    <input type="hidden" id="sp-correo">
    <input type="hidden" id="sp-sexo">
</div>
