$(document).on("ready", CargarTipoUsuario());
$(document).on("ready", RegistrarUsuario());
$(document).on("ready", VerificarParaRegistrarUsuario());
$(document).on("ready", DatosParaModificarRegistrarUsuario());
$(document).on("ready", ModificarRegistrarUsuario());
$(document).on("ready", RegistrarAreaTrabajo());
$(document).on("ready", ConsultarUsuario());


$("#cbx-dni-new").click(function () {
    if($("#cbx-dni-new").is(":checked")) {
        $("#dni-usu-new").removeClass("hidden");
        $("#dni-usu-new [name='dniusunew']").prop("required",true);
    } else {
        $("#dni-usu-new").addClass("hidden");
        $("#dni-usu-new [name='dniusunew']").val("");
        $("#dni-usu-new [name='dniusunew']").prop("required",false);
    }
});

function CargarTipoUsuario() {

    $.ajax({
        type: "POST",
        url: "ControlPanel/CargarTipoUsuario",
        success: function (resultado) {
            // alert(resultado);
            var registro = eval(resultado);
            areas = "<option selected disabled hidden value=''>Elija un Tipo</option>";
            var j = 2;
            for (var i = 0; i < registro.length; i++) {
                areas += "<option value=" + j + ">" + registro[i]['TipoUsu'] + "</option>";
                j++;
            }
            $("#registrarusuario #selecttipousu").html(areas);
        }
    });
}

function RegistrarUsuario() {
    $("#form-regusu").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            success: function (resultado) {
                var registros = eval(resultado);
                if (registros[0]['result'] == 0) {
                    htmlbutton = "";
                    htmlbutton += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbutton += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> El Usuario ya está Registrado.</div>';
                } else {
                    htmlbutton = "";
                    htmlbutton += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbutton += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Usuario ha sido Registrado.</div>';
                    LimpiarFormulario();
                }
                $("#form-regusu #mensaje-alert").html(htmlbutton);
                $("#form-regusu .borrar-button").toggleClass("desaparecer");
                setTimeout(function () {
                    $("#form-regusu #alert-error").toggleClass("aparecer");
                }, 1);
                setTimeout(function () {
                    $("#form-regusu #alert-error").removeClass("aparecer");
                }, 3000);
                setTimeout(function () {
                    $("#form-regusu .borrar-button").toggleClass("desaparecer");
                }, 3250);
                setTimeout(function () {
                    $("#form-regusu #alert-error").css("display", "none");
                }, 3250);
            }
        });
    });
}

function VerificarParaRegistrarUsuario() {
    var form = "#form-regusu ";
    $(form + "[name='dniusu']").on("blur change keyup input", function () {
        if (/^[0-9]{8,8}$/.test($(form + "[name='dniusu']").val())) {
            $.ajax({
                type: "POST",
                url: "Admin/VerificarParaRegistrarUsuario",
                data: {
                    dni: $(form + "[name='dniusu']").val()
                },
                success: function (resultado) {
                    var registro = eval(resultado);
                    if (registro[0]['result'] == 1) {
                        mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>El Usuario NO es válido para Registrar</p>";

                    } else {
                        mensaje = "<p class='text-center mensaje-registro-valido' style='color:green; font-weight:bold;'>El Usuario es válido para Registrar</p>";
                    }
                    $(form + "#comprobacion-dni").html(mensaje).hide().fadeIn(750);
                }
            });
        } else {
            mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>&nbsp;</p>";
            $(form + "#comprobacion-dni").html(mensaje);
        }
    });
}

