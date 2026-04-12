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
   CARRUSEL TIPO ARCO (Arc Fan Carousel)
   ========================================== */
;(function() {
    var tarjetas    = document.querySelectorAll('.carrusel-arco-card');
    var btnPrev     = document.getElementById('carrusel-prev');
    var btnNext     = document.getElementById('carrusel-next');
    var indicadores = document.getElementById('carrusel-indicadores');

    if (!tarjetas.length || !btnPrev || !btnNext) return;

    var total        = tarjetas.length;
    var indiceActivo = Math.floor(total / 2);
    var ANGULO_PASO  = 18;
    var OFFSET_X     = 280;
    var OFFSET_Y     = 30;
    var autoplayTimer = null;

    /* Crear indicadores (dots) */
    function crearDots() {
        if (!indicadores) return;
        indicadores.innerHTML = '';
        for (var i = 0; i < total; i++) {
            var dot = document.createElement('button');
            dot.className = 'carrusel-arco-dot' + (i === indiceActivo ? ' arco-dot-activo' : '');
            dot.setAttribute('aria-label', 'Ir a evento ' + (i + 1));
            (function(idx) {
                dot.addEventListener('click', function() { irA(idx); });
            })(i);
            indicadores.appendChild(dot);
        }
    }

    /* Actualizar dots */
    function actualizarDots() {
        if (!indicadores) return;
        var dots = indicadores.querySelectorAll('.carrusel-arco-dot');
        dots.forEach(function(d, i) {
            d.classList.toggle('arco-dot-activo', i === indiceActivo);
        });
    }

    /* Posicionar todas las tarjetas en arco */
    function posicionar() {
        tarjetas.forEach(function(card, i) {
            var offset = i - indiceActivo;
            var absOffset = Math.abs(offset);

            if (absOffset > 2) {
                card.classList.add('arco-oculta');
                card.classList.remove('arco-activa');
                card.style.transform = 'translateX(' + (offset * OFFSET_X) + 'px) rotate(' + (offset * ANGULO_PASO) + 'deg) translateY(' + (absOffset * OFFSET_Y) + 'px)';
                card.style.zIndex = 0;
                return;
            }

            card.classList.remove('arco-oculta');

            var rotacion = offset * ANGULO_PASO;
            var desplazX = offset * OFFSET_X;
            var desplazY = absOffset * OFFSET_Y;
            var escala   = 1 - absOffset * 0.08;
            var zIndex   = 10 - absOffset;

            card.style.transform = 'translateX(' + desplazX + 'px) rotate(' + rotacion + 'deg) translateY(' + desplazY + 'px) scale(' + escala + ')';
            card.style.zIndex = zIndex;

            if (offset === 0) {
                card.classList.add('arco-activa');
            } else {
                card.classList.remove('arco-activa');
            }
        });

        actualizarDots();
    }

    function irA(idx) {
        indiceActivo = ((idx % total) + total) % total;
        posicionar();
        reiniciarAutoplay();
    }

    function siguiente() { irA(indiceActivo + 1); }
    function anterior()  { irA(indiceActivo - 1); }

    function reiniciarAutoplay() {
        if (autoplayTimer) clearInterval(autoplayTimer);
        autoplayTimer = setInterval(siguiente, 5000);
    }

    btnNext.addEventListener('click', siguiente);
    btnPrev.addEventListener('click', anterior);

    var escena = document.getElementById('carrusel-arco-escena');
    if (escena) {
        escena.addEventListener('mouseenter', function() {
            if (autoplayTimer) clearInterval(autoplayTimer);
        });
        escena.addEventListener('mouseleave', reiniciarAutoplay);
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') anterior();
        if (e.key === 'ArrowRight') siguiente();
    });

    crearDots();
    posicionar();
    reiniciarAutoplay();
})();
