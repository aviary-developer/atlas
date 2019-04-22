<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header p-1" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Datos Personales
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        @include('Estudiantes.Partes.sa_datos_personales')
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header p-1" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Estudios
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        @include('Estudiantes.Partes.sa_estudio')
      </div>
    </div>
  </div>
</div>
