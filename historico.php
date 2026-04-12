<!DOCTYPE html>
<html lang="es">

<?php require_once("includes/head.php"); ?>



<body>
    <?php include("includes/spinner.php"); ?>
    <?php include("includes/navbar.php"); ?>

    <!-- Hero -->
    <?php
        $heroTitulo = "Histórico";
        $heroTexto  = "Actividades, reconocimientos y celebraciones de la Sociedad de Egresados de la FCA.";
        include("includes/hero-pagina.php");
    ?>

    <!-- ==========================================
         LAYOUT 2 COLUMNAS: SIDEBAR + WRAPPER
         ========================================== -->
    <div class="galeria-layout">

        <!-- ===== SIDEBAR DE FILTROS ===== -->
        <aside class="galeria-sidebar" id="galeria-sidebar">

            <!-- Header -->
            <div class="filtro-sidebar-header">
                <span class="filtro-sidebar-titulo">Filtros</span>
                <button class="filtro-limpiar" id="filtro-limpiar" title="Limpiar filtros">
                    <i class="fas fa-trash-alt"></i> Limpiar
                </button>
            </div>

            <!-- Por tipo -->
            <div class="filtro-grupo">
                <span class="filtro-etiqueta">Por tipo:</span>
                <div class="filtro-pills" data-filter="tipo">
                    <button class="boton-sm-filtro activo" data-value="todos">Todos</button>
                    <button class="boton-sm-filtro" data-value="evento">Eventos</button>
                    <button class="boton-sm-filtro" data-value="conferencia">Conferencias</button>
                    <button class="boton-sm-filtro" data-value="convocatoria">Convocatorias</button>
                    <button class="boton-sm-filtro" data-value="proyecto">Proyectos</button>
                </div>
            </div>

            <!-- Por mes -->
            <div class="filtro-grupo">
                <span class="filtro-etiqueta">Por mes:</span>
                <div class="filtro-pills" data-filter="mes">
                    <button class="boton-sm-filtro activo" data-value="todos">Todos</button>
                    <button class="boton-sm-filtro" data-value="1">Ene</button>
                    <button class="boton-sm-filtro" data-value="2">Feb</button>
                    <button class="boton-sm-filtro" data-value="3">Mar</button>
                    <button class="boton-sm-filtro" data-value="4">Abr</button>
                    <button class="boton-sm-filtro" data-value="5">May</button>
                    <button class="boton-sm-filtro" data-value="6">Jun</button>
                    <button class="boton-sm-filtro" data-value="7">Jul</button>
                    <button class="boton-sm-filtro" data-value="8">Ago</button>
                    <button class="boton-sm-filtro" data-value="9">Sep</button>
                    <button class="boton-sm-filtro" data-value="10">Oct</button>
                    <button class="boton-sm-filtro" data-value="11">Nov</button>
                    <button class="boton-sm-filtro" data-value="12">Dic</button>
                </div>
            </div>

            <!-- Por año -->
            <div class="filtro-grupo">
                <span class="filtro-etiqueta">Por año:</span>
                <div class="filtro-pills" data-filter="anio">
                    <button class="boton-sm-filtro activo" data-value="todos">Todos</button>
                    <button class="boton-sm-filtro" data-value="2026">2026</button>
                    <button class="boton-sm-filtro" data-value="2025">2025</button>
                    <button class="boton-sm-filtro" data-value="2024">2024</button>
                    <button class="boton-sm-filtro" data-value="2023">2023</button>
                </div>
            </div>

        </aside>

        <!-- ===== WRAPPER (solo artículos) ===== -->
        <div class="galeria-wrapper">
            <div class="galeria-main">

                <!-- Mensaje cuando no hay resultados -->
                <p class="filtro-vacio" id="filtro-vacio" style="display:none;">
                    No se encontraron eventos con los filtros seleccionados.
                </p>

                <!-- ==========================================
                     LISTADO DE EVENTOS
                     ==========================================
                     Cada <article> lleva atributos de filtrado:
                       data-tipo  → evento | conferencia | convocatoria | proyecto
                       data-mes   → 1-12
                       data-anio  → Año (ej. 2025)
                     Al agregar un nuevo evento, copia un bloque <article>
                     y actualiza estos tres atributos.
                     ========================================== -->
                <div class="eventos-grid" id="eventos-grid">

                    <!-- ========== Aulas dignas ========== -->
                    <article class="evento-card" data-tipo="proyecto" data-mes="7" data-anio="2025">
                        <div class="evento-card-img">
                            <img src="img/fca/aulas_proyecto.jpg" alt="Aulas dignas de la FCA">
                        </div>
                        <div class="evento-card-cuerpo">
                            <div class="evento-card-meta">
                                <span class="evento-card-tag evento-card-tag-proyecto">Proyecto</span>
                                <span class="evento-card-fecha">Fecha por definir</span>
                            </div>
                            <h2 class="evento-card-titulo">Aulas dignas de la FCA</h2>
                            <p class="evento-card-desc">
                                La SEFCA se complace en presentar el proyecto "Aulas dignas de la FCA", una iniciativa que busca mejorar las condiciones de los espacios académicos de nuestra Facultad.
                            </p>
                            <a class="evento-card-enlace" href="docs/resumen_aulas.pdf" target="_blank">
                                Ver más <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- ========== Concurso de Ensayo SEFCA 2025 ========== -->
                    <article class="evento-card" data-tipo="convocatoria" data-mes="9" data-anio="2025">
                        <div class="evento-card-img">
                            <img src="img/concurso_ensayo.jpg" alt="Concurso de Ensayo SEFCA 2025">
                        </div>
                        <div class="evento-card-cuerpo">
                            <div class="evento-card-meta">
                                <span class="evento-card-tag evento-card-tag-convocatoria">Convocatoria</span>
                                <span class="evento-card-fecha">4 de septiembre de 2025</span>
                            </div>
                            <h2 class="evento-card-titulo">Convocatoria Concurso de Ensayo SEFCA 2025</h2>
                            <p class="evento-card-desc">
                                Convocatoria abierta para participar en el Concurso de Ensayo organizado por la SEFCA UNAM.
                            </p>
                            <a class="evento-card-enlace" href="docs/concurso_ensayo_SEFCA_25.pdf" target="_blank">
                                Ver más <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- ========== Visita Alfredo Harp Helú ========== -->
                    <article class="evento-card" data-tipo="evento" data-mes="3" data-anio="2025">
                        <div class="evento-card-img">
                            <img src="img/250324_Visita_de_Alfredo_Harp_Helu.jpg" alt="Visita de Alfredo Harp Helú">
                        </div>
                        <div class="evento-card-cuerpo">
                            <div class="evento-card-meta">
                                <span class="evento-card-tag evento-card-tag-evento">Evento</span>
                                <span class="evento-card-fecha">24 de marzo de 2025</span>
                            </div>
                            <h2 class="evento-card-titulo">Visita de Alfredo Harp Helú</h2>
                            <p class="evento-card-desc">
                                Visita del empresario y filántropo Alfredo Harp Helú a las instalaciones de la Facultad de 
                                Contaduría y Administración.
                            </p>
                            <a class="evento-card-enlace" href="evento.php?evento=alfredo_helu">
                                Ver galería <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- ========== Toma de protesta 2024-2026 ========== -->
                    <article class="evento-card" data-tipo="evento" data-mes="10" data-anio="2024">
                        <div class="evento-card-img">
                            <img src="img/toma_protesta_2024.jpg" alt="Toma de protesta de la mesa directiva 2024-2026">
                        </div>
                        <div class="evento-card-cuerpo">
                            <div class="evento-card-meta">
                                <span class="evento-card-tag evento-card-tag-evento">Evento</span>
                                <span class="evento-card-fecha">17 de octubre de 2024</span>
                            </div>
                            <h2 class="evento-card-titulo">Toma de protesta de la mesa directiva 2024-2026</h2>
                            <p class="evento-card-desc">
                                Ceremonia de toma de protesta de la mesa directiva de la Sociedad de Egresados de la FCA para el periodo 2024-2026.
                            </p>
                            <a class="evento-card-enlace" href="docs/toma_protesta_2024-2026.pdf" target="_blank">
                                Ver más <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- ========== Informe de actividades 2022-2023 ========== -->
                    <article class="evento-card" data-tipo="evento" data-mes="6" data-anio="2023">
                        <div class="evento-card-img">
                            <img src="img/informe_actividades.jpg" alt="Informe de actividades 2022-2023">
                        </div>
                        <div class="evento-card-cuerpo">
                            <div class="evento-card-meta">
                                <span class="evento-card-tag evento-card-tag-evento">Evento</span>
                                <span class="evento-card-fecha">8 de junio de 2023</span>
                            </div>
                            <h2 class="evento-card-titulo">Informe de actividades 2022 – 2023</h2>
                            <p class="evento-card-desc">
                                Presentación del informe de actividades de la Sociedad de Egresados correspondiente al periodo 2022-2023.
                            </p>
                            <a class="evento-card-enlace" href="docs/informe_actividades.pdf" target="_blank">
                                Ver más <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- ========== Reconocimiento Paola Reynoso ========== -->
                    <article class="evento-card" data-tipo="evento" data-mes="6" data-anio="2023">
                        <div class="evento-card-img">
                            <img src="img/paola1.jpg" alt="Entrega de Reconocimiento a Paola Reynoso">
                        </div>
                        <div class="evento-card-cuerpo">
                            <div class="evento-card-meta">
                                <span class="evento-card-tag evento-card-tag-evento">Evento</span>
                                <span class="evento-card-fecha">8 de junio de 2023</span>
                            </div>
                            <h2 class="evento-card-titulo">Entrega de Reconocimiento a Paola Reynoso</h2>
                            <p class="evento-card-desc">
                                En sesión conjunta del Consejo Directivo y del Consejo Consultivo, se hizo entrega de un 
                                Diploma SEFCA UNAM a Paola Reynoso, egresada distinguida de la FCA, en reconocimiento a 
                                que obtuvo el Primer Lugar del Premio Internacional Universia Santander 2023.
                            </p>
                            <a class="evento-card-enlace" href="img/agradecimiento_paola.jpg" target="_blank">
                                Ver más <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- ========== 30 Aniversario de Egresados ========== -->
                    <article class="evento-card" data-tipo="evento" data-mes="3" data-anio="2023">
                        <div class="evento-card-img">
                            <img src="img/egresados.jpg" alt="30 aniversario de egresados">
                        </div>
                        <div class="evento-card-cuerpo">
                            <div class="evento-card-meta">
                                <span class="evento-card-tag evento-card-tag-evento">Evento</span>
                                <span class="evento-card-fecha">1 de marzo de 2023</span>
                            </div>
                            <h2 class="evento-card-titulo">30 aniversario de egresados de la SEFCA</h2>
                            <p class="evento-card-desc">
                                Celebración del trigésimo aniversario de la Sociedad de Egresados en el Palacio de Autonomía. 
                                Evento conmemorativo con la presencia de autoridades y miembros distinguidos.
                            </p>
                            <a class="evento-card-enlace" href="evento.php?evento=30_aniversario">
                                Ver galería <i class="fas fa-arrow-right"></i>
                            </a>
                            <a class="evento-card-enlace evento-card-enlace-secundario" href="img/articulo_30_aniversario_gaceta.jpg" target="_blank">
                                Ver en Gaceta UNAM <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- ========== Primer ciclo de conferencias magistrales ========== -->
                    <article class="evento-card" data-tipo="conferencia" data-mes="9" data-anio="2022">
                        <div class="evento-card-img">
                            <img src="img/ciclo1.jpg" alt="Primer ciclo de conferencias magistrales">
                        </div>
                        <div class="evento-card-cuerpo">
                            <div class="evento-card-meta">
                                <span class="evento-card-tag evento-card-tag-conferencia">Conferencia</span>
                                <span class="evento-card-fecha">5 de septiembre de 2022</span>
                            </div>
                            <h2 class="evento-card-titulo">Primer ciclo de conferencias magistrales</h2>
                            <p class="evento-card-desc">
                                Diferentes ponentes tienen la oportunidad de compartir su experiencia y trayectoria en estas ponencias dirigidas a la comunidad FCA.
                            </p>
                            <a class="evento-card-enlace" href="img/ciclo1.jpg" target="_blank">
                                Ver más <i class="fas fa-arrow-right"></i>
                            </a>
                            <a class="evento-card-enlace evento-card-enlace-secundario" href="https://www.youtube.com/watch?v=-VPJKdsu_wQ&list=PLEcS-HQTcBAoY--ot6Kw53cZOxbaTi_H8" target="_blank">
                                Ver en Youtube <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- ========== Segundo ciclo de conferencias magistrales ========== -->
                    <article class="evento-card" data-tipo="conferencia" data-mes="11" data-anio="2022">
                        <div class="evento-card-img">
                            <img src="img/ciclo2.jpg" alt="Segundo ciclo de conferencias magistrales">
                        </div>
                        <div class="evento-card-cuerpo">
                            <div class="evento-card-meta">
                                <span class="evento-card-tag evento-card-tag-conferencia">Conferencia</span>
                                <span class="evento-card-fecha">14 de noviembre de 2022</span>
                            </div>
                            <h2 class="evento-card-titulo">Segundo ciclo de conferencias magistrales</h2>
                            <p class="evento-card-desc">
                                Diferentes ponentes tienen la oportunidad de compartir su experiencia y trayectoria en estas ponencias dirigidas a la comunidad FCA.
                            </p>
                            <a class="evento-card-enlace" href="img/ciclo2.jpg" target="_blank">
                                Ver más <i class="fas fa-arrow-right"></i>
                            </a>
                            <a class="evento-card-enlace evento-card-enlace-secundario" href="https://www.youtube.com/watch?v=HyzQ4AvFVjM&list=PLEcS-HQTcBAqe98ozaZYXusliQhWq8Wmx" target="_blank">
                                Ver en Youtube <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <!-- ========== Cuarto ciclo de conferencias magistrales ========== -->
                    <article class="evento-card" data-tipo="conferencia" data-mes="9" data-anio="2025">
                        <div class="evento-card-img">
                            <img src="img/Cartel_Conferencia_Lic_Isaac_Chertorivski.jpg" alt="Cuarto ciclo de conferencias magistrales">
                        </div>
                        <div class="evento-card-cuerpo">
                            <div class="evento-card-meta">
                                <span class="evento-card-tag evento-card-tag-conferencia">Conferencia</span>
                                <span class="evento-card-fecha">30 de septiembre de 2025</span>
                            </div>
                            <h2 class="evento-card-titulo">Cuarto ciclo de conferencias magistrales</h2>
                            <p class="evento-card-desc">
                                Presentado por el Lic. Isaac Chertorivski: Estrategia "P". Manejo de una Empresa en Crisis.
                            </p>
                            <a class="evento-card-enlace" href="img/Cartel_Conferencia_Lic_Isaac_Chertorivski.jpg" target="_blank">
                                Ver más <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                </div>

                <!-- Barra de paginación -->
                <nav class="paginacion" id="paginacion" aria-label="Paginación de eventos"></nav>

            </div>
        </div><!-- /.galeria-wrapper -->

    </div><!-- /.galeria-layout -->

    <!-- ====== Footer ====== -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Volver a inicio -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>

    <!-- ==========================================
         SCRIPT DE FILTRADO + PAGINACIÓN
         ========================================== -->
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var gruposPills  = document.querySelectorAll('.filtro-pills');
        var btnLimpiar   = document.getElementById('filtro-limpiar');
        var mensajeVacio = document.getElementById('filtro-vacio');
        var tarjetas     = document.querySelectorAll('#eventos-grid .evento-card');
        var navPaginacion = document.getElementById('paginacion');

        var POR_PAGINA = 5;
        var paginaActual = 1;

        /* Estado actual de cada filtro */
        var filtrosActivos = { tipo: 'todos', mes: 'todos', anio: 'todos' };

        /* Escuchar clics en cada grupo de pills */
        gruposPills.forEach(function (grupo) {
            var nombreFiltro = grupo.dataset.filter;
            var botones = grupo.querySelectorAll('.boton-sm-filtro');

            botones.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    botones.forEach(function (b) { b.classList.remove('activo'); });
                    btn.classList.add('activo');
                    filtrosActivos[nombreFiltro] = btn.dataset.value;
                    paginaActual = 1;
                    filtrarYPaginar();
                });
            });
        });

        /* Obtener tarjetas que coinciden con los filtros activos */
        function obtenerFiltradas() {
            var resultado = [];
            tarjetas.forEach(function (tarjeta) {
                var coincideTipo = (filtrosActivos.tipo === 'todos' || tarjeta.dataset.tipo === filtrosActivos.tipo);
                var coincideMes  = (filtrosActivos.mes  === 'todos' || tarjeta.dataset.mes  === filtrosActivos.mes);
                var coincideAnio = (filtrosActivos.anio === 'todos' || tarjeta.dataset.anio === filtrosActivos.anio);
                if (coincideTipo && coincideMes && coincideAnio) {
                    resultado.push(tarjeta);
                }
            });
            return resultado;
        }

        /* Filtrar + paginar */
        function filtrarYPaginar() {
            var filtradas = obtenerFiltradas();
            var totalPaginas = Math.ceil(filtradas.length / POR_PAGINA) || 1;

            /* Asegurar que la página actual sea válida */
            if (paginaActual > totalPaginas) paginaActual = totalPaginas;
            if (paginaActual < 1) paginaActual = 1;

            var inicio = (paginaActual - 1) * POR_PAGINA;
            var fin    = inicio + POR_PAGINA;

            /* Ocultar todas, luego mostrar solo las de la página actual */
            tarjetas.forEach(function (t) { t.style.display = 'none'; });
            filtradas.forEach(function (tarjeta, i) {
                tarjeta.style.display = (i >= inicio && i < fin) ? '' : 'none';
            });

            /* Mensaje vacío */
            mensajeVacio.style.display = (filtradas.length === 0) ? 'block' : 'none';

            /* Renderizar paginación */
            renderPaginacion(totalPaginas, filtradas.length);
        }

        /* Renderizar barra de paginación */
        function renderPaginacion(totalPaginas, totalItems) {
            navPaginacion.innerHTML = '';

            /* No mostrar paginación si hay 1 página o menos */
            if (totalPaginas <= 1) return;

            /* Indicador de resultados */
            var info = document.createElement('span');
            info.className = 'paginacion-info';
            var inicio = (paginaActual - 1) * POR_PAGINA + 1;
            var fin = Math.min(paginaActual * POR_PAGINA, totalItems);
            info.textContent = inicio + '–' + fin + ' de ' + totalItems;
            navPaginacion.appendChild(info);

            /* Contenedor de botones */
            var contenedor = document.createElement('div');
            contenedor.className = 'paginacion-botones';

            /* Botón anterior */
            var btnPrev = document.createElement('button');
            btnPrev.className = 'paginacion-btn paginacion-flecha';
            btnPrev.innerHTML = '<i class="fas fa-chevron-left"></i>';
            btnPrev.disabled = (paginaActual === 1);
            btnPrev.addEventListener('click', function () {
                if (paginaActual > 1) {
                    paginaActual--;
                    filtrarYPaginar();
                    scrollAlGrid();
                }
            });
            contenedor.appendChild(btnPrev);

            /* Botones de página */
            var paginas = calcularRangoPaginas(paginaActual, totalPaginas);
            paginas.forEach(function (p) {
                if (p === '...') {
                    var puntos = document.createElement('span');
                    puntos.className = 'paginacion-puntos';
                    puntos.textContent = '…';
                    contenedor.appendChild(puntos);
                } else {
                    var btn = document.createElement('button');
                    btn.className = 'paginacion-btn' + (p === paginaActual ? ' paginacion-activa' : '');
                    btn.textContent = p;
                    btn.addEventListener('click', function () {
                        paginaActual = p;
                        filtrarYPaginar();
                        scrollAlGrid();
                    });
                    contenedor.appendChild(btn);
                }
            });

            /* Botón siguiente */
            var btnNext = document.createElement('button');
            btnNext.className = 'paginacion-btn paginacion-flecha';
            btnNext.innerHTML = '<i class="fas fa-chevron-right"></i>';
            btnNext.disabled = (paginaActual === totalPaginas);
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

        /* Calcular el rango de páginas a mostrar (con elipsis) */
        function calcularRangoPaginas(actual, total) {
            if (total <= 5) {
                var arr = [];
                for (var i = 1; i <= total; i++) arr.push(i);
                return arr;
            }
            var paginas = [1];
            if (actual > 3) paginas.push('...');
            var inicio = Math.max(2, actual - 1);
            var fin = Math.min(total - 1, actual + 1);
            for (var j = inicio; j <= fin; j++) paginas.push(j);
            if (actual < total - 2) paginas.push('...');
            paginas.push(total);
            return paginas;
        }

        /* Scroll suave al inicio del grid al cambiar de página */
        function scrollAlGrid() {
            var grid = document.getElementById('eventos-grid');
            var offset = grid.getBoundingClientRect().top + window.pageYOffset - 100;
            window.scrollTo({ top: offset, behavior: 'smooth' });
        }

        /* Botón limpiar: resetear filtros y paginación */
        btnLimpiar.addEventListener('click', function () {
            filtrosActivos = { tipo: 'todos', mes: 'todos', anio: 'todos' };
            paginaActual = 1;

            gruposPills.forEach(function (grupo) {
                var botones = grupo.querySelectorAll('.boton-sm-filtro');
                botones.forEach(function (b) { b.classList.remove('activo'); });
                botones[0].classList.add('activo');
            });

            filtrarYPaginar();
        });

        /* Inicializar */
        filtrarYPaginar();
    });
    </script>
</body>

</html>
