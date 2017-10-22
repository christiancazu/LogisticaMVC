$(function() {
    $('#tabs-lateral a').hide();
    $('#tabs-lateral a').stop().animate({'marginLeft':'-132px'},750);
   
    $('#tabs-lateral > li').hover(
              
        function () {
            $('a',$(this)).stop().animate({'marginLeft':'42px'},750);
        },
        function () {
            $('a',$(this)).stop().animate({'marginLeft':'-70px'},750);           
        }
    );    
 
});

$(function() {
    
    

    $('#controlpanel a').click(              
        
        function () {
             $('#tabs-lateral a').show();
            $('#tabs-lateral a').stop().animate({'marginLeft':'-70px'},750);    
        }
        
    );    
 
});

$(function() {      

    $('.xxx').click(              
        
        function () {
            
           $('#tabs-lateral a').hide().animate({'marginLeft':'-132px'},4000);  
            location.reload(); 
        }        
    ); 
    $('.xxx').click(              
        
        function () {
            
           $('#tabs-lateral a').hide().animate({'marginLeft':'-132px'},4000);  
            location.reload(); 
        }        
    ); 
 
});


var Actualizar = function() {
    location.reload();
}


$( document ).ready(function() {
    $('#tabs-lateral a').hide(); 
    
});