function DatosParaModificarRegistrarUsuario() {
    var form = "#form-regusu-mod ";
    $(form + "[name='dniusu']").on("blur change keyup input",function () {
        if (/^[0-9]{8,8}$/.test($(form + "[name='dniusu']").val())) {
            $.ajax({
                type: "POST",
                url: "Admin/VerificarParaRegistrarUsuario",
                data: {
                    dni: $(form + "[name='dniusu']").val()
                },
                success: function (resultado) {
                    var registro = eval(resultado);
                    if (registro[0]['result'] == 1) {
                        $.ajax({
                            type: "POST",
                            url: "Admin/DatosParaModificarRegistrarUsuario",
                            data: {
                                dni: $(form + "[name='dniusu']").val()
                            },
                            success: function (resultado) {

                                var datosparamodificar = eval(resultado);

                                if (datosparamodificar.length > 0) {

                                    $(form + "[name='nombresusu']").val(datosparamodificar[0]["NomUsu"]);
                                    $(form + "[name='apellidosusu']").val(datosparamodificar[0]["ApeUsu"]);
                                    var value = "option[value=" + datosparamodificar[0]['TipoUsu'] + "]";
                                    $(form + "#selecttipousu " + value).prop('selected', true);

                                    var valuex = "option[value=" + datosparamodificar[0]['AreaUsu'] + "]";
                                    $(form + "#selectareas " + valuex).prop('selected', true);

                                    if (datosparamodificar[0]["EstadoUsu"] == 1) {
                                        $(form + "#switch_left").prop('checked', true);
                                    } else {
                                        $(form + "#switch_right").prop('checked', true);
                                    }
                                    $(form + "[name='observaciones']").val(datosparamodificar[0]["ObseUsu"]);
                                    mensaje = "<p class='text-center mensaje-registro-valido' style='color:green; font-weight:bold;'>El Usuario es válido para Modificar</p>";
                                    $(form + "#comprobacion-dni").html(mensaje).hide().fadeIn(750);
                                }
                            }
                        });
                    } else {

                        $(form + "[name='nombresusu']").val("");
                        $(form + "[name='apellidosusu']").val("");
                        $(form + "#selectareas").prop('selectedIndex', 0);
                        $(form + "#selecttipousu").prop('selectedIndex', 0);
                        $(form + 'input[type=radio]').prop('checked', false);
                        $(form + "[name='observaciones']").val("");

                        mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>El Usuario NO es válido para Modificar</p>";
                        $(form + "#comprobacion-dni").html(mensaje).hide().fadeIn(750);
                    }
                }
            });
        } else {
            $(form + "[name='nombresusu']").val("");
            $(form + "[name='apellidosusu']").val("");
            $(form + "#selectareas").prop('selectedIndex', 0);
            $(form + "#selecttipousu").prop('selectedIndex', 0);
            $(form + 'input[type=radio]').prop('checked', false);
            $(form + "[name='observaciones']").val("");
            mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'> &nbsp; </p>";
            $(form + "#comprobacion-dni").html(mensaje);
        }
    });
}

$("#switch_right").click(function () {
    $("#modal-registrarusu").modal('show');
});

function ModificarRegistrarUsuario(){
    var form = "#form-regusu-mod ";
    $(form).submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success:function(resultado){
                var registro = eval(resultado);                
                if(registro[0]['result'] == 0){
                    htmlbuttonx = "";
                    htmlbuttonx += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbuttonx += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> Uno de los N° de DNI no es válido para modificar.</div>';                  
                }
                else {
                    htmlbuttonx = "";
                    htmlbuttonx += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbuttonx += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Usuario ha sido Modificado.</div>';
                    LimpiarFormulario();
                    $(form + "#dni-usu-new").addClass("hidden");
                    $(form + "#dni-usu-new [name='dniusunew']").val("");
                    $(form + "#dni-usu-new [name='dniusunew']").prop("required",false);
                    mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'> &nbsp; </p>";
                    $(form + "#comprobacion-dni").html(mensaje);                    
                }
                $(form+"#mensaje-alert").html(htmlbuttonx); 
                $(form+".borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $(form+"#alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $(form+"#alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $(form+".borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $(form+"#alert-error").css("display","none"); }, 3250);

            }
        });
    });             
}

