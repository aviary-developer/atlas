<div class="modal fade" tabindex="-1" role="dialog" id="m_pariente" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
            Familiar
            <span class="badge badge-primary">Nuevo</span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="flex-row">
            <div class="nav justify-content-center nav-pills border-0" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                <a class="nav-link active" id="one-pariente-tab" data-toggle="pill" href="#one-pariente" role="tab" aria-controls="one-pariente" aria-selected="true">
                    Datos personales
                </a>

                <a class="nav-link" id="two-pariente-tab" data-toggle="pill" href="#two-pariente" role="tab" aria-controls="two-pariente" aria-selected="false">
                    Censo familiar
                </a>
            </div>
        </div>
        <div class="flex-row mt-3">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="one-pariente" role="tabpanel" aria-labelledby="one-pariente-tab">
                    <div class="row">
                        @include('Estudiantes.Modal.Partes.datos_pariente')
                    </div>
                </div>

                <div class="tab-pane fade" id="two-pariente" role="tabpanel" aria-labelledby="two-pariente-tab">
                    <div class="row">
                        @include('Estudiantes.Modal.Partes.censo_pariente')
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="h-pariente" value="create">
        <input type="hidden" id="m-id-pariente">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm" id="save-pariente">Guardar</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
