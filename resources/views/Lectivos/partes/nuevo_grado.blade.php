<form id="form_nuevo_grado" hidden>
    <div class="row">
        <div class="form-group col-8">
            <label>Grado</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="fa fa-cube form-control" aria-hidden="true"></span>
                </div>
                <select name="grado" id="grado_numero" class="form-control" onchange="buscar_seccion(this)">
                    <option value="0">Parvularia 4</option>
                    <option value="1">Parvularia 5</option>
                    <option value="2">Parvularia 6</option>
                    <option value="3">Primero</option>
                    <option value="4">Segundo</option>
                    <option value="5">Tercero</option>
                    <option value="6">Cuarto</option>
                    <option value="7">Quinto</option>
                    <option value="8">Sexto</option>
                    <option value="9">Septimo</option>
                    <option value="10">Octavo</option>
                    <option value="11">Noveno</option>
                </select>
            </div>
        </div>
        <div class="form-group col-4">
            <label>Sección</label>
            <div class="input-group">
                <h1 class="badge badge-dark font-lg">A</h1>
            </div>
        </div>
    </div>
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
</form>
