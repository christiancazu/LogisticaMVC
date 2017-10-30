$(document).on("ready", Consultar());
$(document).on("ready", ComprobarExpediente());
$(document).on("ready", ObtenerDatosParaModificar());
$(document).on("ready", ObtenerDatosParaModificarEnvio());
$(document).on("ready", ComprobarExpedienteEnvio());
$(document).on("ready", ComprobarExpedienteRecibir());
$(document).on("ready", ObtenerDatosParaModificarRecepcion());

/**
 * Función para Comprobar si el código de expediente es válido para registrar
 */
function ComprobarExpediente () {
    $("#form-regexp .form-inline").keyup(function () {

        if (/^[0-9]{2,2}$/.test($("#form-regexp [name='cod1']").val()) &&
            /^[0-9]{2,2}$/.test($("#form-regexp [name='cod2']").val()) &&
            /^[a-zA-Z]{1,1}$/.test($("#form-regexp [name='cod3']").val()) &&
            /^[0-9]{4,4}$/.test($("#form-regexp [name='cod4']").val()) &&
            /^[0-9]{1,1}$/.test($("#form-regexp [name='cod5']").val())) {

            var codexp = "";
            codexp +=  $("#form-regexp [name='cod1']").val();
            codexp +=  $("#form-regexp [name='cod2']").val();
            codexp +=  $("#form-regexp [name='cod3']").val();
            codexp +=  $("#form-regexp [name='cod4']").val();
            codexp +=  $("#form-regexp [name='cod5']").val();
            $.ajax({
                type: "POST",
                url: "Expediente/ConsultarParaRegistrar",
                data: { buscar: codexp },
                success: function (resultado) {  
                    var registros = eval(resultado);                   
                    if (registros[0]['result']==1)  {
                       // alert("n");
                        mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>El expediente ya está registrado o es inválido</p>";
                    }
                    else {
                         //alert("si");
                        mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:green; font-weight:bold;'>El expediente es válido para registro</p>";
                    }
                    $("#form-regexp #comprobacion-expe").html(mensajeexiste).hide().fadeIn(750); 
                }
            });
        }
        else {
            mensajeexiste = "";
            mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>&nbsp;</p>";
            $("#form-regexp #comprobacion-expe").html(mensajeexiste);
        }

    });
}
/**
 * Función para Comprobar si el código de expediente es válido para modificar
 * y llenar los campos de descripción y modificación
 */
function ObtenerDatosParaModificar () {

    $("#form-modiexp .form-codigo").keyup(function () {

        if (/^[0-9]{2,2}$/.test($("#form-modiexp [name='cod1']").val()) &&
            /^[0-9]{2,2}$/.test($("#form-modiexp [name='cod2']").val()) &&
            /^[a-zA-Z]{1,1}$/.test($("#form-modiexp [name='cod3']").val()) &&
            /^[0-9]{4,4}$/.test($("#form-modiexp [name='cod4']").val()) &&
            /^[0-9]{1,1}$/.test($("#form-modiexp [name='cod5']").val())) {

            var codexp = "";
            codexp +=  $("#form-modiexp [name='cod1']").val();
            codexp +=  $("#form-modiexp [name='cod2']").val();
            codexp +=  $("#form-modiexp [name='cod3']").val();
            codexp +=  $("#form-modiexp [name='cod4']").val();
            codexp +=  $("#form-modiexp [name='cod5']").val();

            /*var codigoconsulta = "";
            codigoconsulta += codexp1+codexp2+codexp3+codexp4+codexp5;*/            
            $.ajax({
                type: "POST",
                url: "Expediente/ConsultarParaRegistrar",
                data: { buscar: codexp },
                success: function (resultado) {
                    var registros = eval(resultado);
                    //alert(resultado.length+" "+registros[0]["descripcion"]);
                    if(registros[0]['result']==1) {
                        // alert("estoy");             
                        $.ajax({
                            type: "POST",
                            url: "Expediente/ObtenerDatosParaModificar",
                            data: { buscar: codexp },
                            success: function (resultado) {

                                var datosparamodificar = eval(resultado);
                                if (datosparamodificar.length>0) {
                                    $("#text-area-desc").val(datosparamodificar[0]["descripcion"]);
                                    $("#text-area-obse").val(datosparamodificar[0]["observaciones"]);
                                    mensajeexiste = "";
                                    mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:green; font-weight:bold;'>El expediente es válido para modificar</p>";
                                    $("#form-modiexp #comprobacion-expe-modi").html(mensajeexiste).hide().fadeIn(750);  
                                }
                                else {
                                    $("#text-area-desc").val("");
                                    $("#text-area-obse").val("");
                                    mensajeexiste = "";
                                    mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>El expediente no existe, inválido para modificar</p>";
                                    $("#form-modiexp #comprobacion-expe-modi").html(mensajeexiste).hide().fadeIn(750);
                                }
                            }
                        });                
                    }
                    else {
                        $("#text-area-desc").val("");
                        $("#text-area-obse").val("");
                        mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>El expediente no existe, inválido para modificar</p>";
                        $("#form-modiexp #comprobacion-expe-modi").html(mensajeexiste).hide().fadeIn(750);
                    }
                    /*mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-válido' style='color:red; font-weight:bold;'>El expediente ya esta registrado o es inválido</p>";*/
                    /*$("#comprobacion-expe").html(mensajeexiste);*/
                }
            });
        }
        else {

            mensajeexiste = "";
            mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'> &nbsp; </p>";
            $("#form-modiexp #comprobacion-expe-modi").html(mensajeexiste);
        }

    });
}
/**
 * Función invocada por la vista Consultar
 */
