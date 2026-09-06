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

    // Descripción: El .nav-item no llega hasta abajo del navbar (queda centrado),
    //              así que "top: 100%" dejaría el panel encimado sobre la barra.
    //              Aquí se mide ese hueco para bajar el panel hasta el borde.
    function actualizar_desfase_panel() {
        if (!es_escritorio()) {
            return;
        }

        var caja_navbar = navbar.getBoundingClientRect();
        var caja_item = items_dropdown[0].getBoundingClientRect();

        navbar.style.setProperty('--desfase-panel', (caja_navbar.bottom - caja_item.bottom) + 'px');
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

    // El alto del navbar depende de los logos, así que se remide cuando ya
    // cargaron y en cada cambio de tamaño (mismo debounce que compensarNavbarFijo).
    var temporizador_desfase = null;

    actualizar_desfase_panel();
    window.addEventListener('load', actualizar_desfase_panel);
    window.addEventListener('resize', function () {
        clearTimeout(temporizador_desfase);
        temporizador_desfase = setTimeout(actualizar_desfase_panel, 120);
    });

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


/*
    LISTADO DE EVENTOS: filtros, paginación y lightbox.

    Vive aquí y no en la página para que eventos.php, conferencias.php,
    tomas_protesta.php y egresados_distinguidos.php compartan un solo bloque
    de comportamiento en vez de llevar cada una su copia.

    Se activa únicamente si la página renderizó includes/listado_eventos.php.
    El sidebar de filtros es opcional: cuando la página tiene menos de dos años
    distintos no se dibuja, y este bloque sigue funcionando sin él.
*/
(function () {
    "use strict";

    document.addEventListener('DOMContentLoaded', function () {
        var grid = document.getElementById('eventos-grid');

        if (!grid) {
            return;
        }

        var gruposPills = document.querySelectorAll('.filtro-pills');
        var btnLimpiar = document.getElementById('filtro-limpiar');
        var mensajeVacio = document.getElementById('filtro-vacio');
        var tarjetas = document.querySelectorAll('#eventos-grid .evento-card');
        var navPaginacion = document.getElementById('paginacion');
        var POR_PAGINA = 5;
        var paginaActual = 1;
        var filtrosActivos = { tipo: 'todos', mes: 'todos', anio: 'todos' };

        gruposPills.forEach(function (grupo) {
            var nombreFiltro = grupo.dataset.filter;
            var botones = grupo.querySelectorAll('.boton-sm-filtro');

            botones.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    botones.forEach(function (boton) { boton.classList.remove('activo'); });
                    btn.classList.add('activo');
                    filtrosActivos[nombreFiltro] = btn.dataset.value;
                    paginaActual = 1;
                    filtrarYPaginar();
                });
            });
        });

        function obtenerFiltradas() {
            var resultado = [];

            tarjetas.forEach(function (tarjeta) {
                var coincideTipo = filtrosActivos.tipo === 'todos' || tarjeta.dataset.tipo === filtrosActivos.tipo;
                var coincideMes = filtrosActivos.mes === 'todos' || tarjeta.dataset.mes === filtrosActivos.mes;
                var coincideAnio = filtrosActivos.anio === 'todos' || tarjeta.dataset.anio === filtrosActivos.anio;

                if (coincideTipo && coincideMes && coincideAnio) {
                    resultado.push(tarjeta);
                }
            });

            return resultado;
        }

        function filtrarYPaginar() {
            grid.style.transition = 'opacity 0.3s ease';
            grid.style.opacity = '0';

            setTimeout(function () {
                var filtradas = obtenerFiltradas();
                var totalPaginas = Math.ceil(filtradas.length / POR_PAGINA) || 1;
                var inicio = 0;
                var fin = 0;

                if (paginaActual > totalPaginas) {
                    paginaActual = totalPaginas;
                }

                if (paginaActual < 1) {
                    paginaActual = 1;
                }

                inicio = (paginaActual - 1) * POR_PAGINA;
                fin = inicio + POR_PAGINA;

                tarjetas.forEach(function (tarjeta) { tarjeta.style.display = 'none'; });
                filtradas.forEach(function (tarjeta, indice) {
                    tarjeta.style.display = indice >= inicio && indice < fin ? '' : 'none';
                });

                if (mensajeVacio) {
                    mensajeVacio.style.display = filtradas.length === 0 ? 'block' : 'none';
                }

                renderPaginacion(totalPaginas, filtradas.length);
                grid.style.opacity = '1';
            }, 300);
        }

        function renderPaginacion(totalPaginas, totalItems) {
            if (!navPaginacion) {
                return;
            }

            navPaginacion.innerHTML = '';

            if (totalPaginas <= 1) {
                return;
            }

            var info = document.createElement('span');
            var inicio = (paginaActual - 1) * POR_PAGINA + 1;
            var fin = Math.min(paginaActual * POR_PAGINA, totalItems);
            var contenedor = document.createElement('div');
            var btnPrev = document.createElement('button');
            var paginas = calcularRangoPaginas(paginaActual, totalPaginas);
            var btnNext = document.createElement('button');

            info.className = 'paginacion-info';
            info.textContent = inicio + '-' + fin + ' de ' + totalItems;
            navPaginacion.appendChild(info);

            contenedor.className = 'paginacion-botones';

            btnPrev.className = 'paginacion-btn paginacion-flecha';
            btnPrev.innerHTML = '<i class="fas fa-chevron-left"></i>';
            btnPrev.disabled = paginaActual === 1;
            btnPrev.setAttribute('aria-label', 'Página anterior');
            btnPrev.addEventListener('click', function () {
                if (paginaActual > 1) {
                    paginaActual--;
                    filtrarYPaginar();
                    scrollAlGrid();
                }
            });
            contenedor.appendChild(btnPrev);

            paginas.forEach(function (pagina) {
                if (pagina === '...') {
                    var puntos = document.createElement('span');
                    puntos.className = 'paginacion-puntos';
                    puntos.textContent = '...';
                    contenedor.appendChild(puntos);
                    return;
                }

                var btn = document.createElement('button');
                btn.className = 'paginacion-btn' + (pagina === paginaActual ? ' paginacion-activa' : '');
                btn.textContent = pagina;
                btn.setAttribute('aria-label', 'Ir a la página ' + pagina);

                if (pagina === paginaActual) {
                    btn.setAttribute('aria-current', 'page');
                }

                btn.addEventListener('click', function () {
                    paginaActual = pagina;
                    filtrarYPaginar();
                    scrollAlGrid();
                });
                contenedor.appendChild(btn);
            });

            btnNext.className = 'paginacion-btn paginacion-flecha';
            btnNext.innerHTML = '<i class="fas fa-chevron-right"></i>';
            btnNext.disabled = paginaActual === totalPaginas;
            btnNext.setAttribute('aria-label', 'Página siguiente');
            btnNext.addEventListener('click', function () {
                if (paginaActual < totalPaginas) {
                    paginaActual++;
                    filtrarYPaginar();
                    scrollAlGrid();
                }
            });
            contenedor.appendChild(btnNext);

            navPaginacion.appendChild(contenedor);
        }

        function calcularRangoPaginas(actual, total) {
            var paginas = [1];
            var inicio = 0;
            var fin = 0;
            var i = 0;

            if (total <= 5) {
                paginas = [];

                for (i = 1; i <= total; i++) {
                    paginas.push(i);
                }

                return paginas;
            }

            if (actual > 3) {
                paginas.push('...');
            }

            inicio = Math.max(2, actual - 1);
            fin = Math.min(total - 1, actual + 1);

            for (i = inicio; i <= fin; i++) {
                paginas.push(i);
            }

            if (actual < total - 2) {
                paginas.push('...');
            }

            paginas.push(total);
            return paginas;
        }

        function scrollAlGrid() {
            var offset = grid.getBoundingClientRect().top + window.pageYOffset - 100;
            window.scrollTo({ top: offset, behavior: 'smooth' });
        }

        if (btnLimpiar) {
            btnLimpiar.addEventListener('click', function () {
                filtrosActivos = { tipo: 'todos', mes: 'todos', anio: 'todos' };
                paginaActual = 1;

                gruposPills.forEach(function (grupo) {
                    var botones = grupo.querySelectorAll('.boton-sm-filtro');
                    botones.forEach(function (boton) { boton.classList.remove('activo'); });
                    botones[0].classList.add('activo');
                });

                filtrarYPaginar();
            });
        }

        filtrarYPaginar();

        var lightboxOverlay = document.getElementById('lightboxOverlay');
        var lightboxImg = document.getElementById('lightboxImg');
        var lightboxCerrar = document.getElementById('lightboxCerrar');
        var imagenesEvento = document.querySelectorAll('.evento-card-img');

        if (!lightboxOverlay || !lightboxImg) {
            return;
        }

        function cerrar_lightbox() {
            lightboxOverlay.classList.remove('activo');
        }

        imagenesEvento.forEach(function (imgContainer) {
            imgContainer.addEventListener('click', function () {
                var img = this.querySelector('img');

                if (img) {
                    lightboxImg.src = img.src;
                    lightboxOverlay.classList.add('activo');
                }
            });
        });

        if (lightboxCerrar) {
            lightboxCerrar.addEventListener('click', cerrar_lightbox);
        }

        lightboxOverlay.addEventListener('click', function (e) {
            if (e.target === lightboxOverlay) {
                cerrar_lightbox();
            }
        });

        // Cerrar con Escape: el lightbox no tenia salida por teclado.
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && lightboxOverlay.classList.contains('activo')) {
                cerrar_lightbox();
            }
        });
    });
})();