function RegistrarAreaTrabajo() {
    var form = "#form-regarea ";
    $(form).submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            success: function (resultado) {
                var registros = eval(resultado);
                if (registros[0]['result'] == 0) {
                    htmlbutton = "";
                    htmlbutton += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbutton += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> El Area ya está Registrada.</div>';
                } else {
                    htmlbutton = "";
                    htmlbutton += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbutton += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Area ha sido Registrada.</div>';
                    LimpiarFormulario();
                }
                $(form + "#mensaje-alert").html(htmlbutton);
                $(form + ".borrar-button").toggleClass("desaparecer");
                setTimeout(function () {
                    $(form + "#alert-error").toggleClass("aparecer");
                }, 1);
                setTimeout(function () {
                    $(form + "#alert-error").removeClass("aparecer");
                }, 3000);
                setTimeout(function () {
                    $(form + ".borrar-button").toggleClass("desaparecer");
                }, 3250);
                setTimeout(function () {
                    $(form + "#alert-error").css("display", "none");
                }, 3250);
            }
        });
    });
}

function ConsultarUsuario() {
    var form ="#form-consultar-usu ";
    $("#consultarusuario .btn-consultar").click(function (event) {        
       FiltrarUsuario(""); 
    });
    $(form + "#consu-usu-letra").on("change keyup blur input",function () {

        letra = $(form + "#consu-usu-letra").val();

        FiltrarUsuario(letra);
    });
    $("#consultarusuario").on("click", "#table-consulta tr", function (event) {
        event.preventDefault();
        usuarioselect = $(this).attr("href");
        MostrarUsuario(usuarioselect);
    });
}

function FiltrarUsuario(letra) {
    $.ajax({
        url: "Admin/ConsultarUsuario",
        type: "POST",
        data: {
            codigo: letra
        },
        success: function (resultado) {

            var registro = eval(resultado);
            if (registro.length == 0) {
                $('#modal-nohayconsulta-usu').modal('show');
                consultanula = $("#consu-usu-letra").val();
                htmlnoencontro = "";
                htmlnoencontro = '" ' + consultanula + ' "';
                $("#modal-nohayconsulta-usu #codigo-nulo").html(htmlnoencontro);
                $("#registrar-usu").click(function () {                    
                    $('[href="#registrarusuario"]').click();
                    $('[href="#tab-regusu"]').click();

                });
            } else {
                htmlfilas = "";
                htmlfilas = '<table class="col-md-8 col-md-offset-2 table-bordered table-striped table-condensed cf"><thead class="cf">';
                htmlfilas += '<tr><th>Código</th><th>Nombres</th><th>Apellidos</th><th>Tipo</th><th>Area</th><th>Estado</th></tr>';
                htmlfilas += '</thead><tbody>';
                for (var i = 0; i < registro.length; i++) {
                    htmlfilas += '<tr id="consultar-tr-a-href" href=' + registro[i]['CodUsu'] + '><td>' + registro[i]['CodUsu'] + '</td>';
                    htmlfilas += '<td>' + registro[i]['ApeUsu'] + '</td>';
                    htmlfilas += '<td>' + registro[i]['NomUsu'] + '</td>';                    
                    htmlfilas += '<td>' + registro[i]['TipoUsu'] + '</td>';
                    htmlfilas += '<td>' + registro[i]['DescAreaUsu'] + '</td>';
                    switch (registro[i]['EstadoUsu']) {
                        case "Activo":
                            htmlfilas += '<td style="color : green;">Activo</td>';
                            break;
                        case "Inactivo":
                            htmlfilas += '<td style="color : red;">Inactivo</td>';
                            break;                        
                    }
                    /* función para convertir TR a href*/
                    $(document).ready(function () {
                        $('#consultar-tr-a-href a').click(function () {
                            window.location = $(this).attr('href');
                        });
                    });
                };
                htmlfilas += '</tr></tbody></table>';
                $("#consultarusuario #table-consulta").html(htmlfilas);
            }
        }
    });
}

