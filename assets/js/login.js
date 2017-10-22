/*Evento on activa la función al cargar la página*/
$(document).on("ready",main());
/**
 * Función que se ejecuta al intentar loguear
 */
function main(){

    $("#form-login").submit(function(event){
        event.preventDefault();
        $.ajax({
            url:$(this).attr("action"),
            type:$(this).attr("method"),
            data:$(this).serialize(),
            success:function(resultado){
                if(resultado==="error"){
                    $("#alert-error").removeClass("hidden");
                    $("#alert-error").removeClass("animate");
                }
                else window.location.href = "Controlpanel";
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

/**
 * Función que anima cuando se cierra la alerta de error
 */
$(document).ready(function(){
    $('#alert-close').click(function(){
        $("#alert-error").addClass("animate");
        setTimeout(function(){ $("#alert-error").addClass("hidden"); }, 1500);
    });
});

/**Funcion Para cerrar sesion
*/

