{!!Form::open(['method'=>'POST','id'=>'formulario'])!!}
<a href={!! asset('/estudiantes/'.$estudiante->id)!!} class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Ver">
  <i class="fa fa-info-circle"></i>
</a>
<a href={!! asset('/estudiantes/'.$estudiante->id.'/edit')!!} class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
  <i class="fa fa-edit"></i>
</a>
<button type="button" class="btn btn-danger btn-sm" onclick={!! "'eliminar(".$estudiante->id.");'" !!} data-toggle="tooltip" data-placement="top" title="Eliminar"/>
    <i class="fa fa-trash"></i>
  </button>
<script>
function eliminar(id){
  (new PNotify({
    title: 'Confirmar eliminación',
    text: '¿Está seguro? no se podrá deshacer',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        confirm: true
    },
    buttons: {
        closer: false,
        sticker: false
    },
    history: {
        history: true
    }
})).get().on('pnotify.confirm', function() {
  var dominio = window.location.host;
  $('#formulario').attr('action','http://'+dominio+'/atlas/public/destroyEstudiante/'+id);
  $('#formulario').submit();
  new PNotify({
  title: 'Hecho',
  text: 'Estudiante Eliminado',
  type: 'success'
  });
}).on('pnotify.cancel', function() {
  new PNotify({
  title: 'Ok',
  text: 'El registro se mantiene',
  type: 'info'
  });
});

}
</script>
{!!Form::close()!!}