function MostrarUsuario(usuarioselect) {
    $.ajax({
        url: "Admin/MostrarUsuario",
        type: "POST",
        data: {
            codigo: usuarioselect
        },
        success: function (resultado) {  

            var registro = eval(resultado); 

            bodydatosreg = '<div class="container-fluid">';
            bodydatosreg += '<h3 class="panel-modal-titulo">Código : <label class="text-negro">' + registro[0]["CodUsu"] + '</label></h3>';
            switch (registro[0]['EstadoUsu']) {
                case "Activo":
                    bodydatosreg += '<h4 class="panel-modal-titulo">Estado : <label style="color : green;">Activo</h4>';
                    break;
                case "Inactivo":
                    bodydatosreg += '<h4 class="panel-modal-titulo">Estado : <label style="color : red;">Inactivo</h4>';
                    break;                
            }
            bodydatosreg += '<div class="panel panel-primary">';
            bodydatosreg += '<div class="panel-modal-body">';
            bodydatosreg += '<h3 class="panel-modal-contenido text-primary"><strong class="text-uppercase"> Datos de Usuario </strong></h3>';
            bodydatosreg += ContenidoModalConsultar("Tipo de Usuario : ", registro[0]["TipoUsu"]);    
            bodydatosreg += ContenidoModalConsultar("Apellidos : ", registro[0]["ApeUsu"]);
            bodydatosreg += ContenidoModalConsultar("Nombres : ", registro[0]["NomUsu"]);
            bodydatosreg += ContenidoModalConsultar("N° de DNI : ", registro[0]["DniUsu"]);
            bodydatosreg += ContenidoModalConsultar("Area de trabajo : ", registro[0]["DescAreaUsu"]);
            bodydatosreg += ContenidoModalConsultar("Fecha de registro : ", registro[0]["FecRegUsu"]);
            bodydatosreg += ContenidoModalConsultar("Oservaciones : ", registro[0]["ObseUsu"]);
            bodydatosreg += '<input type="hidden" id="codigo-redireccion" value=' + registro[0]["CodUsu"] + '>';
            bodydatosreg += '</div></div></div>';
            $("#modal-consultar-usu #info-expe").html(bodydatosreg);

            htmlfootermodal = '<button type="button" class="btn btn-lg btn-primary btn-modal col-md-4 col-md-offset-4 lead"';
            htmlfootermodal += 'data-dismiss="modal" id="ir-a-modificar"><strong>Modificar</strong></button>';
            /* if (registro[0]['DescEstado'] === "Disponible") {
                        htmlfootermodal += '<button type="button" class="btn btn-lg btn-primary btn-modal col-md-4 lead"';
                        htmlfootermodal += 'data-dismiss="modal" id="enviar-expe"><strong>Enviar</strong></button>';
                    } else {
                        htmlfootermodal += '<button type="button" class="btn btn-lg btn-primary btn-modal col-md-4 lead"';
                        htmlfootermodal += 'data-dismiss="modal" id="recepcionar-expe"><strong>Recepcionar</strong></button>';
                    }*/
            $("#modal-consultar-usu #footer-expe").html(htmlfootermodal);
            $('#modal-consultar-usu').modal('show');
            /*en la variable " codigo " captura el código en la ventana modal para colocarlo en formulario enviar/registrar/recibir*/
            dni = registro[0]["DniUsu"];

            $("#ir-a-modificar").click(function () {
                tab = '"#registrarusuario"';
                form = '#form-regusu-mod';
                RedirigirARegistrar(dni, tab, form);
            });
        }
    });
}

function RedirigirARegistrar(dni, tab, form) {
    $('[href=' + tab + ']').click();
    $('[href="#tab-modregusu"]').click();
    $(form + " [name='dniusu']").prop("autofocus", true);
    $(form + " [name='dniusu']").val(dni); 
    setTimeout(function () { $(form + " [name='dniusu']").focus(); }, 250);
    setTimeout(function () { $(form + " #selecttipousu").focus(); }, 500);
    
    
}