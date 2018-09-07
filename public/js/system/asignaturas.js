$(document).ready(function () {
    $("#new-asignatura").click(function (e) {
        e.preventDefault();
        (new PNotify({
            title: '<span class="badge badge-light">Nueva</span> Asignatura',
            text: 'Ingrese nombre de la asignatura',
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
                url: '/atlas/public/asignaturas',
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
});

function edit_asignatura(id, nombre) {
    var notice = new PNotify({
        title: '<span class="badge badge-light">Editar</span> Asignatura',
        text: 'Ingrese nombre de la asignatura',
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
            url: '/atlas/public/asignaturas/' + id,
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

function disabled_asignatura(id, tipo = 0) {
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
            url: '/atlas/public/asignatura/' + id,
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

function delete_asignatura(id) {
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
            url: '/atlas/public/asignaturas/' + id,
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
