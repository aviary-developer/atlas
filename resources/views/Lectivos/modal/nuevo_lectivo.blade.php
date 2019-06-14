<div class="modal fade" tabindex="-1" role="dialog" id="m_nuevo_lectivo" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
            Año lectivo
            <span class="badge badge-info">Nuevo</span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label>Año</label>
                @php
                    if($count_anio == 0){
                        $valor = $anio_now;
                    }else{
                        $valor = $anio_now + 1;
                    }
                @endphp
                <input type="text" id="anio_nuevo_input" value="{{$valor}}" class="form-control form-control-sm" disabled>
            </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" id="save_it">Guardar</button>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