function Consultar() {
    //alert("sad");
    $("#consuexp-input3").keyup(function () {

        letra3 = $("#consuexp-input3").val();

        Filtrar(letra3);
    });
    $("body").on("click", "#table-consulta tr", function (event) {
        event.preventDefault();
        expedienteselect = $(this).attr("href");
        MostrarExpediente(expedienteselect);
    });
}
/**
 * Función invocada desde la función Consultar, para hacer filtrado de expedientes a buscar
 * @param {[[Type]]} letra : recibe por .keyup lo ingresado en el input con id #consuexp-input3 de la vista Consultar
 */
function Filtrar(letra) {
    $.ajax({
        url: "Expediente/ConsultarExpediente",
        type: "POST",
        data: { buscar: letra },
        success: function (resultado) {
            //alert(resultado);
            var registros = eval(resultado);
            if(registros.length===0) {
                $('#modal-nohayconsulta').modal('show');
                consultanula = $("#consuexp-input3").val();
                htmlnoencontro = "";
                htmlnoencontro = '" ' + consultanula + ' "';
                $("#codigo-nulo").html(htmlnoencontro);
                $("#registrar-expe").click(function(){
                    $('[href="#registrar"]').click();
                });
            }
            else {
                htmlfilas = "";
                htmlfilas = '<table class="col-md-8 col-md-offset-2 table-bordered table-striped table-condensed cf"><thead class="cf">';
                htmlfilas += '<tr><th>#</th><th>Código</th><th>Descripción</th><th>Estado</th></tr>';
                htmlfilas += '</thead><tbody>';
                for (var i = 0; i < registros.length; i++) {
                    htmlfilas += '<tr id="tr-a-href" href=' + registros[i]['codigo'] + '><td>' + (i + 1) + '</td><td>' + registros[i]['codigo'] + '</td>';
                    htmlfilas += '<td>' + registros[i]['descripcion'] + '</td>';
                    switch (registros[i]['estado']) {
                        case "Disponible":
                            htmlfilas += '<td style="color : green;">Disponible</td>';
                            break;
                        case "No Disponible":
                            htmlfilas += '<td style="color : red;">No Disponible</td>';
                            break;
                        default:
                            htmlfilas += '<td style="color : blue;">Ocupado</td>';
                    }
                    /* función para convertir TR a href*/
                    $(document).ready(function(){
                        $('#tr-a-href a').click(function(){
                            window.location = $(this).attr('href');

                        });
                    });

                };
                htmlfilas += '</tr></tbody></table>';
                $("#table-consulta").html(htmlfilas);
            }
        }
    });
}
/**
 * Función para mostrar le información del expediente seleccionado
 * @param {[[Type]]} expedienteselect [[Description]]
 */
