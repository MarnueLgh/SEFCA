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
    if (typeof WOW === 'function') {
        new WOW().init();
    }

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

})(jQuery);

/* ==========================================
   ANIMACIÓN AOS
   ========================================== */
(function inicializar_aos() {
    if (typeof window.AOS === 'undefined') {
        return;
    }

    window.AOS.init({
        duration: 800,
        easing: 'slide',
        once: true
    });
})();

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

/* ==========================================
   ANIMACIÓN DE ACORDEÓN (CONSEJO)
   ========================================== */
(function() {
    var acordeon = document.querySelector('.consejo .custom-accordion');
    if (!acordeon) return;

    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                acordeon.querySelectorAll('.accordion-item').forEach(function(item) {
                    item.classList.add('is-visible');
                });
                observer.disconnect();
            }
        });
    }, { threshold: 0.15 });

    observer.observe(acordeon);
})();

/* ==========================================
   MENÚ MÓVIL DESLIZABLE (SLIDING PANELS)
   ========================================== */
(function ($) {
    "use strict";

    $(document).ready(function () {
        // Al hacer clic en un toggle de dropdown en mobile, deslizar hacia la izquierda
        $('.navbar .dropdown-toggle').on('click', function (e) {
            if (window.innerWidth < 1210) {
                var $collapse = $(this).closest('.navbar-collapse');
                $collapse.addClass('submenu-open');
            }
        });

        // Al hacer clic en el botón de volver atrás, deslizar hacia la derecha y cerrar el dropdown
        $('.navbar .dropdown-back').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            
            var $collapse = $(this).closest('.navbar-collapse');
            $collapse.removeClass('submenu-open');

            // Cerrar el dropdown de Bootstrap programáticamente
            var $toggle = $(this).closest('.dropdown').find('.dropdown-toggle');
            if ($toggle.length) {
                var dropdownInstance = bootstrap.Dropdown.getInstance($toggle[0]);
                if (dropdownInstance) {
                    dropdownInstance.hide();
                }
            }
        });

        // Gestionar la clase nav-open en el body para impedir el scroll
        // y suavizar la entrada/salida vertical del overlay móvil.
        var $collapse = $('#navbarCollapse');
        if ($collapse.length) {
            $collapse.on('show.bs.collapse', function () {
                document.body.classList.add('nav-open');
                $(this).removeClass('is-closing');
            });

            $collapse.on('hide.bs.collapse', function () {
                $(this).removeClass('submenu-open').addClass('is-closing');
            });

            $collapse.on('hidden.bs.collapse', function () {
                document.body.classList.remove('nav-open');
                $(this).removeClass('is-closing submenu-open');

                // Dejar todos los dropdowns cerrados para que la siguiente apertura
                // del menú vuelva siempre al panel principal.
                $(this).find('.dropdown-menu.show').removeClass('show');
                $(this).find('.dropdown-toggle[aria-expanded="true"]').attr('aria-expanded', 'false');
            });
        }
    });
})(jQuery);

/* ==========================================
   DESPLEGABLES DESKTOP: FONDO COMPARTIDO (MORPH)
   ========================================== */
