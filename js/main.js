(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 500);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();
    
    /*
        Fecha: 06/04/2026
        Descripción: Cambio de color del navbar al hacer scroll y su desaparición COMENTADO


        // Fixed Navbar
        $('.fixed-top').css('top', $('.top-bar').height());
        $(window).scroll(function () {
            if ($(this).scrollTop()) {
                $('.fixed-top').addClass('bg-dark').css('top', 0);
            } else {
                $('.fixed-top').removeClass('bg-dark').css('top', $('.top-bar').height());
            }
        });
    */

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: false,
        smartSpeed: 1500,
        loop: true,
        nav: true,
        dots: false,
        items: 1,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: false,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: false,
        nav: true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    
})(jQuery);

/* ==========================================
   CARRUSEL DE EVENTOS RECIENTES
   ========================================== */
(function initCarrusel() {
    function iniciar() {
        var pista      = document.getElementById('carrusel-pista');
        var viewport   = document.getElementById('carrusel-viewport');
        var btnPrev    = document.getElementById('carrusel-prev');
        var btnNext    = document.getElementById('carrusel-next');

        if (!pista || !viewport || !btnPrev || !btnNext) return;

        var cards = pista.querySelectorAll('.carrusel-card');
        if (!cards.length) return;

        var indice        = 0;
        var autoplayTimer = null;

        /* Calcular cuántas cards caben y el ancho de desplazamiento */
        function getDatos() {
            var gap       = parseFloat(getComputedStyle(pista).gap) || 24;
            var cardWidth = cards[0].offsetWidth + gap;
            var visible   = Math.round(viewport.offsetWidth / cardWidth);
            var maxIndice = Math.max(0, cards.length - visible);
            return { cardWidth: cardWidth, maxIndice: maxIndice };
        }

        function posicionar() {
            var datos = getDatos();
            if (indice > datos.maxIndice) indice = datos.maxIndice;
            pista.style.transform = 'translateX(-' + (indice * datos.cardWidth) + 'px)';
        }

        function siguiente() {
            var datos = getDatos();
            indice = indice < datos.maxIndice ? indice + 1 : 0;
            posicionar();
            reiniciarAutoplay();
        }

        function anterior() {
            var datos = getDatos();
            indice = indice > 0 ? indice - 1 : datos.maxIndice;
            posicionar();
            reiniciarAutoplay();
        }

        /* Autoplay */
        function reiniciarAutoplay() {
            if (autoplayTimer) clearInterval(autoplayTimer);
            autoplayTimer = setInterval(siguiente, 5000);
        }

        /* Eventos */
        btnNext.addEventListener('click', siguiente);
        btnPrev.addEventListener('click', anterior);

        viewport.addEventListener('mouseenter', function() {
            if (autoplayTimer) clearInterval(autoplayTimer);
        });
        viewport.addEventListener('mouseleave', reiniciarAutoplay);

        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') anterior();
            if (e.key === 'ArrowRight') siguiente();
        });

        /* Resize */
        var resizeTimer = null;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(posicionar, 150);
        });

        /* Iniciar */
        posicionar();
        reiniciarAutoplay();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', iniciar);
    } else {
        iniciar();
    }
})();
