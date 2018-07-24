$(function(){

/* ==================================================================
                    NO LIBRAIRIES / CODE JQUERY
====================================================================*/

/* $('body').scrollspy({
    target: '#navigation',
    offset: $(window).height() / 2
});
 */

// On Scroll
/* $(window).on('scroll', function() {
    var wScroll = $(this).scrollTop();

    // Fixed nav
    wScroll > 1 ? $('#navigation').addClass('fixed-top justify-content-around sticky-nb-bg') : $('#navigation').removeClass('fixed-top justify-content-around sticky-nb-bg');
    wScroll > 1 ? $('.nav-link').addClass('sticky-nb-liens') : $('.nav-link').removeClass('sticky-nb-liens');
    wScroll > 1 ? $('#logo').attr('src', 'img/logo.png') : $('#logo').attr('src', 'img/logo-alt.png');
                 
}); */


/* ==================================================================
                            LIBRAIRIES
====================================================================*/

/* AOS.JS */

    AOS.init();

/* END AOS.JS */

/* FULLPAGE.JS */


    $('#fullpage').fullpage({
        //options here
        autoScrolling:true,
        scrollHorizontally: true
    });
    

/* END FULLPAGE.JS */

});






