@extends('welcome')
@section('layout')
    @php
        $create = false;
        $fecha = Carbon\Carbon::now();
    @endphp
    @include('Estudiantes.Barra.create')
    <div class="container-fluid mt-3">
        {!!Form::model($estudiante,['class' =>'tab-content','route' =>['estudiantes.update',$estudiante->id],'method' =>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'formEstudiante'])!!}

            <div class="row">
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="one-tab">
                            @include('Estudiantes.Partes.a_datos_personales')
                        </div>

                        <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                            @include('Estudiantes.Partes.a_estudio')
                        </div>

                        <div class="tab-pane fade" id="three" role="tabpanel" aria-labelledby="three-tab">
                            @include('Estudiantes.Partes.a_familia')
                        </div>

                        <div class="tab-pane fade" id="four" role="tabpanel" aria-labelledby="four-tab">
                            @include('Estudiantes.Partes.a_talla')
                        </div>

                        <div class="tab-pane fade" id="five" role="tabpanel" aria-labelledby="five-tab">
                            @include('Estudiantes.Partes.a_salud')
                        </div>

                        <div class="tab-pane fade" id="six" role="tabpanel" aria-labelledby="six-tab">
                            @include('Estudiantes.Partes.a_socioeconomica')
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    @include('Estudiantes.Partes.panel_d')
                </div>
            </div>

            @include('Estudiantes.Partes.modal_matricula')
        {!! Form::close() !!}
    </div>

