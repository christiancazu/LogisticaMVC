/*animaciones del menu lateral*/
$(function() {

    $('#tabs-lateral > li').hover(

        function () {
            $('a',$(this)).stop().animate({'marginLeft':'42px'},750);
        },
        function () {
            $('a',$(this)).stop().animate({'marginLeft':'-70px'},750);           
        }
    );    
});

$('#controlpanel a').click(function(){
    $('#tabs-lateral a').show();
    $('#tabs-lateral a').stop().animate({'marginLeft':'-70px'},1750);  
}); 

$('.xxx').click(function(){
    //$('#tabs-lateral a').hide().animate({'marginLeft':'-132px'},4000);  
    location.reload();   
}); 

$( document ).ready(function() {
     $('#tabs-lateral a').hide();  
});