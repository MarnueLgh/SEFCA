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
   TYPEWRITER: CITA DE INDEX
   ========================================== */
(function inicializar_typewriter_cita() {
	var cita = document.querySelector('.cita-typewriter');
	if (!cita) {
		return;
	}

	if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		return;
	}

	var velocidad = parseInt(cita.getAttribute('data-typewriter-speed'), 10) || 22;
	var retraso = parseInt(cita.getAttribute('data-typewriter-delay'), 10) || 250;

	var texto_accesible = cita.textContent.replace(/\s+/g, ' ').trim();
	if (texto_accesible) {
		cita.setAttribute('aria-label', texto_accesible);
	}

	var contenedor_texto = document.createElement('span');
	contenedor_texto.className = 'cita-typewriter-text';
	contenedor_texto.setAttribute('aria-hidden', 'true');
	contenedor_texto.innerHTML = cita.innerHTML;

	cita.innerHTML = '';
	cita.appendChild(contenedor_texto);

	var caracteres = [];

	function envolver_textos(nodo) {
		var hijos = Array.prototype.slice.call(nodo.childNodes);

		hijos.forEach(function (hijo) {
			if (hijo.nodeType === Node.TEXT_NODE) {
				var texto = hijo.textContent;
				if (!texto) {
					return;
				}

				var fragmento = document.createDocumentFragment();
				for (var i = 0; i < texto.length; i++) {
					var caracter = document.createElement('span');
					caracter.className = 'cita-typewriter-char';
					caracter.textContent = texto.charAt(i);
					fragmento.appendChild(caracter);
					caracteres.push(caracter);
				}

				hijo.parentNode.replaceChild(fragmento, hijo);
				return;
			}

			if (hijo.nodeType === Node.ELEMENT_NODE) {
				envolver_textos(hijo);
			}
		});
	}

	envolver_textos(contenedor_texto);

	function iniciar_animacion() {
		if (contenedor_texto.classList.contains('cita-typewriter-iniciada')) {
			return;
		}

		contenedor_texto.classList.add('cita-typewriter-iniciada', 'cita-typewriter-activa');

		setTimeout(function () {
			var indice = 0;
			var temporizador = setInterval(function () {
				if (indice >= caracteres.length) {
					clearInterval(temporizador);
					contenedor_texto.classList.remove('cita-typewriter-activa');
					return;
				}

				caracteres[indice].style.display = 'inline';
				indice++;
			}, velocidad);
		}, retraso);
	}

	if ('IntersectionObserver' in window) {
		var observador = new IntersectionObserver(function (entradas, obs) {
			entradas.forEach(function (entrada) {
				if (entrada.isIntersecting) {
					iniciar_animacion();
					obs.disconnect();
				}
			});
		}, { threshold: 0.45 });

		observador.observe(cita);
		return;
	}

	iniciar_animacion();
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
