$(function(){

/* ==================================================================
                    NO LIBRAIRIES / CODE JQUERY
====================================================================*/

// Ajout des classes quand on scroll.

$(window).on('scroll', function() {
    var wScroll = $(this).scrollTop();

    // Fixed nav
    wScroll > 1 ? $('#navigation').addClass('bg-nb-opa sticky-nb-border') : $('#navigation').removeClass('bg-nb-opa sticky-nb-border'); 
    wScroll > 1 ? $('.nav-link').addClass('white') : $('.nav-link').removeClass('white');      
    wScroll > 1 ? $('#logo').attr('src', '../img/logo.png') : $('#logo').attr('src', '../img/logo-orange.png');                          
});

// Fonction pour un effet smooth scroll tout les liens du site, soit la navbar.

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

/* ==================================================================
                            LIBRAIRIES
====================================================================*/

/* AOS.JS */

    AOS.init();

/* End AOS.JS */

});