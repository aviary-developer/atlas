<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Matricula <span class="badge badge-primary">{{$lectivo->anio}}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
            <div class="form-group col-8">
                <label>Grados</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="fa fa-cube form-control" aria-hidden="true"></span>
                    </div>
                    <select name="grado" class="form-control" onchange="detalleGrado(this)">
                        <option value="Negativo">
                            [Seleccione grado]
                        </option>
                        @foreach ($grados as $grado)
                            <option value={{$grado->id}}>
                                {{$grado->grado.' '.$grado->seccion}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Turno</label><br>
            <h5><span class="badge badge-warning" id="badgeTurno"></span></h5>
        </div>
        <div class="form-group">
            <label>Docente asesor</label><br>
            <h5><span class="badge badge-info" id="badgeDocente"></span></h5>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="submitMatricula" onclick="matricular();" class="btn btn-primary">Omitir</button>
    </div>
</div>
