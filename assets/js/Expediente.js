$(document).on("ready", Consultar());
$(document).on("ready", ConsultarMovimientos());
$(document).on("ready", VerificarParaRegistrar());
$(document).on("ready", DatosParaModificarRegistrar());
$(document).on("ready", VerificarParaEnviar());
$(document).on("ready", DatosParaModificarEnviar());
$(document).on("ready", VerificarParaRecibir());
$(document).on("ready", DatosParaModificarRecibir());



$("#cargar-cp a").click(function () {
    $("#controlpanel").hide();
});
/*$(document).on("click", cargar());

function cargar() {
    $("#cargar-cp").load("ControlPanel/CargarCP");
}*/

/*$("#tabs-lateral [href='#movimientos']").click(function () {
   alert(""); 

});*/
/**
 * Función para Comprobar si el código de expediente es válido para registrar en el formato 00 00 A 0000 0
 */
function ValidarCodigo(form) {

    if (/^[0-9]{2,2}$/.test($(form + " [name='cod1']").val()) &&
        /^[0-9]{2,2}$/.test($(form + " [name='cod2']").val()) &&
        /^[a-zA-Z]{1,1}$/.test($(form + " [name='cod3']").val()) &&
        /^[0-9]{4,4}$/.test($(form + " [name='cod4']").val()) &&
        /^[0-9]{1,1}$/.test($(form + " [name='cod5']").val())) {
        var codexp = "";
        $(form + " .form-inline input").each(function () {
            codexp += $(this).val();
        });
        return codexp;
    } else return false;
}
/**
 * Función para Comprobar Si el expediente se puede registrar
 */
function VerificarParaRegistrar() {
    var form = '#form-reg';
    $(form + " .form-inline").keyup("change", function () {
        /*Se envia a la función ValidarCodigo la variable form que contiene el id del formulario como string*/
        if (codigo = ValidarCodigo(form)) {
            $.ajax({
                type: "POST",
                url: "Expediente/VerificarExpediente",
                data: {
                    codigo: codigo
                },
                success: function (resultado) {
                    var registro = eval(resultado);
                    if (registro[0]['result'] == 1) {
                        mensaje = MensajeDeVerificacion("red", "Registrar");
                        /*    e = registro[0]['result'];
                            alert(e);*/
                    } else {
                        mensaje = MensajeDeVerificacion("green", "Registrar");
                    }
                    $(form + " #comprobacion-expe").html(mensaje).hide().fadeIn(750);
                }
            });
        } else {
            mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>&nbsp;</p>";
            $(form + " #comprobacion-expe").html(mensaje);
        }
    });
}

$("body").click(function () {

    //alert (e);

});

function MensajeDeVerificacion(color, msjdemodulo) {
    msjcorrecto = "<p class='text-center mensaje-registro-valido' style='color:" + color + "; font-weight:bold;'>El expediente es válido para " + msjdemodulo + "</p>";
    msjincorrecto = "<p class='text-center mensaje-registro-valido' style='color:" + color + "; font-weight:bold;'>El expediente NO es válido para " + msjdemodulo + "</p>";
    return (color === "green") ? msjcorrecto : msjincorrecto;
}
/**
 * Función para Comprobar si el código de expediente es válido para modificar y llenar los campos de descripción y modificación
 */
function DatosParaModificarRegistrar() {
    var form = '#form-reg-mod';
    $(form + " .form-codigo").keyup(function () {
        if (codigo = ValidarCodigo(form)) {
            $.ajax({
                type: "POST",
                url: "Expediente/VerificarExpediente",
                data: {
                    codigo: codigo
                },
                success: function (resultado) {
                    var registro = eval(resultado);
                    if (registro[0]['result'] == 1) {
                        $.ajax({
                            type: "POST",
                            url: "Expediente/DatosParaModificarRegistrar",
                            data: {
                                codigo: codigo
                            },
                            success: function (resultado) {
                                var datosparamodificar = eval(resultado);
                                if (datosparamodificar.length > 0) {
                                    $(form + " #text-area-desc").val(datosparamodificar[0]["descripcion"]);
                                    $(form + " #text-area-obse").val(datosparamodificar[0]["observaciones"]);
                                    mensaje = MensajeDeVerificacion("green", "Modificar");
                                    $(form + " #comprobacion-expe-modi").html(mensaje).hide().fadeIn(750);
                                }
                            }
                        });
                    } else {
                        $(form + " #text-area-desc").val("");
                        $(form + " #text-area-obse").val("");
                        mensaje = MensajeDeVerificacion("red", "Modificar");
                        $(form + " #comprobacion-expe-modi").html(mensaje).hide().fadeIn(750);
                    }
                }
            });
        } else {
            mensaje = "";
            mensaje += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'> &nbsp; </p>";
            $(form + " #comprobacion-expe-modi").html(mensaje);
        }
    });
}
/**
 * Función invocada por la vista Consultar
 */
