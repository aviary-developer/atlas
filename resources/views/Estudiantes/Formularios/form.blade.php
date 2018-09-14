<div id="personal" class="tab-pane show active">
      <div class="mb-3">
        <a href="#personal-collapse" data-toggle="collapse">
          <span class="font-lg">1.</span> Información personal
          <small class="d-block text-secondary">
            Datos personales del nuevo estudiante
          </small>
        </a>
      </div>
      <div id="personal-collapse" class="collapse show" data-parent="#formUsuario">
        <div class="text-secondary mb-3">
          <small>Paso 1 de 3</small>
        </div>
        @include('Estudiantes.Formularios.Pasos.paso1')
        <div class="d-none d-md-block">
          <hr>
        </div>
      </div>
    </div>
    <div id="cuenta" class="tab-pane">
      <div class="mb-3">
        <a href="#cuenta-collapse" data-toggle="collapse">
          <span class="font-lg">2.</span> Área de salud
          <small class="d-block text-secondary">
            Peso y talla de estudiante
          </small>
        </a>
      </div>
      <div id="cuenta-collapse" class="collapse" data-parent="#formUsuario">
        <div class="text-secondary mb-3">
          <small>Paso 2 de 3</small>
        </div>
        @include('Estudiantes.Formularios.Pasos.paso2')
        <div class="d-none d-md-block">
          <hr>
        </div>
      </div>
    </div>
    <div id="resumen" class="tab-pane">
      <div class="mb-3">
        <a href="#resumen-collapse" data-toggle="collapse" onclick="vistaPrevia();">
          <span class="font-lg">3.</span> Datos Socieconómicos
          <small class="d-block text-secondary">
            Datos Socieconómicos del estudiante
          </small>
        </a>
      </div>
      <div id="resumen-collapse" class="collapse" data-parent="#formUsuario">
        <div class="text-secondary mb-3">
          <small>Paso 3 de 3</small>
        </div>
        @include('Estudiantes.Formularios.Pasos.paso3')
      </div>
    </div>
</div>
</div>
