$(function(){

/* ==================================================================
                    NO LIBRAIRIES / CODE JQUERY
====================================================================*/

// Fonction pour un effet smooth scroll tout les liens du site, soit la navbar.

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

$(document).on('click', '#button-nav', function(){
    $('#nav-mobile').width('100%');
    $('body').css('overflow','hidden');
});
$(document).on('click', '#close-nav, a', function(){
    $('#nav-mobile').width('0');
    $('body').css('overflow','visible');
});


/* ==================================================================
                            LIBRAIRIES
====================================================================*/

/* AOS.JS */

    AOS.init();

/* End AOS.JS */

});