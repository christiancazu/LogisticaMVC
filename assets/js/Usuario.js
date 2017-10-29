/*Evento on activa la función al cargar la página*/
$(document).on("ready",RegistrarExpediente());
$(document).on("ready",ModificarExpediente());
$(document).on("ready",EnviarExpediente());
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
                if(resultado==="no registrado"){

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
                $("#mensaje-alert-reg").html(htmlbutton); 
                $(".borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $(".borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#alert-error").css("display","none"); }, 3250);               
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
                    htmlbuttonx += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> El Expediente no está Registrado.</div>';                  
                }
                else {

                    htmlbuttonx = "";
                    htmlbuttonx += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbuttonx += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido Modificado.</div>';
                    LimpiarFormulario() ;
                }

                $("#mensaje-alert-modi").html(htmlbuttonx); 
                $(".borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $(".borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#alert-error").css("display","none"); }, 3250); 
            }
        });
    });             
}
/**
 * Función para Enviar expediente
 */
function EnviarExpediente(){

    $("#form-enviarexp").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success:function(resultado){
                if(resultado==="no enviado"){
                    alert("no");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> El Expediente no puede ser enviado.</div>'; 
                }
                else {
                    alert("si");
                    htmlbuttonenvio = "";
                    htmlbuttonenvio += '<div class="alert alert-success mensaje-alert-correcto" id="alert-error">';
                    htmlbuttonenvio += ' <i class="fa fa-times-circle fa-2x"><strong> Correcto ! </strong></i> El Expediente ha sido Enviado.</div>'; 
                    LimpiarFormulario();
                }
                $("#mensaje-alert-envio").html(htmlbuttonenvio); 
                $(".borrar-button").toggleClass("desaparecer");
                setTimeout(function(){ $("#alert-error").toggleClass("aparecer"); }, 1);
                setTimeout(function(){ $("#alert-error").removeClass("aparecer"); }, 3000);
                setTimeout(function(){ $(".borrar-button").toggleClass("desaparecer"); }, 3250);
                setTimeout(function(){ $("#alert-error").css("display","none"); }, 3250);               
            }
        });
    });             
}
function LimpiarFormulario() {
    mensajeexiste = "";
    mensajeexiste += "<p class='text-center mensaje-registro-valido' style='color:red; font-weight:bold;'>&nbsp;</p>";
    $("#comprobacion-expe").html(mensajeexiste);
    $("#comprobacion-expe").html(mensajeexiste);
    $(".btn-azul").attr("disabled", true);
    $(".btn-verde").attr("disabled", true);
    $("#form-regexp").trigger("reset");
    $("#form-modiexp").trigger("reset");
    $("#form-enviarexp").trigger("reset");
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