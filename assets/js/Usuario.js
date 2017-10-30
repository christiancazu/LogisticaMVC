/*Evento on activa las funciones al cargar la página*/
$(document).on("ready",RegistrarExpediente());
$(document).on("ready",ModificarExpediente());
$(document).on("ready",ModificarEnvioExpediente());
$(document).on("ready",EnviarExpediente());
$(document).on("ready",RecibirExpediente());
$(document).on("ready",ModificarRecepcionExpediente());
/**
 * Función para validar registro de expediente
 */
function RegistrarExpediente(){

    $("#form-regexp").submit(function(event){
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
                    htmlbutton += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> El Expediente ya está Registrado.</div>';           

                }
                else {
                    htmlbutton = "";
                    htmlbutton += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbutton += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido Registrado.</div>'; 
                    LimpiarFormulario();
                }
                $("#form-regexp #mensaje-alert-reg").html(htmlbutton); 
                $("#form-regexp .borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#form-regexp #alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#form-regexp #alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $("#form-regexp .borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#form-regexp #alert-error").css("display","none"); }, 3250);               
            }
        });
    });             
}
/**
 * Función para validar modificación registro de expediente
 */
function ModificarExpediente(){

    $("#form-modiexp").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success:function(resultado){
                if(resultado==="no modificado"){
                    htmlbuttonx = "";
                    htmlbuttonx += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbuttonx += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> Uno de los expedientes, no es inválido para modificar.</div>';                  
                }
                else {
                    htmlbuttonx = "";
                    htmlbuttonx += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbuttonx += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido Modificado.</div>';
                    LimpiarFormulario() ;
                }
                $("#form-modiexp #mensaje-alert").html(htmlbuttonx); 
                $("#form-modiexp .borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#form-modiexp #alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#form-modiexp #alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $("#form-modiexp .borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#form-modiexp #alert-error").css("display","none"); }, 3250); 
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
                if(resultado==="no enviado"){
                    //alert("no");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> El Expediente no puede ser enviado.</div>'; 
                }
                else {
                    //alert("si");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido Enviado.</div>'; 
                    LimpiarFormulario();
                }
                $("#form-envio #mensaje-alert-envio").html(htmlbuttonenvio); 
                $("#form-envio .borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#form-envio #alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#form-envio #alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $("#form-envio .borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#form-envio #alert-error").css("display","none"); }, 3250);               
            }
        });
    });             
}
function RecibirExpediente(){

    $("#form-recibir").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success:function(resultado){
                htmlbuttonrecibir = "";
                    
                if(resultado==="no recibido"){                
                    htmlbuttonrecibir += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbuttonrecibir += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> El Expediente no puede ser recibido.</div>'; 
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


function ModificarEnvioExpediente(){

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
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> El Expediente no puede ser modificado.</div>'; 
                }
                else {
                    //alert("si");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido modificado.</div>'; 
                    LimpiarFormulario();
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


function ModificarRecepcionExpediente(){

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
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> El Expediente no puede ser modificado.</div>'; 
                }
                else {
                    //alert("si");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido modificado.</div>'; 
                    LimpiarFormulario();
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

function LimpiarFormulario() {
    mensajeexiste = "";
    mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>&nbsp;</p>";
    $("#comprobacion-expe").html(mensajeexiste);
   
    $("#comprobacion-expe-enviar").html(" ");
    $("#form-envio-mod #msg-existe").html(" ");
    $("#form-recibir-mod #msg-existe").html(" ");
    $(".btn-azul").attr("disabled", true);
    $(".btn-verde").attr("disabled", true);
    $("#form-regexp").trigger("reset");
    $("#form-modiexp").trigger("reset");
    $("#form-envio").trigger("reset");
    $("#form-envio-mod").trigger("reset");
    $("#form-recibir").trigger("reset");
    $("#form-recibir-mod").trigger("reset");
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