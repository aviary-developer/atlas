<div class="modal fade" tabindex="-1" role="dialog" id="m_cierre_anio" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
            Cuadrar notas
            <span class="badge badge-info">{{$anio_activo->anio}}</span>
        </h5>
      </div>
      <div class="modal-body">
            <div class="flex-row">
                <center>
                    <h4><i class="fas fa-exclamation-triangle text-warning"></i> Advertencia</h4>
                </center>
            </div>
            Se está calculando los promedios de notas de los estudiantes, este proceso demora algunos segundos, por favor espere.
      </div>
      <div class="modal-footer">
          <div class="flex-row col-12">
              <center>
                  <button type="button" class="btn btn-success btn-sm col-6" data-dismiss="modal" id="btn-listo" style="display:none">¡Listo!</button>
              </center>
          </div>
      </div>
    </div>
  </div>
</div>
