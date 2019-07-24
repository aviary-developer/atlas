@extends('welcome')
@section('layout')
<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Bancos
        @if ($estado)
            <span class=" badge badge-success">
                Activos
            </span>
        @else
            <span class="badge badge-danger">
                Papelera
            </span>
        @endif
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" id="new-banco">
                    Nuevo
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ver
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if ($estado)
                        <a class="dropdown-item" href={{asset('bancos?estado=0')}}>
                            Papelera
                        </a>
                    @else
                        <a class="dropdown-item" href={{asset('bancos')}}>
                            Activas
                        </a>
                    @endif
                </div>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Ayuda
                </a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid mt-3">
    <div class="col-7">
        <div class="table-responsive">
            <table class="table table-sm a-table">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th class="w-25">Opciones</th>
                </thead>
                <tbody>
                    @php
                        $correlativo = 1;
                    @endphp
                  @foreach ($bancos as $banco)
                        <tr>
                            <td>{{$correlativo}}</td>
                            <td>{{$banco->nombre}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm" onclick={{"edit_banco('".$banco->id."','".$banco->nombre."');"}} data-tooltip="tooltip" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    @if(!$estado)
                                        <button type="button" class="btn btn-sm btn-success" data-tooltip="tooltip" title="Activar" onclick={{'disabled_banco('.$banco->id.',1)'}}>
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" id="dar_baja" data-tooltip="tooltip" title="Eliminar" onclick={{'delete_banco('.$banco->id.')'}}>
                                            <i class="fas fa-times"></i>
                                        </button>
                                    @else
                                      <button type="button" class="btn btn-sm btn-danger" id="dar_baja" data-tooltip="tooltip" title="Enviar a papelera" onclick={{'disabled_banco('.$banco->id.',0)'}}>
                                          <i class="fas fa-trash"></i>
                                      </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @php
                            $correlativo++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$("#new-banco").click(function (e) {
    e.preventDefault();
    (new PNotify({
        title: '<span class="badge badge-light">Nuevo</span> Banco',
        text: 'Ingrese nombre del banco',
        icon: false,
        type: 'info',
        hide: false,
        confirm: {
            buttons: [{
                text: "Guardar"
            }, {
                text: "Cancelar"
            }],
            prompt: true
        },
        buttons: {
            closer: false,
            sticker: false
        },
        history: {
            history: false
        },
        addclass: 'stack-modal',
        stack: {
            'dir1': 'down',
            'dir2': 'right',
            'modal': true
        }
    })).get().on('pnotify.confirm', function (e, notice, val) {
        $.ajax({
            type: 'post',
            url: '/atlas/public/bancos',
            data: {
                nombre: val,
            },
            success: function (r) {
                console.log(r);
                if (r == 1) {
                    sessionStorage.setItem('msg', 'msg');
                    location.reload();
                } else {
                    new PNotify({
                        type: 'error',
                        title: '¡Error!',
                        text: 'Algo salio mal'
                    });
                }
            }
        });
    }).on('pnotify.cancel', function () {

    });
});

function edit_banco(id, nombre) {
  alert("GOALS");
    var notice = new PNotify({
        title: '<span class="badge badge-light">Editar</span> Banco',
        text: 'Ingrese nombre del banco',
        icon: false,
        type: 'info',
        hide: false,
        confirm: {
            buttons: [{
                text: "Guardar"
            }, {
                text: "Cancelar"
            }],
            prompt: true
        },
        buttons: {
            closer: false,
            sticker: false
        },
        history: {
            history: false
        },
        addclass: 'stack-modal',
        stack: {
            'dir1': 'down',
            'dir2': 'right',
            'modal': true
        }
    });
    notice.get().find('input').val(nombre);
    notice.get().on('pnotify.confirm', function (e, notice, val) {
        $.ajax({
            type: 'PUT',
            url: '/atlas/public/bancos/' + id,
            data: {
                nombre: val,
            },
            success: function (r) {
                if (r == 1) {
                    sessionStorage.setItem('msg', 'msg');
                    location.reload(true);
                } else {
                    new PNotify({
                        type: 'error',
                        title: '¡Error!',
                        text: 'Algo salio mal'
                    });
                }
            }
        });
    });
}
function disabled_banco(id, tipo = 0) {
    if (tipo == 0) {
        var titulo = 'Enviar a papelera';
    } else {
        var titulo = 'Activar registro';
    }
    (new PNotify({
        title: titulo,
        text: '¿Está seguro?',
        icon: 'fas fa-question-circle',
        hide: false,
        confirm: {
            buttons: [{
                text: "Aceptar"
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
    })).get().on('pnotify.confirm', function () {
        $.ajax({
            type: 'post',
            url: '/atlas/public/bancos/' + id,
            success: function(r){
                if (r == 1) {
                    sessionStorage.setItem('msg', 'msg');
                    location.reload(true);
                } else {
                    new PNotify({
                        type: 'error',
                        title: '¡Error!',
                        text: 'Algo salio mal'
                    });
                }
            }
        });
    }).on('pnotify.cancel', function () {
        new PNotify({
            title: 'Ok',
            text: 'El registro se mantiene',
            type: 'info'
        });
    });
}

function delete_banco(id) {
    (new PNotify({
        title: 'Elimiar Registro',
        text: '¿Está seguro?',
        icon: 'fas fa-question-circle',
        hide: false,
        confirm: {
            buttons: [{
                text: "Aceptar"
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
    })).get().on('pnotify.confirm', function () {
        $.ajax({
            type: 'delete',
            url: '/atlas/public/bancos/' + id,
            success: function (r) {
                if (r == 1) {
                    sessionStorage.setItem('msg', 'msg');
                    location.reload(true);
                } else {
                    new PNotify({
                        type: 'error',
                        title: '¡Error!',
                        text: 'Algo salio mal'
                    });
                }
            }
        });
    }).on('pnotify.cancel', function () {
        new PNotify({
            title: 'Ok',
            text: 'El registro se mantiene',
            type: 'info'
        });
    });
}
</script>
@endsection
