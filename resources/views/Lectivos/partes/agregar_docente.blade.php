<fomr id="form_agregar_docente" hidden>
    <div class="form-group">
      <label>Docente asesor</label>
      <div class="input-group">
        <div class="input-group-prepend">
            <span class="fa fa-user form-control" aria-hidden="true"></span>
        </div>
        <select class="form-control" name="docente" id="docente_l">
            @foreach ($docentes as $docente)
                <option value={{$docente->id}}>
                    {{$docente->nombre.' '.$docente->apellido}}
                </option>
            @endforeach
        </select>
      </div>
    </div>
</fomr>
