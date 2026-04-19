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
   COMPENSACIÓN DE NAVBAR FIJO
   ========================================== */
(function compensarNavbarFijo() {
    var selector_navbar = '.navbar.fixed-top';
    var raiz = document.documentElement;
    var temporizador_resize = null;

    function actualizarOffsetNavbar() {
        var navbar = document.querySelector(selector_navbar);
        var altura = navbar ? Math.ceil(navbar.getBoundingClientRect().height) : 0;
        raiz.style.setProperty('--alto-navbar', altura + 'px');
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', actualizarOffsetNavbar);
    } else {
        actualizarOffsetNavbar();
    }

    window.addEventListener('load', actualizarOffsetNavbar);
    window.addEventListener('resize', function () {
        clearTimeout(temporizador_resize);
        temporizador_resize = setTimeout(actualizarOffsetNavbar, 120);
    });
})();

/* ==========================================
   CARRUSEL DE EVENTOS RECIENTES
   ========================================== */
    $(".eventos-carousel").owlCarousel({
        autoplay: false,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        nav: true,
        dots: false,
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
