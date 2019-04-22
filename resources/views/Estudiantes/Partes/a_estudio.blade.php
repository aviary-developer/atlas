<div class="flex-row">
    <center>
        <div class="mb-3 font-weight-bold">
            Estudios
        </div>
    </center>
</div>
<div class="row">
    <div class="form-group col-6">
        <label>Centro escolar procedente:</label>
        {!!Form::text('centroEscolarProcedente',null,['id'=>'centroEscolarProcedente','class'=>'form-control form-control-sm','placeholder'=>'Centro escolar procedente'])!!}
    </div>

    <div class="form-group col-6">
        <label> ¿Estudio parvularia?</label><br>
        <div class="form-group">
            <div class="btn-group">
                @if ($create)
                    <label class="radio radio-info">
                        <input type="radio" name="parvularia" value="1" checked> <span class="check-mark"></span>Si
                    </label> &nbsp
                    <label class="radio radio-danger">
                        <input type="radio" name="parvularia" value="0"> <span class="check-mark"></span>No
                    </label>
                @else
                    @if ($estudiante->parvularia)
                        <label class="radio radio-info">
                            <input type="radio" name="parvularia" value="1" checked> <span class="check-mark"></span>Si
                        </label> &nbsp
                        <label class="radio radio-danger">
                            <input type="radio" name="parvularia" value="0"> <span class="check-mark"></span>No
                        </label>
                    @else
                        <label class="radio radio-info">
                            <input type="radio" name="parvularia" value="1"> <span class="check-mark"></span>Si
                        </label> &nbsp
                        <label class="radio radio-danger">
                            <input type="radio" name="parvularia" value="0" checked> <span class="check-mark"></span>No
                        </label>
                    @endif
                @endif

            </div>
        </div>
    </div>

    <div class="form-group col-6">
        <label>Presentó:</label><br>
        <div class="form-group">
            @if ($create)
                <label class="checkbox checkbox-success col-12">
                    <input type="checkbox" name="certificado" />
                    <span class="check-mark"></span> Certificado
                </label>
                <label class="checkbox checkbox-success col-12">
                    <input type="checkbox" name="libretaNotas"/>
                    <span class="check-mark"></span> Libreta de notas
                </label>
            @else
                @if ($estudiante->certificado)
                    <label class="checkbox checkbox-success col-12">
                        <input type="checkbox" name="certificado" checked />
                        <span class="check-mark"></span> Certificado
                    </label>
                @else
                    <label class="checkbox checkbox-success col-12">
                        <input type="checkbox" name="certificado" />
                        <span class="check-mark"></span> Certificado
                    </label>
                @endif
                @if ($estudiante->libretaNotas)
                    <label class="checkbox checkbox-success col-12">
                        <input type="checkbox" name="libretaNotas" checked/>
                        <span class="check-mark"></span> Libreta de notas
                    </label>
                @else
                    <label class="checkbox checkbox-success col-12">
                        <input type="checkbox" name="libretaNotas"/>
                        <span class="check-mark"></span> Libreta de notas
                    </label>
                @endif
            @endif

        </div>
    </div>
</div>
