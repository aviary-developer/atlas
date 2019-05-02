<canvas id = "chart_asistencia" style="width: 100%; height: 350px;"></canvas>

  <script>
    $(document).ready(function(){
      function chart_home(){
        $.ajax({
          type: 'get',
          url: '/atlas/public/estudiante/asistencia',
          data:{
              anio: $("#anio option:selected").text(),
              id: $("#id_m").val()
          },
          success: function(r){
              console.log(r);
            var datos = [];
            var tags = [];
            var colors = [];

            $(r.label).each(function(k, v){
              datos.push(r.asistencia[k]);
              tags.push(v);
              colors.push(r.color[k]);
            });

            var canva = $("#chart_asistencia");

            var chart = new Chart(canva,{
              type: 'doughnut',
              data: {
              labels: tags,
              datasets: [
                {
                  data: datos,
                  backgroundColor: colors,
                }]
              },
              options: {
                legend: {
                  display: true,
                  position: 'bottom',
                  labels: {
                    fontSize: 10
                  }
                }
              }
            });
          }
        });
      }

      chart_home();
    });
  </script>
