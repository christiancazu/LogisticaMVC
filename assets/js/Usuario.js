/*Evento on activa las funciones al cargar la página*/
$(document).on("ready",RegistrarExpediente());
$(document).on("ready",ModificarRegistrarExpediente());
$(document).on("ready",EnviarExpediente());
$(document).on("ready",ModificarEnviarExpediente());
$(document).on("ready",RecibirExpediente());
$(document).on("ready",ModificarRecibirExpediente());
$(document).on("ready",CambiarPassword());

$("a").not('[href="#modal-tiposusu"]').click(function () {
    LimpiarFormulario();
});

$("#consuexp-input3").keypress(function(event){
    if (event.keyCode === 13) 
        event.preventDefault();
});

/**
 * Función para validar registro de expediente
 */
function RegistrarExpediente(){

    $("#form-reg").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),            
            success:function(resultado){
                var registros = eval(resultado);
                if(registros[0]['result']==0){
                    htmlbutton = "";
                    htmlbutton += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbutton += ' <i class="fa fa-times-circle fa-2x"><strong> error </strong></i> El Expediente ya está Registrado.</div>';           
                }
                else {
                    htmlbutton = "";
                    htmlbutton += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbutton += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido Registrado.</div>'; 
                    LimpiarFormulario();
                }
                $("#form-reg #mensaje-alert-reg").html(htmlbutton); 
                $("#form-reg .borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#form-reg #alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#form-reg #alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $("#form-reg .borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#form-reg #alert-error").css("display","none"); }, 3250);               
            }
        });
    });             
}
/**
 * Función para validar modificación registro de expediente
 */
function ModificarRegistrarExpediente(){

    $("#form-reg-mod").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success:function(resultado){
                if(resultado==="no modificado"){
                    html = "";
                    html += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    html += ' <i class="fa fa-times-circle fa-2x"><strong> error </strong></i> Uno de los expedientes no es válido para modificar.</div>';                  
                }
                else {
                    html = "";
                    html += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    html += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido Modificado.</div>';                    
                    $("#form-reg-mod #comprobacion-expe-modi").html(mensaje);
                    LimpiarFormulario();
                    $("#form-reg-mod #dni-usu-new").addClass("hidden");
                    $("#form-reg-mod #dni-usu-new input").val("");
                    $("#form-reg-mod #dni-usu-new input").prop("required",false);
                    mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'> &nbsp; </p>";
                    $("#form-reg-mod #comprobacion-expe-modi").html(mensaje); 

                }
                $("#form-reg-mod #mensaje-alert").html(html); 
                $("#form-reg-mod .borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#form-reg-mod #alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#form-reg-mod #alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $("#form-reg-mod .borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#form-reg-mod #alert-error").css("display","none"); }, 3250); 
            }
        });
    });             
}
/**
 * Función para Enviar expediente
 */
function EnviarExpediente(){

    $("#form-envio").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success:function(resultado){
                var registro = eval(resultado);
                if(registro[0]['result'] == 0){
                    //alert("no");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> error </strong></i> El Expediente no puede ser enviado.</div>'; 
                }
                else {
                    //alert("si");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido Enviado.</div>'; 
                    LimpiarFormulario();
                }
                $("#form-envio #mensaje-alert").html(htmlbuttonenvio); 
                $("#form-envio .borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#form-envio #alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#form-envio #alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $("#form-envio .borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#form-envio #alert-error").css("display","none"); }, 3250);               
            }
        });
    });             
}
/**
 * función para Recibir expediente
 */
function RecibirExpediente(){

    $("#form-recibir").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success:function(resultado){
                htmlbuttonrecibir = "";
                var registro = eval(resultado);
                if(registro[0]['result'] == 0){                
                    htmlbuttonrecibir += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbuttonrecibir += ' <i class="fa fa-times-circle fa-2x"><strong> error </strong></i> El Expediente no puede ser recibido.</div>'; 
                }
                else {                 
                    htmlbuttonrecibir += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbuttonrecibir += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido recibido.</div>'; 
                    LimpiarFormulario();
                }
                $("#form-recibir #mensaje-alert").html(htmlbuttonrecibir); 
                $("#form-recibir .borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#form-recibir #alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#form-recibir #alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $("#form-recibir .borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#form-recibir #alert-error").css("display","none"); }, 3250);               
            }
        });
    });             
}
/**
 * Función para modificar envio del último expediente
 */
