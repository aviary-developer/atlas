{!!Form::open(['method'=>'POST','id'=>'formulario'])!!}
<div class="btn-group">
    <a href={!! asset('/usuarios/'.$usuario->id)!!} class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Ver">
      <i class="fa fa-info-circle"></i>
    </a>
    <a href={!! asset('/usuarios/'.$usuario->id.'/edit')!!} class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar">
      <i class="fa fa-edit"></i>
    </a>
    <button type="button" class="btn btn-danger btn-sm" onclick={!! "'eliminar(".$usuario->id.");'" !!} data-toggle="tooltip" data-placement="top" title="Eliminar"/>
        <i class="fa fa-trash"></i>
      </button>
</div>
<script>
function eliminar(id){
  (new PNotify({
    title: 'Confirmar eliminación',
    text: '¿Está seguro? no se podrá deshacer',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        buttons: [{
            text: "Guardar"
        }, {
            text: "Cancelar"
        }],
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
  $('#formulario').attr('action','http://'+dominio+'/atlas/public/destroyUsuario/'+id);
  $('#formulario').submit();
  new PNotify({
  title: 'Hecho',
  text: 'Usuario Eliminado',
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
