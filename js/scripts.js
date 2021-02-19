'use strict'
$(document).ready(function(){
    var widthScreen = $(window).width();
    $(":root").css("--width",(widthScreen));

    var height = $(window).height();
    $(":root").css('--height', height);  
    
    $("#upbtn").click(()=>{
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
});