<div class="flex-row">
    <center>
        <div class="mb-3 font-weight-bold">Áreas</div>
    </center>
</div>

<div class="nav flex-column nav-pills border-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="one-tab" data-toggle="pill" href="#one" role="tab" aria-controls="one" aria-selected="true">
      Datos personales
  </a>

  <a class="nav-link" id="two-tab" data-toggle="pill" href="#two" role="tab" aria-controls="two" aria-selected="false">
      Estudios
  </a>

  <a class="nav-link" id="three-tab" data-toggle="pill" href="#three" role="tab" aria-controls="three" aria-selected="false">
      Familia
  </a>

  <a class="nav-link" id="four-tab" data-toggle="pill" href="#four" role="tab" aria-controls="four" aria-selected="false">
      Peso y talla
  </a>

  <a class="nav-link" id="five-tab" data-toggle="pill" href="#five" role="tab" aria-controls="five" aria-selected="false">
      Salud
  </a>

  <a class="nav-link" id="six-tab" data-toggle="pill" href="#six" role="tab" aria-controls="six" aria-selected="false">
      Socioeconónica
  </a>
</div>

<hr>
<div class="flex-row mt-4">
    <div class="d-block d-md-flex">
        <button type="submit" class="btn btn-success btn-block btn-sm col-12 mb-3">
            Guardar
        </button>
    </div>
    @if ($create)
        {!!Form::button('Guardar y matricular',['data-toggle'=>'modal','data-target'=>'#exampleModal','class'=>'btn btn-success btn-block btn-sm col-12'])!!}
    @endif
</div>

<script>
    function detalleGrado(grado){
        if(grado.value!='Negativo'){
            $.ajax({
                type: 'get',
                url: '/atlas/public/grado/turno',
                data: {
                    id:grado.value,
                },
                success: function (r) {
                    $('#badgeTurno').text(r.turno);
                    $('#badgeDocente').text(r.docente);
                    $('#submitMatricula').text('Matricular');
                }
            });
        }else {
            $('#badgeTurno').text('');
            $('#badgeDocente').text('');
            $('#submitMatricula').text('Omitir');
        }
    }

    function matricular(){
    }
</script>