function MostrarExpediente(expedienteselect) {
    $.ajax({
        url: "Expediente/MostrarExpediente",
        type: "POST",
        data: { codigo: expedienteselect },
        success: function (resultado) {
            //alert(resultado); 
            var registros = eval(resultado);   
            htmlbodymodal = "";
            //html += '<h3 class="text-azul">'+registros[0]["codigo"]+'</h3>';
            htmlbodymodal += '<div class="container-fluid">';
            //html += '<div class="panel panel-default">';                 
            htmlbodymodal += '<div class="panel-body">';
            htmlbodymodal += '<fieldset class="col-md-12">';   	
            htmlbodymodal += '<legend>Datos del Expediente</legend>';
            htmlbodymodal += '<div class="panel panel-default">';
            htmlbodymodal += '<div class="panel-body">';

            switch (registros[0]['descestado']) {
                case "Disponible":
                    htmlbodymodal += 'Estado : <h3 style="color : green;">Disponible</h3>';
                    break;
                case "No Disponible":
                    htmlbodymodal += 'Estado : <h3 style="color : red;">No Disponible</h3>';
                    break;
                default:
                    htmlbodymodal += 'Estado : <h3 style="color : blue;">Ocupado</h3>';
            }

            htmlbodymodal += '<p>Código : ' + registros[0]["codexpe"] + '</p>';
            htmlbodymodal += '<p>Registrado por : ' + registros[0]["usureg"] + '</p>';
            htmlbodymodal += '<p>Fecha de registro : ' + registros[0]["fecreg"] + '</p>';
            htmlbodymodal += '<p>Descripción de registro : ' + registros[0]["descexpe"] + '</p>';
            htmlbodymodal += '<p>Oservaciones de registro : ' + registros[0]["obseexpe"] + '</p>';      
            htmlbodymodal += '</div></div></fieldset><div class="clearfix"></div></div></div>';


            $("#info-expe").html(htmlbodymodal);
            htmlfootermodal ="";
            if (registros[0]['descestado']==="Disponible") {
                htmlfootermodal+='<button type="button" class="btn btn-lg btn-primary btn-modal col-md-6 col-md-offset-3 lead"';
                htmlfootermodal+= 'data-dismiss="modal" id="enviar-expe"><strong>Enviar</strong></button>';
            }
            else {
                htmlfootermodal+='<button type="button" class="btn btn-lg btn-primary btn-modal col-md-6 col-md-offset-3 lead"';
                htmlfootermodal+= 'data-dismiss="modal" id="recepcionar-expe"><strong>Recepcionar</strong></button>';
            }
            $("#footer-expe").html(htmlfootermodal);
            $('#modal-expe').modal('show');

            $("#enviar-expe").click(function(){
                $('[href="#enviar"]').click();

            });
            $("#recepcionar-expe").click(function(){
                $('[href="#recibir"]').click();

            });

        }          
    });
}