// Descripción: Mantiene un único fondo blanco que se desplaza y cambia de
//              tamaño entre los desplegables del navbar. Solo actúa en
//              escritorio (>= 1210px); en móvil el menú deslizable no se toca.
(function () {
    "use strict";

    var ANCHO_ESCRITORIO = '(min-width: 1210px)';
    var RETARDO_OCULTAR = 120;

    var navbar = document.querySelector('.navbar.fixed-top');

    if (!navbar) {
        return;
    }

    var items_dropdown = navbar.querySelectorAll('.nav-item.dropdown');

    if (!items_dropdown.length) {
        return;
    }

    var fondo = document.createElement('div');
    var flecha = document.createElement('div');
    var temporizador_ocultar = null;

    fondo.className = 'navbar-morph-fondo';
    flecha.className = 'navbar-morph-flecha';
    fondo.setAttribute('aria-hidden', 'true');
    flecha.setAttribute('aria-hidden', 'true');
    navbar.appendChild(fondo);
    navbar.appendChild(flecha);

    // Descripción: Indica si estamos en el ancho donde vive el morph.
    // Retorna: boolean
    function es_escritorio() {
        return window.matchMedia(ANCHO_ESCRITORIO).matches;
    }

    // Descripción: Copia la caja del panel abierto al fondo compartido.
    // Parámetros: item (Element) — el .nav-item.dropdown que se va a mostrar
    function activar_panel(item) {
        var panel = item.querySelector('.dropdown-menu');
        var disparador = item.querySelector('.dropdown-toggle');

        if (!panel || !disparador) {
            return;
        }

        var caja_navbar = navbar.getBoundingClientRect();
        var caja_panel = panel.getBoundingClientRect();
        var caja_disparador = disparador.getBoundingClientRect();

        // Sin ancho medible el panel aún no está en el layout: no hay nada que copiar.
        if (!caja_panel.width) {
            return;
        }

        var centro_disparador = (caja_disparador.left - caja_navbar.left) + (caja_disparador.width / 2);
        var ya_visible = fondo.classList.contains('activo');

        // Primera apertura: colocar sin animar para que aparezca en su sitio
        // y no viaje desde la esquina del navbar. Entre paneles sí se anima.
        if (!ya_visible) {
            fondo.classList.add('sin-transicion');
            flecha.classList.add('sin-transicion');
        }

        fondo.style.setProperty('--morph-x', (caja_panel.left - caja_navbar.left) + 'px');
        fondo.style.setProperty('--morph-y', (caja_panel.top - caja_navbar.top) + 'px');
        fondo.style.setProperty('--morph-ancho', caja_panel.width + 'px');
        fondo.style.setProperty('--morph-alto', caja_panel.height + 'px');

        // La flecha va centrada bajo el enlace y medio cuerpo por encima del panel.
        flecha.style.setProperty('--morph-flecha-x', (centro_disparador - 6) + 'px');
        flecha.style.setProperty('--morph-flecha-y', ((caja_panel.top - caja_navbar.top) - 6) + 'px');

        for (var i = 0; i < items_dropdown.length; i++) {
            items_dropdown[i].classList.toggle('morph-activo', items_dropdown[i] === item);
        }

        if (!ya_visible) {
            // Forzar reflow para que el navegador acepte la posición sin transición.
            void fondo.offsetWidth;
            fondo.classList.remove('sin-transicion');
            flecha.classList.remove('sin-transicion');
        }

        fondo.classList.add('activo');
        flecha.classList.add('activo');
    }

    // Descripción: Apaga el fondo compartido y libera los paneles.
    function ocultar_morph() {
        fondo.classList.remove('activo');
        flecha.classList.remove('activo');

        for (var i = 0; i < items_dropdown.length; i++) {
            items_dropdown[i].classList.remove('morph-activo');
        }
    }

    // Descripción: Oculta con un margen de gracia para que el fondo no
    //              parpadee al cruzar el hueco entre dos enlaces del navbar.
    function programar_ocultar() {
        clearTimeout(temporizador_ocultar);
        temporizador_ocultar = setTimeout(ocultar_morph, RETARDO_OCULTAR);
    }

    function cancelar_ocultar() {
        clearTimeout(temporizador_ocultar);
    }

    for (var i = 0; i < items_dropdown.length; i++) {
        (function (item) {
            function abrir() {
                if (!es_escritorio()) {
                    return;
                }

                cancelar_ocultar();
                activar_panel(item);
            }

            item.addEventListener('mouseenter', abrir);
            item.addEventListener('focusin', abrir);

            // Apertura por clic o teclado: Bootstrap avisa cuando el panel ya está visible.
            item.addEventListener('shown.bs.dropdown', abrir);
            item.addEventListener('hidden.bs.dropdown', function () {
                if (es_escritorio()) {
                    programar_ocultar();
                }
            });
        })(items_dropdown[i]);
    }

    navbar.addEventListener('mouseenter', cancelar_ocultar);
    navbar.addEventListener('mouseleave', programar_ocultar);

    // Al bajar del umbral de escritorio el morph deja de aplicar.
    var consulta_escritorio = window.matchMedia(ANCHO_ESCRITORIO);

    function al_cambiar_ancho(evento) {
        if (!evento.matches) {
            cancelar_ocultar();
            ocultar_morph();
        }
    }

    if (consulta_escritorio.addEventListener) {
        consulta_escritorio.addEventListener('change', al_cambiar_ancho);
    } else if (consulta_escritorio.addListener) {
        // Safari anterior a la versión 14.
        consulta_escritorio.addListener(al_cambiar_ancho);
    }
})();
