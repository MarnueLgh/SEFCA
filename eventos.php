<?php
require_once __DIR__ . '/includes/datos_eventos.php';

$eventos_listado = obtener_eventos_listado();
$anios_eventos = [];

foreach ($eventos_listado as $evento_listado) {
    $anio_evento = (string) $evento_listado['anio'];

    if (!in_array($anio_evento, $anios_eventos, true)) {
        $anios_eventos[] = $anio_evento;
    }
}

rsort($anios_eventos, SORT_NUMERIC);

if (!function_exists('escapar_eventos')) {
    function escapar_eventos($valor)
    {
        return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<?php require_once("includes/head.php"); ?>

<body>
    <?php include("includes/spinner.php"); ?>
    <?php include("includes/navbar.php"); ?>

    <!-- <?php
        $heroTitulo = "Eventos";
        $heroTexto  = "Actividades, reconocimientos y celebraciones de la Sociedad de Egresados de la FCA.";
        include("includes/hero-pagina.php");
    ?> -->

    <div class="galeria-layout">
        <aside class="galeria-sidebar" id="galeria-sidebar">
            <div class="filtro-sidebar-header">
                <span class="filtro-sidebar-titulo">Filtros</span>
                <button class="filtro-limpiar" id="filtro-limpiar" title="Limpiar filtros">
                    <i class="fas fa-trash-alt"></i> Limpiar
                </button>
            </div>

            <div class="filtro-grupo">
                <span class="filtro-etiqueta">Por año:</span>
                <div class="filtro-pills" data-filter="anio">
                    <button class="boton-sm-filtro activo" data-value="todos">Todos</button>
                    <?php foreach ($anios_eventos as $anio_evento): ?>
                        <button class="boton-sm-filtro" data-value="<?php echo escapar_eventos($anio_evento); ?>">
                            <?php echo escapar_eventos($anio_evento); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </aside>

        <div class="galeria-wrapper">
            <div class="galeria-main">
                <p class="filtro-vacio" id="filtro-vacio" style="display:none;">
                    No se encontraron eventos con los filtros seleccionados.
                </p>

                <div class="eventos-grid" id="eventos-grid">
                    <?php foreach ($eventos_listado as $evento): ?>
                        <article
                            class="evento-card"
                            data-tipo="<?php echo escapar_eventos($evento['tipo']); ?>"
                            data-mes="<?php echo escapar_eventos($evento['mes']); ?>"
                            data-anio="<?php echo escapar_eventos($evento['anio']); ?>"
                        >
                            <div class="evento-card-img">
                                <img
                                    src="<?php echo escapar_eventos($evento['imagen']); ?>"
                                    alt="<?php echo escapar_eventos($evento['imagen_alt']); ?>"
                                >
                            </div>
                            <div class="evento-card-cuerpo">
                                <div class="evento-card-meta">
                                    <span class="evento-card-tag"><?php echo escapar_eventos($evento['fecha_etiqueta']); ?></span>
                                </div>
                                <h2 class="evento-card-titulo"><?php echo escapar_eventos($evento['titulo']); ?></h2>
                                <p class="evento-card-desc">
                                    <?php echo escapar_eventos($evento['descripcion']); ?>
                                </p>
                                <?php if (!empty($evento['acciones'])): ?>
                                    <div class="evento-card-acciones">
                                        <?php foreach ($evento['acciones'] as $accion): ?>
                                            <?php
                                            $clase_accion = 'evento-card-enlace';

                                            if (!empty($accion['clase'])) {
                                                $clase_accion .= ' ' . $accion['clase'];
                                            }

                                            $atributos_externos = !empty($accion['target_blank'])
                                                ? ' target="_blank" rel="noopener noreferrer"'
                                                : '';
                                            ?>
                                            <a class="<?php echo escapar_eventos($clase_accion); ?>" href="<?php echo escapar_eventos($accion['url']); ?>"<?php echo $atributos_externos; ?>>
                                                <?php echo escapar_eventos($accion['texto']); ?> <i class="fas fa-arrow-right"></i>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <nav class="paginacion" id="paginacion" aria-label="Paginación de eventos"></nav>
            </div>
        </div>
    </div>

    <div class="lightbox-overlay" id="lightboxOverlay">
        <div class="lightbox-cerrar" id="lightboxCerrar">&times;</div>
        <img src="" alt="Zoom" class="lightbox-img" id="lightboxImg">
    </div>

    <?php require_once("includes/footer.php"); ?>
    <?php include("includes/volver_arriba_btn.php"); ?>
    <?php require_once("includes/scripts.php"); ?>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
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
            var grid = document.getElementById('eventos-grid');
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

                mensajeVacio.style.display = filtradas.length === 0 ? 'block' : 'none';
                renderPaginacion(totalPaginas, filtradas.length);
                grid.style.opacity = '1';
            }, 300);
        }

        function renderPaginacion(totalPaginas, totalItems) {
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
            var grid = document.getElementById('eventos-grid');
            var offset = grid.getBoundingClientRect().top + window.pageYOffset - 100;
            window.scrollTo({ top: offset, behavior: 'smooth' });
        }

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

        filtrarYPaginar();

        var lightboxOverlay = document.getElementById('lightboxOverlay');
        var lightboxImg = document.getElementById('lightboxImg');
        var lightboxCerrar = document.getElementById('lightboxCerrar');
        var imagenesEvento = document.querySelectorAll('.evento-card-img');

        imagenesEvento.forEach(function (imgContainer) {
            imgContainer.addEventListener('click', function () {
                var img = this.querySelector('img');

                if (img) {
                    lightboxImg.src = img.src;
                    lightboxOverlay.classList.add('activo');
                }
            });
        });

        lightboxCerrar.addEventListener('click', function () {
            lightboxOverlay.classList.remove('activo');
        });

        lightboxOverlay.addEventListener('click', function (e) {
            if (e.target === lightboxOverlay) {
                lightboxOverlay.classList.remove('activo');
            }
        });
    });
    </script>
</body>

</html>
