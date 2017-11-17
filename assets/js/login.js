/*Evento on activa la función al cargar la página*/
$(document).on("ready",login());
/**
 * Función que se ejecuta al intentar loguear
 */
function login(){

    $("#form-login").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success:function(resultado){              
                if(resultado=="incorrecto"){                   
                    htmlbuttonx = '<div class="alert alert-danger mensaje-alert-error" id="alert-error">';
                    htmlbuttonx += ' <i class="fa fa-times-circle fa-2x"><strong> Error ! </strong></i> Usuario o Contraseña Incorrecto.</div>';
                    $("#mensaje-alert-login").html(htmlbuttonx); 
                    $(".borrar-button").toggleClass("desaparecer");
                    setTimeout(function(){ $("#alert-error").toggleClass("aparecer"); }, 1);
                    setTimeout(function(){ $("#alert-error").removeClass("aparecer"); }, 3000);
                    setTimeout(function(){ $(".borrar-button").toggleClass("desaparecer"); }, 3250);
                    setTimeout(function(){ $("#alert-error").css("display","none"); }, 3250); 
                } else if (resultado=="inactivo") {
                    htmlbuttonx = '<div class="alert alert-warning mensaje-alert-advertencia" id="alert-error">';
                    htmlbuttonx += ' <i class="fa fa-exclamation-circle fa-2x"><strong> Advertencia ! </strong></i> Usuario Inactivo.</div>';
                    $("#mensaje-alert-login").html(htmlbuttonx); 
                    $(".borrar-button").toggleClass("desaparecer");
                    setTimeout(function(){ $("#alert-error").toggleClass("aparecer"); }, 1);
                    setTimeout(function(){ $("#alert-error").removeClass("aparecer"); }, 3000);
                    setTimeout(function(){ $(".borrar-button").toggleClass("desaparecer"); }, 3250);
                    setTimeout(function(){ $("#alert-error").css("display","none"); }, 3250);
                }
                else  window.location.replace("ControlPanel");
            }
        });
    });
    $("#salir").on("click",function(event){
        event.preventDefault();
        $.ajax({
            url:"ControlPanel/Salir",
            type:"POST",
            data:{},
            success:function() {
                windows.location.href = "Inicio";
            }
        });
    });
}