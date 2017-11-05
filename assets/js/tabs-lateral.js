/*animaciones del menu lateral*/
$( document ).ready(function() {
     $('#tabs-lateral a').hide();  
});
$('#controlpanel a').click(function(){
    $('#tabs-lateral a').show();
    $('#tabs-lateral a').stop().animate({'marginLeft':'-70px'},1750);  
    $(function() {
    $('#tabs-lateral > li').hover(
        function () {
            $('a',$(this)).stop().animate({'marginLeft':'64px'},750);
        },
        function () {
            $('a',$(this)).stop().animate({'marginLeft':'-70px'},750);  
        }
    );    
});      
}); 
$('a[href="#controlpanel"]').click(function(){
    location.reload();    
}); 