function ModificarEnviarExpediente(){

    $("#form-envio-mod").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success:function(resultado){
                var registros = eval(resultado);
                if(registros[0]['result']==0){
                    //alert("no");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> error </strong></i> El Expediente no puede ser modificado.</div>'; 
                }
                else {
                    //alert("si");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido modificado.</div>'; 
                    LimpiarFormulario();
                    mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'> &nbsp; </p>";
                    $("#form-envio-mod #comprobacion-expe").html(mensaje);
                }
                $("#form-envio-mod #mensaje-alert").html(htmlbuttonenvio); 
                $("#form-envio-mod .borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#form-envio-mod #alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#form-envio-mod #alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $("#form-envio-mod .borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#form-envio-mod #alert-error").css("display","none"); }, 3250);               
            }
        });
    });             
}
function ModificarRecibirExpediente(){

    $("#form-recibir-mod").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success:function(resultado){
                var registros = eval(resultado);
                if(registros[0]['result']==0){
                    //alert("no");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> error </strong></i> El Expediente no puede ser modificado.</div>'; 
                }
                else {
                    //alert("si");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido modificado.</div>'; 
                    LimpiarFormulario();
                    mensaje = "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'> &nbsp; </p>";
                    $("#form-recibir-mod #comprobacion-expe").html(mensaje);
                }
                $("#form-recibir-mod #mensaje-alert").html(htmlbuttonenvio); 
                $("#form-recibir-mod .borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#form-recibir-mod #alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#form-recibir-mod #alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $("#form-recibir-mod .borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#form-recibir-mod #alert-error").css("display","none"); }, 3250);               
            }
        });
    });             
}

function CambiarPassword() {
    var form = "#form-cambiar-pass ";
    $(form).submit(function(event){
        event.preventDefault();
        if ($(form + "[name='newpass']").val() == $(form + "[name='newpassconfirm']").val()) {
            $.ajax({
                url:$(this).attr("action"),
                type:$(this).attr("method"),
                data:$(this).serialize(),            
                success:function(resultado){
                    var registros = eval(resultado);
                    if(registros[0]['result']==0){                       
                        htmlbutton = '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                        htmlbutton += ' <i class="fa fa-times-circle fa-2x"><strong> error </strong></i> La Contraseña es incorrecta.</div>';           
                    }
                    else {                       
                        htmlbutton = '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                        htmlbutton += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> La Contraseña ha sido cambiada.</div>'; 
                        $(form + "input[type='password']").each(function () {
                            $(this).val("");
                        });
                        LimpiarFormulario();
                    }
                    $(form + "#mensaje-alert").html(htmlbutton); 
                    $(form + ".borrar-button").toggleClass("desaparecer");
                    setTimeout(function(){ $(form + "#alert-error").toggleClass("aparecer"); }, 1);
                    setTimeout(function(){ $(form + "#alert-error").removeClass("aparecer"); }, 3000);
                    setTimeout(function(){ $(form + ".borrar-button").toggleClass("desaparecer"); }, 3250);
                    setTimeout(function(){ $(form + "#alert-error").css("display","none"); }, 3250); 
                    $(form + "[name]")
                }
            });
        }
        else {

            htmlbutton = '<div class="alert alert-warning mensaje-alert-advertencia" id="alert-error">';
            htmlbutton += ' <i class="fa fa-exclamation-circle fa-2x"><strong> Error </strong></i> Las contraseñas no coinciden.</div>';
            $(form + "#mensaje-alert").html(htmlbutton); 
            $(form + ".borrar-button").toggleClass("desaparecer");
            setTimeout(function(){ $(form + "#alert-error").toggleClass("aparecer"); }, 1);
            setTimeout(function(){ $(form + "#alert-error").removeClass("aparecer"); }, 3000);
            setTimeout(function(){ $(form + ".borrar-button").toggleClass("desaparecer"); }, 3250);
            setTimeout(function(){ $(form + "#alert-error").css("display","none"); }, 3250);
        }
    });  

}



/*función para limpiar formularios*/
function LimpiarFormulario() {
    $("input[type='text']").each(function () {
        $(this).val("");
    });
    $("#form-regusu-mod [name='dniusu']").trigger("reset");
    $("p").html("&nbsp;");
    $("#consultar #table-consulta").html("");
    $("#movimientos #table-movimientos").html("");
    $("#comprobacion-expe p").html(" ");
    $("#msg-existe").html(" ");  
    $(".btn-azul").attr("disabled", true);
    $(".btn-verde").attr("disabled", true);
    $("textarea").html("");
    $("#table-consulta").trigger("reset");
    $("#form-reg").trigger("reset");
    $("#form-reg-mod").trigger("reset");
    $("#form-envio").trigger("reset");
    $("#form-envio-mod").trigger("reset");
    $("#form-recibir").trigger("reset");
    $("#form-recibir-mod").trigger("reset");
    $("#form-regusu").trigger("reset");
    $("#form-regusu-mod").trigger("reset");
    $("#form-regarea").trigger("reset");
    $("#form-regarea-mod").trigger("reset"); 
    $("#consultarusuario").trigger("reset");   
    $("#consultarusuario #table-consulta").html("");
    $( ".input-group-addon" ).removeClass("success");
    $( '.anho' ).addClass("success");


}
/********************************************************************/


$(document).on("ready",Salir());
/**
 * Función que se ejecuta al intentar loguear
 */
function Salir(){

    $("#salir").on("click",function(event){
        event.preventDefault();
        $.ajax({
            url:"ControlPanel/Salir",
            type:"POST",
            data:{},
            success:function() {
                window.location.href = "Inicio";
            }
        });
    });
}
/**
 * Función para salir
 */
var PanelSalir = function() {
    $("#panel-salir").on("click",function(event){
        event.preventDefault();
        $.ajax({
            url:"ControlPanel/Salir",
            type:"POST",
            data:{},
            success:function() {
                window.location.href = "Inicio";
            }
        });
    });
}
/*Función Confirmar Eliminar Expediente*/