$(function(){

    AOS.init();
 
    $('#button-nav,.uk-offcanvas-close').click(function(){
        $('#button-nav').fadeToggle(1000);
    }); 

    /* if($('.uk-offcanvas').css("display") == "none"){
        $('#button-nav').show();
        alert('oui');
    } */
    /* if($('.uk-offcanvas').css("display") == "none" && $('#button-nav').css("display") == "none"){

        $('#button-nav').removeClass('none').addClass('d-block');
       
        alert('oui');
    } */

});





