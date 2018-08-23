<fomr id="form_editar_grado" hidden>
    <div class="form-group">
      <label>Turno</label><br>
      <div class="form-group">
        <div id="radioBtn" class="btn-group">
            <label class="radio radio-warning">
                <input type="radio" name="turno" id="radioTurno" value="0" checked> <span class="check-mark"></span>Matutino
            </label> &nbsp
            <label class="radio radio-info">
                <input type="radio" name="turno" id="radioTurno" value="1"> <span class="check-mark"></span>Vespertino
            </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label>Docente asesor</label>
      <div class="input-group">
        <div class="input-group-prepend">
            <span class="fa fa-user form-control" aria-hidden="true"></span>
        </div>
        <select class="form-control" name="docente" id="docente">
            @foreach ($docentes as $docente)
                <option value={{$docente->id}}>
                    {{$docente->nombre.' '.$docente->apellido}}
                </option>
            @endforeach
        </select>
      </div>
    </div>
</fomr>
