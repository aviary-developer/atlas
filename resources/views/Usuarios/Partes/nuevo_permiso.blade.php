<form action="" id="form_nuevo_permiso" hidden>
    <div class="form-group">
        <label>Fecha inicio</label>
        <div class="input-group">
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label>Fecha final</label>
        <div class="input-group">
            <input type="date" name="fecha_final" id="fecha_final" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label>Numero de horas</label>
        <div class="input-group">
            <input type="number" name="horas_nuevo" id="horas_nuevo" class="form-control" step="1" min="0">
        </div>
    </div>
    <div class="form-group">
        <label>Categoria de permiso</label>
        <div class="input-group">
            <select name="categoria" id="categoria" class="form-control">
                <option value="0">Personal</option>
                <option value="1">Salud</option>
            </select>
        </div>
    </div>
</form>
