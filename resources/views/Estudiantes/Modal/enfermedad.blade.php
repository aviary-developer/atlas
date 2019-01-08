<div class="modal fade" tabindex="-1" role="dialog" id="m_enfermedad">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
            Enfermedad
            <span class="badge badge-primary">Nueva</span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Nombre de la enfermedad</label>
            {!!Form::text('nombre_enfermedad',null,['id'=>'nombre_enfermedad','class'=>'form-control form-control-sm','placeholder'=>'Nombre de la enfermedad'])!!}
        </div>
        <div class="form-group">
            <label>Atención médica</label>
            {!!Form::text('atencion_medica',null,['id'=>'atencion_medica','class'=>'form-control form-control-sm','placeholder'=>'Atención médica que recibe'])!!}
        </div>
        <div class="form-group">
            <label>Toma medicamentos</label>
            {!!Form::text('medicamentos_enfermedad',null,['id'=>'medicamentos_enfermedad','class'=>'form-control form-control-sm','placeholder'=>'Toma de medicamentos'])!!}
        </div>
        @php
            $fecha = Carbon\Carbon::now();
        @endphp
        <div class="form-group">
            <label>Fecha</label>
            {!!Form::date('fecha_enfermedad',$fecha,['id'=>'fecha_enfermedad','class'=>'form-control form-control-sm'])!!}
        </div>
        <div class="form-group">
            <label>Resultados</label>
            {!!Form::text('resultados_enfermedad',null,['id'=>'resultados_enfermedad','class'=>'form-control form-control-sm','placeholder'=>'Resultados'])!!}
        </div>
        <div class="form-group">
            <label>Vacunas</label>
            <div class='input-group'>
                {!!Form::text('anio_vacuna_enfermedad',null,['class'=>'form-control form-control-sm','placeholder'=>'Año','id'=>'anio_vacuna_enfermedad'])!!}
                {!!Form::text('tipo_vacuna_enfermedad',null,['class'=>'form-control form-control-sm','placeholder'=>'Tipo','id'=>'tipo_vacuna_enfermedad'])!!}
                {!!Form::text('refuerzo_vacuna_enfermedad',null,['class'=>'form-control form-control-sm','placeholder'=>'Refuerzo','id'=>'refuerzo_vacuna_enfermedad'])!!}
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm" id="save_enfermedad">Guardar</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