function ComprobarExpedienteEnvio () {
    $("#form-envio .form-inline").keyup(function () {

        if (/^[0-9]{2,2}$/.test($("#form-envio [name='cod1']").val()) &&
            /^[0-9]{2,2}$/.test($("#form-envio [name='cod2']").val()) &&
            /^[a-zA-Z]{1,1}$/.test($("#form-envio [name='cod3']").val()) &&
            /^[0-9]{4,4}$/.test($("#form-envio [name='cod4']").val()) &&
            /^[0-9]{1,1}$/.test($("#form-envio [name='cod5']").val())) {

            var codexp = "";
            codexp +=  $("#form-envio [name='cod1']").val();
            codexp +=  $("#form-envio [name='cod2']").val();
            codexp +=  $("#form-envio [name='cod3']").val();
            codexp +=  $("#form-envio [name='cod4']").val();
            codexp +=  $("#form-envio [name='cod5']").val();

            $.ajax({
                type: "POST",
                url: "Expediente/ConsultarParaEnviar",
                data: { buscar: codexp },
                success: function (resultado) {  
                    var registros = eval(resultado); 

                    if (registros[0]['result']==0)  {

                        mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>El expediente no es válido para enviar</p>";
                    }
                    else {

                        mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:green; font-weight:bold;'>El expediente es válido para enviar</p>";
                    }
                    $("#comprobacion-expe-enviar").html(mensajeexiste).hide().fadeIn(750); 
                }
            });
        }
        else {
            mensajeexiste = "";
            mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>&nbsp;</p>";
            $("#comprobacion-expe-enviar").html(mensajeexiste);
        }

    });
}
function ObtenerDatosParaModificarEnvio() {

    $("#form-envio-mod .form-inline").keyup(function () {

        if (/^[0-9]{2,2}$/.test($("#form-envio-mod [name='cod1']").val()) &&
            /^[0-9]{2,2}$/.test($("#form-envio-mod [name='cod2']").val()) &&
            /^[a-zA-Z]{1,1}$/.test($("#form-envio-mod [name='cod3']").val()) &&
            /^[0-9]{4,4}$/.test($("#form-envio-mod [name='cod4']").val()) &&
            /^[0-9]{1,1}$/.test($("#form-envio-mod  [name='cod5']").val())) {

            var codexp = "";
            codexp +=  $("#form-envio-mod [name='cod1']").val();
            codexp +=  $("#form-envio-mod [name='cod2']").val();
            codexp +=  $("#form-envio-mod [name='cod3']").val();
            codexp +=  $("#form-envio-mod [name='cod4']").val();
            codexp +=  $("#form-envio-mod [name='cod5']").val();

            /*var codigoconsulta = "";
            codigoconsulta += codexp1+codexp2+codexp3+codexp4+codexp5;*/            
            $.ajax({
                type: "POST",
                url: "Expediente/ConsultarParaEnviar",
                data: { buscar: codexp },
                success: function (resultado) {
                    var registros = eval(resultado);
                    //alert(resultado.length+" "+registros[0]["descripcion"]);
                    if(registros[0]['result']==0) {
                        // alert("estoy");             
                        $.ajax({
                            type: "POST",
                            url: "Expediente/ObtenerDatosParaModificarEnvio",
                            data: { buscar: codexp },
                            success: function (resultado) {                        
                                var datosparamodificar = eval(resultado);
                                if (datosparamodificar.length>0) {
                                    $("#form-envio-mod [name='nombresrespo']").val(datosparamodificar[0]["NomRespo"]);
                                    $("#form-envio-mod [name='apellidosrespo']").val(datosparamodificar[0]["ApeRespo"]);
                                    $("#form-envio-mod [name='arearespo']").val(datosparamodificar[0]["AreaRespo"]);
                                    $("#form-envio-mod #txa-obse").val(datosparamodificar[0]["ObseEnvio"]);
                                    mensajeexiste = "";
                                    mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:green; font-weight:bold;'>El expediente es válido para modificar</p>";
                                    $("#form-envio-mod #msg-existe").html(mensajeexiste).hide().fadeIn(750); 
                                }
                                else {
                                    $("#form-envio-mod #txa-obse").val("");                    
                                    mensajeexiste = "";
                                    mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>El expediente no existe, inválido para modificar</p>";
                                    $("#form-envio-mod #msg-existe").html(mensajeexiste).hide().fadeIn(750);
                                }
                            }
                        });                
                    }
                    else {
                        $("#form-envio-mod #txa-obse").val("");
                        $("#form-envio-mod [name='nombresrespo']").val("");
                        $("#form-envio-mod [name='apellidosrespo']").val("");
                        $("#form-envio-mod [name='arearespo']").val("");

                        mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>El expediente no existe, inválido para modificar</p>";
                        $("#form-envio-mod #msg-existe").html(mensajeexiste).hide().fadeIn(750);

                    }
                    /*mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-válido' style='color:red; font-weight:bold;'>El expediente ya esta registrado o es inválido</p>";*/
                    /*$("#comprobacion-expe").html(mensajeexiste);*/
                }
            });
        }
        else {

            mensajeexiste = "";
            mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'> &nbsp; </p>";
            $("#form-envio-mod #comprobacion-expe-modi").html(mensajeexiste);
        }

    });
}
/**
 * Función para comprobar si el expediente se puede recepcionar
 */
function ComprobarExpedienteRecibir () {
    $("#form-recibir .form-inline").keyup(function () {

        if (/^[0-9]{2,2}$/.test($("#form-recibir [name='cod1']").val()) &&
            /^[0-9]{2,2}$/.test($("#form-recibir [name='cod2']").val()) &&
            /^[a-zA-Z]{1,1}$/.test($("#form-recibir [name='cod3']").val()) &&
            /^[0-9]{4,4}$/.test($("#form-recibir [name='cod4']").val()) &&
            /^[0-9]{1,1}$/.test($("#form-recibir [name='cod5']").val())) {

            var codexp = "";
            codexp +=  $("#form-recibir [name='cod1']").val();
            codexp +=  $("#form-recibir [name='cod2']").val();
            codexp +=  $("#form-recibir [name='cod3']").val();
            codexp +=  $("#form-recibir [name='cod4']").val();
            codexp +=  $("#form-recibir [name='cod5']").val();

            $.ajax({
                type: "POST",
                url: "Expediente/ConsultarParaRecibir",
                data: { buscar: codexp },
                success: function (resultado) {  
                    var registros = eval(resultado); 

                    if (registros[0]['result']==0)  {

                        mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>El expediente no es válido para Recepcionar</p>";
                    }
                    else {

                        mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:green; font-weight:bold;'>El expediente es válido para Recepcionar</p>";
                    }
                    $("#form-recibir #comprobacion-expe").html(mensajeexiste).hide().fadeIn(750); 
                }
            });
        }
        else {
            mensajeexiste = "";
            mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>&nbsp;</p>";
            $("#form-recibir #comprobacion-expe").html(mensajeexiste);
        }

    });
}
/**
 * Función para rellenar los campos de recepción para modificarlos
 */