<script>
    function partidaNacimiento(c){
        $('#divPartida').toggle();
    }

    $("#divTrabaja input[name='trabaja']").click(function(event) {
        if($(this).val()==1){
            trabajo();
        }else{
            var valor = $("#tipo").val();
            if(!(valor == null || valor == "")){
                (new PNotify({
                    title: 'Eliminar trabajo',
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
                    $("#tipo").val("");
                    $("#lugar").val("");
                    $("#jornadaLaboral").val("");
                    $("#detallesTrabajo").hide();
                    $("#siTrabaja").prop('disabled', false);
                }).on('pnotify.cancel', function() {
                    $('#siTrabaja').prop('checked', true);
                    $('#noTrabaja').prop('checked', false);
                });
            }else{
                $("#tipo").val("");
                $("#lugar").val("");
                $("#jornadaLaboral").val("");
                $("#detallesTrabajo").hide();
                $("#siTrabaja").prop('disabled', false);
            }

        }
    });

    function trabajo(){
        var notice = new PNotify({
            title: '<span class="badge badge-primary">Detalles</span> Trabajo',
            text: "<div id='modalTrabajo'>"+
                "<div class='form-group'>"+
                "<label>Tipo</label>"+
                "<input type='text' value='"+$("#tipo").val()+"' id='tipoModal' name='tipoModal' class='form-control'/>"+
                "</div>"+
                "<div class='form-group'>"+
                "<label>Lugar</label>"+
                "<input type='text' value='"+$("#lugar").val()+"' id='lugarModal' name='lugarModal' class='form-control'/>"+
                "</div>"+
                "<div class='form-group'>"+
                "<label>Jornada laboral</label>"+
                "<input type='text' value='"+$("#jornadaLaboral").val()+"' id='jornadaLaboralModal' name='jornadaLaboralModal' class='form-control'/>"+
                "</div>"+
                "</div>",
            icon: false,
            width: 'auto',
            type:'info',
            hide: false,
            buttons: {
                closer: true,
                sticker: false
            },
            confirm: {
                buttons: [{
                    text: "Hecho"
                }, {
                text: "Cancelar"
                }],
                confirm:true,
            },
            insert_brs: false,
            addclass: 'stack-modal',
            stack: {
                'dir1': 'down',
                'dir2': 'right',
                'modal': true
            }
        });

        notice.get().on('pnotify.confirm', function() {
            var tipo = $(this).find('input[name=tipoModal]').val();
            var lugar = $(this).find('input[name=lugarModal]').val();
            var jornadaLaboral = $(this).find('input[name=jornadaLaboralModal]').val();
            $("#tipo").val(tipo);
            $("#lugar").val(lugar);
            $("#jornadaLaboral").val(jornadaLaboral);
            $("#detallesTrabajo").show();
        }).on('pnotify.cancel', function() {
            var estado = $("#siTrabaja").prop('checked');
            var valor = $("#tipo").val();
            if(estado == true && (valor == "" || valor == null)){
                $('#siTrabaja').prop('checked', false);
                $('#noTrabaja').prop('checked', true);
            }
        });
    }

    function verificarPais(){
        var pais=$("#pais").val().toUpperCase();
        if(pais.length==11){
            if(pais==="EL SALVADOR"){
                if($("#sexoM").is(':checked')){
                    $("#nacionalidad").val("Salvadoreño");
                }if ($("#sexoF").is(':checked')) {
                    $("#nacionalidad").val("Salvadoreña");
                }
                $("#condicionExtranjeria").hide();
            }else {
                $("#condicionExtranjeria").show();
            }
        }
        else{$("#nacionalidad").val("");}
        if(pais.length==0){
            $("#condicionExtranjeria").hide();
        }
    }

    function verExtranjeria(){
        var pais=$("#pais").val().toUpperCase();
        if(pais!="EL SALVADOR"){
            $("#condicionExtranjeria").show();
        }
    }

    function agregarEncargado(){
        var notice = new PNotify({
            title: '<span class="badge badge-primary">Nuevo</span> Encargado',
            text: $('#modalEncargado').html(),
            icon: false,
            width: 'auto',
            type:'info',
            hide: false,
            buttons: {
                closer: true,
                sticker: false
            },
            confirm: {
                buttons: [{
                    text: "Guardar"
                }, {
                    text: "Cancelar"
                }],
                confirm:true,
            },
            insert_brs: false,
            addclass: 'stack-modal',
            stack: {
                'dir1': 'down',
                'dir2': 'right',
                'modal': true
            }
        });
        notice.get().on('pnotify.confirm', function() {
            var nombre = $(this).find('input[name=nombreEncargado]').val();
            var apellido = $(this).find('input[name=apellidoEncargado]').val();
            var dui = $(this).find('input[name=duiEncargado]').val();
            var direccion = $(this).find('textarea[name=direccionEncargado]').val();
            var telefono= $(this).find('input[name=telefonoEncargado]').val();
            var celular = $(this).find('input[name=celularEncargado]').val();
            var correo = $(this).find('input[name=correoEncargado]').val();
            if(nombre==""){
                new PNotify({
                    title: 'Error',
                    text: 'Ingrese nombres',
                    type: 'error'
                });
            }else if(apellido==""){
                new PNotify({
                    title: 'Error',
                    text: 'Ingrese apellidos',
                    type: 'error'
                });
            }else if(dui=="") {
                new PNotify({
                    title: 'Error',
                    text: 'Ingrese DUI',
                    type: 'error'
                });
            }else if (direccion=="") {
                new PNotify({
                    title: 'Error',
                    text: 'Ingrese una dirección',
                    type: 'error'
                });
            }else if (celular=="" && telefono=="") {
                new PNotify({
                    title: 'Error',
                    text: 'Ingresea al menos un número telefonico',
                    type: 'error'
                });
            }

            var tabla=$('#tablaEncargados');
            var html="<tr><td><input type='hidden' name='nombreEncargadoM[]' value = '"+nombre+"'/><input type='hidden' name='apellidoEncargadoM[]' value = '"+apellido+"'/>"+
            "<input type='hidden' name='duiEncargadoM[]' value = '"+dui+"'/><input type='hidden' name='direccionEncargadoM[]' value = '"+direccion+"'/>"+
            "<input type='hidden' name='telefonoEncargadoM[]' value = '"+telefono+"'/><input type='hidden' name='celularEncargadoM[]' value = '"+celular+"'/>"+
            "<input type='hidden' name='correoEncargadoM[]' value = '"+correo+"'/>"+
            "</td><td>"+nombre+" "+apellido+"</td><td>"+dui+"</td><td>"+direccion+"</td><td>"+telefono+"</td><td>"+celular+"</td><td>"+correo+"</td>"+
            "<td><button type = 'button' name='button' class='btn btn-outline-danger btn-sm' onclick='eliminarEncargado(this);' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fa fa-trash'></i></button></td></tr>";
            tabla.append(html);
        }).on('pnotify.cancel', function() {
        });
    }

    function eliminarEncargado(telefono){
        $(telefono).parent('td').parent('tr').remove();
        new PNotify({
            type: 'error',
            text: 'Eliminado'
        })
    }
</script>
@endsection
