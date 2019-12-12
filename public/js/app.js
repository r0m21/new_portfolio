$(function(){

// Smooth scroll au click des boutons next / nav.

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        if(window.innerWidth > 1200) {
            position = sections.indexOf(document.querySelector(this.getAttribute('href')));
        }
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Effet smooth au scroll souris.
if(window.innerWidth > 1200) {
    var position = 0, locked = false, sections = [ $('#homepage')[0], $('#about')[0], $('#projets')[0] ], scroll = $('#main');
    scroll.css({
        "overflow":"hidden",
        "width": "100vw",
        "height": "100vh"
    })
    .off("wheel")
    .on("wheel", function(e) {
        e.preventDefault();
        e.stopPropagation();

        if( locked == false ) {
            var deltaY = e.originalEvent.deltaY, deltaX = e.originalEvent.deltaX;
            setPos( (deltaY > 0 ? (position < sections.length-1 ? position+1 : sections.length-1) : (position > 0 ? position-1 : 0)) );
        }
    });

    function setPos(pos) {
        var prevPos = position;
        //Si pos non spécifié, met à jour le scroll en fonction de la position
        pos = (pos != null && pos != undefined) ? pos : position;

        if(pos < sections.length && pos >= 0 && locked == false) {
            locked = true;
            scroll.animate({
                scrollTop: sections[pos].offsetTop,
            },{
                duration: 800,
                complete: function() {
                position = pos;
                locked = false;
                },
            });
        }
    }
}
// Menu

$(document).on('click', '#button-nav', function(){
    $('#nav-mobile').width('100%');
    $('body').css('overflow','hidden');
});
$(document).on('click', '#close-nav, a', function(){
    $('#nav-mobile').width('0');
    $('body').css('overflow','visible');
});

});