function ObtenerDatosParaModificarRecepcion() {

    $("#form-recibir-mod .form-inline").keyup(function () {

        if (/^[0-9]{2,2}$/.test($("#form-recibir-mod [name='cod1']").val()) &&
            /^[0-9]{2,2}$/.test($("#form-recibir-mod [name='cod2']").val()) &&
            /^[a-zA-Z]{1,1}$/.test($("#form-recibir-mod [name='cod3']").val()) &&
            /^[0-9]{4,4}$/.test($("#form-recibir-mod [name='cod4']").val()) &&
            /^[0-9]{1,1}$/.test($("#form-recibir-mod  [name='cod5']").val())) {

            var codexp = "";
            codexp +=  $("#form-recibir-mod [name='cod1']").val();
            codexp +=  $("#form-recibir-mod [name='cod2']").val();
            codexp +=  $("#form-recibir-mod [name='cod3']").val();
            codexp +=  $("#form-recibir-mod [name='cod4']").val();
            codexp +=  $("#form-recibir-mod [name='cod5']").val();

            /*var codigoconsulta = "";
            codigoconsulta += codexp1+codexp2+codexp3+codexp4+codexp5;*/            
            $.ajax({
                type: "POST",
                url: "Expediente/ConsultarParaRecibir",
                data: { buscar: codexp },
                success: function (resultado) {
                    var registros = eval(resultado);
                    //alert(resultado.length+" "+registros[0]["descripcion"]);
                    if(registros[0]['result']==0) {
                        // alert("estoy");             
                        $.ajax({
                            type: "POST",
                            url: "Expediente/ObtenerDatosParaModificarRecepcion",
                            data: { buscar: codexp },
                            success: function (resultado) {                        
                                var datosparamodificar = eval(resultado);
                                if (datosparamodificar.length>0) {
                                    $("#form-recibir-mod [name='nombresrespo']").val(datosparamodificar[0]["NomRespo"]);
                                    $("#form-recibir-mod [name='apellidosrespo']").val(datosparamodificar[0]["ApeRespo"]);
                                    $("#form-recibir-mod [name='arearespo']").val(datosparamodificar[0]["AreaRespo"]);
                                    $("#form-recibir-mod #txa-obse").val(datosparamodificar[0]["ObseEnvio"]);
                                    mensajeexiste = "";
                                    mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:green; font-weight:bold;'>El expediente es válido para modificar</p>";
                                    $("#form-recibir-mod #msg-existe").html(mensajeexiste).hide().fadeIn(750); 
                                }
                                else {
                                    $("#form-recibir-mod #txa-obse").val("");                    
                                    mensajeexiste = "";
                                    mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>El expediente no existe, inválido para modificar</p>";
                                    $("#form-recibir-mod #msg-existe").html(mensajeexiste).hide().fadeIn(750);
                                }
                            }
                        });                
                    }
                    else {
                        $("#form-recibir-mod #txa-obse").val("");
                        $("#form-recibir-mod [name='nombresrespo']").val("");
                        $("#form-recibir-mod [name='apellidosrespo']").val("");
                        $("#form-recibir-mod [name='arearespo']").val("");

                        mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>El expediente no existe, inválido para modificar</p>";
                        $("#form-recibir-mod #msg-existe").html(mensajeexiste).hide().fadeIn(750);

                    }
                    /*mensajeexiste = "";
                        mensajeexiste += "<p class='text-center mensaje-registro-válido' style='color:red; font-weight:bold;'>El expediente ya esta registrado o es inválido</p>";*/
                    /*$("#comprobacion-expe").html(mensajeexiste);*/
                }
            });
        }
        else {

            mensajeexiste = "";
            mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'> &nbsp; </p>";
            $("#form-recibir-mod #comprobacion-expe-modi").html(mensajeexiste);
        }

    });
}