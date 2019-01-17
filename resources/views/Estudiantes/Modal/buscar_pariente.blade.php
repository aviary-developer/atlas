<div class="modal fade" tabindex="-1" role="dialog" id="m_pariente_buscar" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
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
            <div class="col-6">
                @include('Estudiantes.Modal.Partes.buscar_pariente')
            </div>
            <div class="col-6">
                @include('Estudiantes.Modal.Partes.agregar_pariente')
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm" id="pariente_existe">Guardar</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
