<div class="modal fade" tabindex="-1" role="dialog" id="m_pariente_buscar" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
            Familiar
            <span class="badge badge-info">Buscar</span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12" id="lm_pariente_buscar">
                @include('Estudiantes.Modal.Partes.buscar_pariente')
            </div>
            <div class="col-12" id="rm_pariente_buscar" style="display:none">
                @include('Estudiantes.Modal.Partes.agregar_pariente')
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <div id="dm_pariente_buscar" style="display:none">
            <button type="button" class="btn btn-secondary btn-sm" id="back_pariente_buscar"><i class="fas fa-arrow-left"></i></button>
            <button type="button" class="btn btn-primary btn-sm" id="pariente_existe">Guardar</button>
        </div>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
