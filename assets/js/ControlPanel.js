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
                    $("#alert-error").removeClass("hidden");
                    $("#alert-error").removeClass("animate"); 
                    
                }
                else {
                    $("#alert-correcto").removeClass("hidden");
                    $("#alert-correcto").removeClass("animate");
                   
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
        setTimeout(function(){ $("#alert-error").addClass("hidden"); }, 1500);    
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



