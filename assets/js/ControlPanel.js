/*Evento on activa la función al cargar la página*/
$(document).on("ready",RegistrarExpediente());
/**
 * Función que se ejecuta al intentar loguear
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
                    $("#alert-correcto").addClass("hidden-correcto");
                    setTimeout(function(){ $("#alert-error").removeClass("hidden-error"); }, 250);
                    setTimeout(function(){ $("#alert-error").removeClass("animate"); }, 500);
                            
                    setTimeout(function(){ $("#alert-error").addClass("hiddenx"); }, 2500);
                    setTimeout(function(){ $("#alert-error").addClass("hidden-error"); }, 4000);
                    setTimeout(function(){ $("#alert-error").removeClass("hiddenx"); }, 4000);
                }
                else {
                    $("#alert-error").addClass("hidden-error");
                    setTimeout(function(){ $("#alert-correcto").removeClass("hidden-correcto"); }, 250);
                    setTimeout(function(){ $("#alert-correcto").removeClass("animate"); }, 500);
                            
                    setTimeout(function(){ $("#alert-correcto").addClass("hiddenx"); }, 2500);
                    setTimeout(function(){ $("#alert-correcto").addClass("hidden-correcto"); }, 4000);
                    setTimeout(function(){ $("#alert-correcto").removeClass("hiddenx"); }, 4000);

                }
            }
        });
    });             
}
/**
 * Función que anima cuando se cierra la alerta de error
 */
$(document).ready(function(){
    $('#alert-close').click(function(){
        $("#alert-error").addClass("animate");
        setTimeout(function(){ $("#alert-error").addClass("hidden-error"); }, 1500);    
    });

});
$(document).ready(function(){
    $('#alert-closex').click(function(){
        $("#alert-correcto").addClass("animate");
        setTimeout(function(){ $("#alert-correcto").addClass("hidden"); }, 1500);    
    });

});



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



