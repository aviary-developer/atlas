<div class="modal fade" tabindex="-1" role="dialog" id="m_estudiante_buscar" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
            Estudiante
            <span class="badge badge-info">Buscar</span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
            <div class="flex-row">
                <div class="form-group">
                    <label>Buscar</label>
                    {!!Form::text('buscar_estudiante_m',null,['id'=>'buscar_estudiante_m','class'=>'form-control form-control-sm','placeholder'=>'Digitar el nombre o apellido a buscar'])!!}
                </div>
            </div>
            <hr>
            <div class="flex-row">
                <center>
                    <h5>Resultado de la busqueda</h5>
                </center>
            </div>
            <div class="flex-row">
                <table class="table table-sm" id="tabla-busqueda_estudiante">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th style="width:80px">Opción</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
