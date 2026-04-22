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
            $('.back-to-top').stop(true, true).fadeIn(200);
        } else {
            $('.back-to-top').stop(true, true).fadeOut(200);
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').stop().animate({ scrollTop: 0 }, 200, 'easeInOutExpo');
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
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
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
    navText: [
        '<i class="bi bi-chevron-left"></i>',
        '<i class="bi bi-chevron-right"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        992: {
            items: 3
        }
    }
});

/* ==========================================
   CARRUSEL DE ENTREVISTAS
   ========================================== */
(function inicializar_carrusel_entrevistas($) {
    if (!$('.entrevistas-carousel').length) {
        return;
    }

    function obtener_items_visibles_entrevistas() {
        var ancho_ventana = window.innerWidth || document.documentElement.clientWidth;

        if (ancho_ventana >= 992) {
            return 3;
        }

        if (ancho_ventana >= 768) {
            return 2;
        }

        return 1;
    }

    function actualizar_navegacion_entrevistas(carrusel_entrevistas, cantidad_entrevistas) {
        var items_visibles = obtener_items_visibles_entrevistas();
        var mostrar_navegacion = cantidad_entrevistas > items_visibles;

        carrusel_entrevistas.toggleClass('entrevistas-sin-navegacion', !mostrar_navegacion);
    }

    $('.entrevistas-carousel').each(function () {
        var carrusel_entrevistas = $(this);
        var cantidad_entrevistas = carrusel_entrevistas.children('.entrevista-slide').length;
        var activar_bucle = cantidad_entrevistas > 3;
        var activar_centro = cantidad_entrevistas > 3;
        var activar_navegacion = cantidad_entrevistas > 1;

        if (!cantidad_entrevistas) {
            return;
        }

        carrusel_entrevistas.toggleClass('entrevistas-sin-centro', !activar_centro);

        carrusel_entrevistas.owlCarousel({
            autoplay: false,
            smartSpeed: 1000,
            margin: 25,
            loop: activar_bucle,
            center: activar_centro,
            nav: activar_navegacion,
            dots: false,
            navText: [
                '<i class="bi bi-chevron-left"></i>',
                '<i class="bi bi-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            },
            onInitialized: function () {
                actualizar_navegacion_entrevistas(carrusel_entrevistas, cantidad_entrevistas);
            },
            onResized: function () {
                actualizar_navegacion_entrevistas(carrusel_entrevistas, cantidad_entrevistas);
            },
            onRefreshed: function () {
                actualizar_navegacion_entrevistas(carrusel_entrevistas, cantidad_entrevistas);
            }
        });
    });
})(jQuery);