function Consultar() {

    $("#form-consultar #consuexp-input3").keyup(function () {

        letra3 = $("#form-consultar #consuexp-input3").val();

        Filtrar(letra3);
    });
    $("#consultar").on("click", "#table-consulta tr", function (event) {
        event.preventDefault();
        expedienteselect = $(this).attr("href");
        MostrarExpediente(expedienteselect);
    });
}

/**
 * Función invocada por la vista Consultar
 */
function ConsultarMovimientos() {

    $("#form-movimientos").submit(function (event) {
        event.preventDefault();

        letra3 = $("#form-movimientos #consuexp-input3").val();

        MostrarMovimientos(letra3);
    });
    $("#movimientos").on("click", "#table-movimientos tr", function (event) {
        
        event.preventDefault();
        expedienteselect = $(this).attr("href");
        MostrarMovimientoExpediente(expedienteselect);
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
        data: {
            codigo: letra
        },
        success: function (resultado) {
            //alert(resultado);
            var registro = eval(resultado);
            if (registro.length == 0) {
                $('#modal-nohayconsulta').modal('show');
                consultanula = $("#consuexp-input3").val();
                htmlnoencontro = "";
                htmlnoencontro = '" ' + consultanula + ' "';
                $("#modal-nohayconsulta #codigo-nulo").html(htmlnoencontro);
                $("#registrar-expe").click(function () {
                    $('[href="#registrar"]').click();
                    $('[href="#tab-reg"]').click();
                });
            } else {
                htmlfilas = "";
                htmlfilas = '<table class="col-md-8 col-md-offset-2 table-bordered table-striped table-condensed cf"><thead class="cf">';
                htmlfilas += '<tr><th>#</th><th>Código</th><th>Descripción</th><th>Estado</th></tr>';
                htmlfilas += '</thead><tbody>';
                for (var i = 0; i < registro.length; i++) {
                    htmlfilas += '<tr id="consultar-tr-a-href" href=' + registro[i]['codigo'] + '><td>' + (i + 1) + '</td><td>' + registro[i]['codigo'] + '</td>';
                    htmlfilas += '<td>' + registro[i]['descripcion'] + '</td>';
                    switch (registro[i]['estado']) {
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
                    $(document).ready(function () {
                        $('#consultar-tr-a-href a').click(function () {
                            window.location = $(this).attr('href');
                        });
                    });
                };
                htmlfilas += '</tr></tbody></table>';
                $("#consultar #table-consulta").html(htmlfilas);
            }
        }
    });
}

function MostrarMovimientos(codigo) {
    $.ajax({
        url: "Expediente/MostrarMovimientos",
        type: "POST",
        data: {
            codigo: codigo
        },
        success: function (resultado) {
            //alert(resultado);
            var registro = eval(resultado);
            if (registro[0]['result'] == 0) {

                $('#modal-nohaymovimientos').modal('show');
                consultanula = $("#form-movimientos #consuexp-input3").val();

                htmlnoencontro = '" ' + consultanula + ' "';
                $("#modal-nohaymovimientos #codigo-nulo").html(htmlnoencontro);

            } else {
                htmlfilas = '<table class="col-md-12 table-bordered table-striped table-condensed cf" style="margin:0 0px 0 20px;">';
                htmlfilas += '<thead class="cf">';
                htmlfilas += '<tr><th>Nº Movimiento</th>';
                htmlfilas += '<th>Movimiento</th>';
                htmlfilas += '<th>Fecha</th>';
                htmlfilas += '<th>Delegado</th>';
                htmlfilas += '<th>Responsable</th></tr>';
                htmlfilas += '</thead><tbody>';
                for (var i = 0; i < registro.length; i++) {
                    htmlfilas += '<tr id="movimientos-tr-a-href" href=' + registro[i]['CodMovi'] + '>';
                    htmlfilas += '<td>' + registro[i]['CodMovi'] + '</td>';
                    htmlfilas += '<td>' + registro[i]['TipoMovi'] + '</td>';
                    htmlfilas += '<td>' + registro[i]['FecMovi'] + '</td>';
                    htmlfilas += '<td>' + registro[i]['Delegado'] + '</td>';
                    htmlfilas += '<td>' + registro[i]['Responsable'] + '</td>';
                    /* función para convertir TR a href*/
                    $(document).ready(function () {
                        $('#movimientos-tr-a-href a').click(function () {
                            window.location = $(this).attr('href');
                        });
                    });
                };
                htmlfilas += '</tr></tbody></table>';
                $("#movimientos #table-movimientos").html(htmlfilas);

            }
        }
    });
}
/**
 * Función para mostrar le información del expediente seleccionado en una ventana modal
 * @param {[[Type]]} expedienteselect [[Description]]
 */
function MostrarExpediente(expedienteselect) {
    $.ajax({
        url: "Expediente/MostrarExpediente",
        type: "POST",
        data: {
            codigo: expedienteselect
        },
        success: function (resultado) {
            var registro = eval(resultado);
            bodydatosreg = "";
            bodydatosreg += '<div class="container-fluid">';
            bodydatosreg += '<h3 class="panel-modal-titulo">Código : <label class="text-negro">' + registro[0]["codexpe"] + '</label></h3>';
            switch (registro[0]['descestado']) {
                case "Disponible":
                    bodydatosreg += '<h4 class="panel-modal-titulo">Estado : <label style="color : green;">Disponible</h4>';
                    break;
                case "No Disponible":
                    bodydatosreg += '<h4 class="panel-modal-titulo">Estado : <label style="color : red;">No Disponible</h4>';
                    break;
                default:
                    bodydatosreg += '<h4 class="panel-modal-titulo">Estado : <label style="color : blue;"><label>Ocupado</h4>';
            }
            bodydatosreg += '<div class="panel panel-primary">';
            bodydatosreg += '<div class="panel-modal-body">';
            bodydatosreg += '<h3 class="panel-modal-contenido text-primary"><strong class="text-uppercase"> Datos de Registro </strong></h3>';

            bodydatosreg += ContenidoModalConsultar("Registrado por : ", registro[0]["usureg"]);
            bodydatosreg += ContenidoModalConsultar("Fecha de Registro : ", registro[0]["fecreg"]);
            bodydatosreg += ContenidoModalConsultar("Descripción : ", registro[0]["descexpe"]);
            bodydatosreg += ContenidoModalConsultar("Oservaciones : ", registro[0]["obseexpe"]);
            bodydatosreg += '<input type="hidden" id="codigo-redireccion" value=' + registro[0]["codexpe"] + '>';
            bodydatosreg += '</div></div>';

            bodydatosreg += '<div class="panel panel-primary">';
            bodydatosreg += '<div class="panel-modal-body">';
            bodydatosreg += '<h3 class="panel-modal-contenido text-primary"><strong class="text-uppercase"> Datos de Ultimo Movimiento </strong></h3>';

            $.ajax({
                url: "Expediente/UltimoMovimiento",
                type: "POST",
                data: {
                    codigo: expedienteselect
                },
                success: function (resultadomovi) {
                    var registromovi = eval(resultadomovi);
                    if (registromovi[0]["result"] == 0) {
                        bodydatosreg += '<h4 class="panel-modal-titulo"><label class="text-negro">El Expediente no tiene moviemientos</h4>';
                    } else {
                        bodydatosreg += ContenidoModalConsultar("Código de Movimiento : ", registromovi[0]["CodMovi"]);
                        bodydatosreg += ContenidoModalConsultar("Tipo de Movimiento : ", registromovi[0]["TipoMovi"]);
                        bodydatosreg += ContenidoModalConsultar("Fecha de Movimiento : ", registromovi[0]["FecMovi"]);
                        bodydatosreg += ContenidoModalConsultar("Delegado : ", registromovi[0]["Delegado"]);
                        bodydatosreg += ContenidoModalConsultar("Responsable : ", registromovi[0]["Responsable"]);
                        bodydatosreg += ContenidoModalConsultar("Area del Responsable : ", registromovi[0]["AreaRespoMovi"]);
                        bodydatosreg += ContenidoModalConsultar("Observaciones de Movimiento : ", registromovi[0]["ObseMovi"]);

                    }
                    bodydatosreg += '</div></div></div>';
                    $("#modal-consultar #info-expe").html(bodydatosreg);

                    htmlfootermodal = "";
                    htmlfootermodal += '<button type="button" class="btn btn-lg btn-primary btn-modal col-md-4 col-md-offset-2 lead"';
                    htmlfootermodal += 'data-dismiss="modal" id="ir-a-movimientos"><strong>Ver movimientos</strong></button>';
                    if (registro[0]['descestado'] === "Disponible") {
                        htmlfootermodal += '<button type="button" class="btn btn-lg btn-primary btn-modal col-md-4 lead"';
                        htmlfootermodal += 'data-dismiss="modal" id="enviar-expe"><strong>Enviar</strong></button>';
                    } else {
                        htmlfootermodal += '<button type="button" class="btn btn-lg btn-primary btn-modal col-md-4 lead"';
                        htmlfootermodal += 'data-dismiss="modal" id="recepcionar-expe"><strong>Recepcionar</strong></button>';
                    }
                    $("#modal-consultar #footer-expe").html(htmlfootermodal);
                    $('#modal-consultar').modal('show');
                    /*en la variable " codigo " captura el código en la ventana modal para colocarlo en formulario enviar/registrar/recibir*/
                    codigo = $("#codigo-redireccion").attr("value");
                    $("#enviar-expe").click(function () {
                        tab = '"#enviar"';
                        subtab = '"#tab-enviar"';
                        form = '#form-envio';
                        RedirigirAFormulario(codigo, tab, subtab, form);
                    });
                    $("#recepcionar-expe").click(function () {
                        tab = '"#recibir"';
                        subtab = '"#tab-recibir"';
                        form = '#form-recibir';
                        RedirigirAFormulario(codigo, tab, subtab, form);
                    });
                    $("#ir-a-movimientos").click(function () {
                        tab = '"#movimientos"';
                        form = '#form-movimientos';
                        RedirigirAMovimientos(codigo, tab, form);
                    });
                }
            });
        }
    });
}
function RedirigirAMovimientos (codigo, tab, form) {
    $('[href=' + tab + ']').click();
    $(form + " #consuexp-input3").val(codigo);
}
/**
 * Función para mostrar la información del movimiento seleccionado
 * @param {[[Type]]} expedienteselect [[Description]]
 */
function MostrarMovimientoExpediente(expedienteselect) {
    
    $.ajax({
        url: "Expediente/MostrarMovimientoExpediente",
        type: "POST",
        data: {
            codigo: expedienteselect
        },
        success: function (resultado) {
            var registro = eval(resultado);            
            bodydatosreg = "";
            bodydatosreg += '<div class="container-fluid">';
            bodydatosreg += '<h3 class="panel-modal-titulo">Código : <label class="text-negro">' + registro[0]["CodExpeMovi"] + '</label></h3>';
            bodydatosreg += '<h4 class="panel-modal-titulo">Código de Movimiento : <label class="text-negro">Nº '+registro[0]["CodMovi"]+'</h4>';
            bodydatosreg += '<div class="panel panel-primary">';
            bodydatosreg += '<div class="panel-modal-body">';
            bodydatosreg += '<h3 class="panel-modal-contenido text-primary"><strong class="text-uppercase"> Datos de Movimiento </strong></h3>';            
            bodydatosreg += ContenidoModalConsultar("Movimiento : ", registro[0]["TipoMovi"]);
            bodydatosreg += ContenidoModalConsultar("Fecha de Movimiento : ", registro[0]["FecMovi"]);
            bodydatosreg += ContenidoModalConsultar("Delegado : ", registro[0]["Delegado"]);
            bodydatosreg += ContenidoModalConsultar("Responsable : ", registro[0]["Responsable"]);
            bodydatosreg += ContenidoModalConsultar("Área del Responsable : ", registro[0]["AreaRespoMovi"]);
            bodydatosreg += ContenidoModalConsultar("Observaciones : ", registro[0]["ObseMovi"]);            
            bodydatosreg += '</div></div></div>';
            $("#modal-movimientos #info-movimientos").html(bodydatosreg);
            $("#modal-movimientos").modal("show");
        }
    });
}
/**funciona que rellena los contenidos de la ventana modal*/
function ContenidoModalConsultar(dato, valor) {
    var msj = "";
    msj += '<div class="container-fluid">';
    msj += '<div class="row">';
    msj += '<div class="col-xs-4 col-modal">';
    msj += '<div class="form-group">';
    msj += '<label class="text-azul pull-right">' + dato + '</label>';
    msj += '</div></div>';
    msj += '<div class="col-xs-8 col-modal">';
    msj += '<div class="form-group">';
    msj += '<label class="text-negro pull-left" style="text-align:left">' + valor + '</label>';
    msj += '</div></div>';
    msj += '</div></div>';
    return msj;
}
/**
 * Función que redigige al módulo correspondiente completando el código en el formulario
 * @param {[[Type]]} codigo [[Description]]
 */
function RedirigirAFormulario(codigo, tab, subtab, form) {

    codigo = DescomponerCodigo(codigo);
    $('[href=' + tab + ']').click();
    $('[href=' + subtab + ']').click();
    $(form + " [name='cod1']").val(codigo[0]);
    $(form + " [name='cod2']").val(codigo[1]);
    $(form + " [name='cod3']").val(codigo[2]);
    $(form + " [name='cod4']").val(codigo[3]);
    $(form + " [name='cod5']").val(codigo[4]);
    $(form + " .input-group-addon").addClass("success");
    $(form + " button").attr("disabled", false);
    mensaje = "<p class='text-center mensaje-registro-valido' style='font-weight:bold; color:green;'>";
    mensaje += (form == "#form-envio") ?
        "El expediente es válido para Enviar" :
        "El expediente es válido para Recepcionar";
    $(form + " #comprobacion-expe").html(mensaje + "</p>").hide().fadeIn(750);
}
/**
 * Función para descomponer el código de expediente en array
 * @param   {string}   codigo [[Description]]
 * @returns {[[Type]]} [[Description]]
 */
function DescomponerCodigo(codigo) {
    var cod1, cod2, cod3, cod4, cod5;
    cod1 = codigo.substr(0, 2);
    cod2 = codigo.substr(2, 2);
    cod3 = codigo.substr(4, 1);
    cod4 = codigo.substr(5, 4);
    cod5 = codigo.substr(9, 1);
    var codigoarray = [cod1, cod2, cod3, cod4, cod5];
    return codigoarray;
}
/**
 * Función para comprobar si el expediente se puede enviar
 */
function VerificarParaEnviar() {
    $("#form-envio .form-inline").keyup(function () {
        form = '#form-envio ';
        if (codigo = ValidarCodigo(form)) {
            $.ajax({
                type: "POST",
                url: "Expediente/VerificarParaEnviar",
                data: {
                    codigo: codigo
                },
                success: function (resultado) {
                    var registro = eval(resultado);
                    if (registro[0]['result'] == 0) {
                        mensaje = MensajeDeVerificacion("red", "Enviar");
                    } else {
                        mensaje = MensajeDeVerificacion("green", "Enviar");
                    }
                    $("#form-envio #comprobacion-expe").html(mensaje).hide().fadeIn(750);
                }
            });
        } else {
            mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>&nbsp;</p>";
            $("#form-envio #comprobacion-expe").html(mensaje);
        }
    });
}
/**
 * Función para rellenar los campos de Envio para modificarlos
 */
function DatosParaModificarEnviar() {
    var form = '#form-envio-mod ';
    $(form + ".form-inline").keyup(function () {
        if (codigo = ValidarCodigo(form)) {
            $.ajax({
                type: "POST",
                url: "Expediente/VerificarParaModificarEnviar",
                data: {
                    codigo: codigo
                },
                success: function (resultado) {
                    var registro = eval(resultado);
                    if (registro[0]['result'] == 1) {
                        $.ajax({
                            type: "POST",
                            url: "Expediente/DatosParaModificarEnviar",
                            data: {
                                codigo: codigo
                            },
                            success: function (resultado) {
                                var datosparamodificar = eval(resultado);
                                if (datosparamodificar.length > 0) {
                                    $(form + 'input[type=radio]').prop('checked', false);
                                    $(form + "[name='nombresrespo']").val(datosparamodificar[0]["NomRespo"]);
                                    $(form + "[name='apellidosrespo']").val(datosparamodificar[0]["ApeRespo"]);
                                    $(form + "[name='arearespo']").val(datosparamodificar[0]["AreaRespo"]);
                                    $(form + "textarea").val(datosparamodificar[0]["ObseMovi"]);
                                    mensaje = MensajeDeVerificacion("green", "Modificar");
                                    $(form + "#comprobacion-expe").html(mensaje).hide().fadeIn(750);
                                }
                            }
                        });
                    } else {
                        $(form + "textarea").val("");
                        $(form + "[name='nombresrespo']").val("");
                        $(form + "[name='apellidosrespo']").val("");
                        $(form + "[name='arearespo']").val("");
                        $(form + 'input[type=radio]').prop('checked', false);
                        mensaje = MensajeDeVerificacion("red", "Modificar");
                        $(form + "#comprobacion-expe").html(mensaje).hide().fadeIn(750);
                    }
                }
            });
        } else {
            mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'> &nbsp; </p>";
            $(form + "#comprobacion-expe").html(mensaje);
        }
    });
}
/**
 * Función para comprobar si el expediente se puede recepcionar
 */
function VerificarParaRecibir() {
    var form = '#form-recibir ';
    $(form + ".form-inline").keyup(function () {
        if (codigo = ValidarCodigo(form)) {
            $.ajax({
                type: "POST",
                url: "Expediente/VerificarParaRecibir",
                data: {
                    codigo: codigo
                },
                success: function (resultado) {
                    var registro = eval(resultado);
                    if (registro[0]['result'] == 0) {
                        mensaje = MensajeDeVerificacion("red", "Recibir");
                    } else {
                        mensaje = MensajeDeVerificacion("green", "Recibir");
                    }
                    $(form + "#comprobacion-expe").html(mensaje).hide().fadeIn(750);
                }
            });
        } else {
            mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>&nbsp;</p>";
            $(form + "#comprobacion-expe").html(mensaje);
        }
    });
}
/**
 * Función para rellenar los campos de recepción para modificarlos
 */
function DatosParaModificarRecibir() {
    var form = '#form-recibir-mod ';
    $(form + ".form-inline").keyup(function () {
        if (codigo = ValidarCodigo(form)) {
            $.ajax({
                type: "POST",
                url: "Expediente/VerificarParaModificarRecibir",
                data: {
                    codigo: codigo
                },
                success: function (resultado) {
                    var registro = eval(resultado);
                    if (registro[0]['result'] == 1) {
                        $.ajax({
                            type: "POST",
                            url: "Expediente/DatosParaModificarRecibir",
                            data: {
                                codigo: codigo
                            },
                            success: function (resultado) {
                                var datosparamodificar = eval(resultado);
                                if (datosparamodificar.length > 0) {
                                    $(form + 'input[type=radio]').prop('checked', false);
                                    $(form + "[name='nombresrespo']").val(datosparamodificar[0]["NomRespo"]);
                                    $(form + "[name='apellidosrespo']").val(datosparamodificar[0]["ApeRespo"]);
                                    $(form + "[name='arearespo']").val(datosparamodificar[0]["AreaRespo"]);
                                    $(form + "textarea").val(datosparamodificar[0]["ObseMovi"]);
                                    mensaje = MensajeDeVerificacion("green", "Modificar");
                                    $(form + "#comprobacion-expe").html(mensaje).hide().fadeIn(750);
                                }
                            }
                        });
                    } else {
                        $(form + "textarea").val("");
                        $(form + "[name='nombresrespo']").val("");
                        $(form + "[name='apellidosrespo']").val("");
                        $(form + "[name='arearespo']").val("");
                        $(form + 'input[type=radio]').prop('checked', false);
                        mensaje = MensajeDeVerificacion("red", "Modificar");
                        $(form + "#comprobacion-expe").html(mensaje).hide().fadeIn(750);
                    }
                }
            });
        } else {
            mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'> &nbsp; </p>";
            $(form + "#comprobacion-expe").html(mensaje);
        }
    });
}