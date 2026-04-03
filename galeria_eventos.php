<!DOCTYPE html>
<html lang="es">

<?php require_once("includes/head.php"); ?>
<!-- CSS de Eventos -->
<link href="css/eventos.css" rel="stylesheet">

<body>
    <?php include("includes/spinner.php"); ?>
    <?php include("includes/navbar.php"); ?>

    <!-- Hero -->
    <?php
        $heroTitulo = "Eventos";
        $heroTexto  = "Actividades, reconocimientos y celebraciones de la Sociedad de Egresados de la FCA.";
        include("includes/hero-pagina.php");
    ?>

    <!-- ==========================================
         BARRA DE FILTROS
         ========================================== -->
    <div class="eventos-container" style="padding-bottom: 0;">
        <div class="filtro-barra">

            <!-- Tipo de evento -->
            <div class="filtro-grupo">
                <label class="filtro-etiqueta" for="filtro-tipo">Tipo</label>
                <select class="filtro-select" id="filtro-tipo">
                    <option value="todos">Todos</option>
                    <option value="evento">Eventos</option>
                    <option value="blog">Blog</option>
                    <option value="convocatoria">Convocatorias</option>
                </select>
            </div>

            <!-- Mes -->
            <div class="filtro-grupo">
                <label class="filtro-etiqueta" for="filtro-mes">Mes</label>
                <select class="filtro-select" id="filtro-mes">
                    <option value="todos">Todos</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>

            <!-- Año -->
            <div class="filtro-grupo">
                <label class="filtro-etiqueta" for="filtro-anio">Año</label>
                <select class="filtro-select" id="filtro-anio">
                    <option value="todos">Todos</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                </select>
            </div>

            <!-- Botón limpiar -->
            <button class="filtro-limpiar" id="filtro-limpiar" title="Limpiar filtros">
                <i class="fas fa-times"></i> Limpiar
            </button>

        </div>

        <!-- Mensaje cuando no hay resultados -->
        <p class="filtro-vacio" id="filtro-vacio" style="display:none;">
            No se encontraron eventos con los filtros seleccionados.
        </p>
    </div>

    <!-- ==========================================
         LISTADO DE EVENTOS
         ==========================================
         Cada <article> lleva atributos de filtrado:
           data-tipo  → evento | blog | convocatoria
           data-mes   → 1-12
           data-anio  → Año (ej. 2025)
         Al agregar un nuevo evento, copia un bloque <article>
         y actualiza estos tres atributos.
         ========================================== -->
    <div class="eventos-container" style="padding-top: 1rem;">
        <div class="eventos-grid" id="eventos-grid">

            <!-- ========== Concurso de Ensayo SEFCA 2025 ========== -->
            <article class="evento-card" data-tipo="convocatoria" data-mes="9" data-anio="2025">
                <div class="evento-card__img">
                    <img src="img/concurso_ensayo.jpg" alt="Concurso de Ensayo SEFCA 2025">
                </div>
                <div class="evento-card__body">
                    <div class="evento-card__meta">
                        <span class="evento-card__tag evento-card__tag--convocatoria">Convocatoria</span>
                        <span class="evento-card__date">4 de septiembre de 2025</span>
                    </div>
                    <h2 class="evento-card__title">Convocatoria Concurso de Ensayo SEFCA 2025</h2>
                    <p class="evento-card__desc">
                        Convocatoria abierta para participar en el Concurso de Ensayo organizado por la SEFCA UNAM.
                    </p>
                    <a class="evento-card__link" href="docs/concurso_ensayo_SEFCA_25.pdf" target="_blank">
                        Ver más <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== Visita Alfredo Harp Helú ========== -->
            <article class="evento-card" data-tipo="evento" data-mes="3" data-anio="2025">
                <div class="evento-card__img">
                    <img src="img/250324_Visita_de_Alfredo_Harp_Helu.jpg" alt="Visita de Alfredo Harp Helú">
                </div>
                <div class="evento-card__body">
                    <div class="evento-card__meta">
                        <span class="evento-card__tag evento-card__tag--evento">Evento</span>
                        <span class="evento-card__date">24 de marzo de 2025</span>
                    </div>
                    <h2 class="evento-card__title">Visita de Alfredo Harp Helú</h2>
                    <p class="evento-card__desc">
                        Visita del empresario y filántropo Alfredo Harp Helú a las instalaciones de la Facultad de 
                        Contaduría y Administración.
                    </p>
                    <a class="evento-card__link" href="evento_galeria.php?evento=alfredo_helu">
                        Ver galería <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== Toma de protesta 2024-2026 ========== -->
            <article class="evento-card" data-tipo="evento" data-mes="10" data-anio="2024">
                <div class="evento-card__img">
                    <img src="img/toma_protesta_2024.jpg" alt="Toma de protesta de la mesa directiva 2024-2026">
                </div>
                <div class="evento-card__body">
                    <div class="evento-card__meta">
                        <span class="evento-card__tag evento-card__tag--evento">Evento</span>
                        <span class="evento-card__date">17 de octubre de 2024</span>
                    </div>
                    <h2 class="evento-card__title">Toma de protesta de la mesa directiva 2024-2026</h2>
                    <p class="evento-card__desc">
                        Ceremonia de toma de protesta de la mesa directiva de la Sociedad de Egresados de la FCA para el periodo 2024-2026.
                    </p>
                    <a class="evento-card__link" href="docs/toma_protesta_2024-2026.pdf" target="_blank">
                        Ver más <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== Informe de actividades 2022-2023 ========== -->
            <article class="evento-card" data-tipo="evento" data-mes="6" data-anio="2023">
                <div class="evento-card__img">
                    <img src="img/informe_actividades.jpg" alt="Informe de actividades 2022-2023">
                </div>
                <div class="evento-card__body">
                    <div class="evento-card__meta">
                        <span class="evento-card__tag evento-card__tag--evento">Evento</span>
                        <span class="evento-card__date">8 de junio de 2023</span>
                    </div>
                    <h2 class="evento-card__title">Informe de actividades 2022 – 2023</h2>
                    <p class="evento-card__desc">
                        Presentación del informe de actividades de la Sociedad de Egresados correspondiente al periodo 2022-2023.
                    </p>
                    <a class="evento-card__link" href="docs/informe_actividades.pdf" target="_blank">
                        Ver más <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== Reconocimiento Paola Reynoso ========== -->
            <article class="evento-card" data-tipo="evento" data-mes="6" data-anio="2023">
                <div class="evento-card__img">
                    <img src="img/paola1.jpg" alt="Entrega de Reconocimiento a Paola Reynoso">
                </div>
                <div class="evento-card__body">
                    <div class="evento-card__meta">
                        <span class="evento-card__tag evento-card__tag--evento">Evento</span>
                        <span class="evento-card__date">8 de junio de 2023</span>
                    </div>
                    <h2 class="evento-card__title">Entrega de Reconocimiento a Paola Reynoso</h2>
                    <p class="evento-card__desc">
                        En sesión conjunta del Consejo Directivo y del Consejo Consultivo, se hizo entrega de un 
                        Diploma SEFCA UNAM a Paola Reynoso, egresada distinguida de la FCA, en reconocimiento a 
                        que obtuvo el Primer Lugar del Premio Internacional Universia Santander 2023.
                    </p>
                    <a class="evento-card__link" href="img/agradecimiento_paola.jpg" target="_blank">
                        Ver más <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== 30 Aniversario de Egresados ========== -->
            <article class="evento-card" data-tipo="evento" data-mes="3" data-anio="2023">
                <div class="evento-card__img">
                    <img src="img/egresados.jpg" alt="30 aniversario de egresados">
                </div>
                <div class="evento-card__body">
                    <div class="evento-card__meta">
                        <span class="evento-card__tag evento-card__tag--evento">Evento</span>
                        <span class="evento-card__date">1 de marzo de 2023</span>
                    </div>
                    <h2 class="evento-card__title">30 aniversario de egresados de la SEFCA</h2>
                    <p class="evento-card__desc">
                        Celebración del trigésimo aniversario de la Sociedad de Egresados en el Palacio de Autonomía. 
                        Evento conmemorativo con la presencia de autoridades y miembros distinguidos.
                    </p>
                    <a class="evento-card__link" href="evento_galeria.php?evento=30_aniversario">
                        Ver galería <i class="fas fa-arrow-right"></i>
                    </a>
                    <a class="evento-card__link" href="img/articulo_30_aniversario_gaceta.jpg" target="_blank" style="margin-top: 0.3rem;">
                        Ver en Gaceta UNAM <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== Primer ciclo de conferencias magistrales ========== -->
            <article class="evento-card" data-tipo="evento" data-mes="9" data-anio="2022">
                <div class="evento-card__img">
                    <img src="img/ciclo1.jpg" alt="Primer ciclo de conferencias magistrales">
                </div>
                <div class="evento-card__body">
                    <div class="evento-card__meta">
                        <span class="evento-card__tag evento-card__tag--evento">Evento</span>
                        <span class="evento-card__date">5 de septiembre de 2022</span>
                    </div>
                    <h2 class="evento-card__title">Primer ciclo de conferencias magistrales</h2>
                    <p class="evento-card__desc">
                        Diferentes ponentes tienen la oportunidad de compartir su experiencia y trayectoria en estas ponencias dirigidas a la comunidad FCA.
                    </p>
                    <a class="evento-card__link" href="img/ciclo1.jpg" target="_blank">
                        Ver más <i class="fas fa-arrow-right"></i>
                    </a>
                    <a class="evento-card__link" href="https://www.youtube.com/watch?v=-VPJKdsu_wQ&list=PLEcS-HQTcBAoY--ot6Kw53cZOxbaTi_H8" target="_blank" style="margin-top: 0.3rem;">
                        Ver en Youtube <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== Segundo ciclo de conferencias magistrales ========== -->
            <article class="evento-card" data-tipo="evento" data-mes="11" data-anio="2022">
                <div class="evento-card__img">
                    <img src="img/ciclo2.jpg" alt="Segundo ciclo de conferencias magistrales">
                </div>
                <div class="evento-card__body">
                    <div class="evento-card__meta">
                        <span class="evento-card__tag evento-card__tag--evento">Evento</span>
                        <span class="evento-card__date">14 de noviembre de 2022</span>
                    </div>
                    <h2 class="evento-card__title">Segundo ciclo de conferencias magistrales</h2>
                    <p class="evento-card__desc">
                        Diferentes ponentes tienen la oportunidad de compartir su experiencia y trayectoria en estas ponencias dirigidas a la comunidad FCA.
                    </p>
                    <a class="evento-card__link" href="img/ciclo2.jpg" target="_blank">
                        Ver más <i class="fas fa-arrow-right"></i>
                    </a>
                    <a class="evento-card__link" href="https://www.youtube.com/watch?v=HyzQ4AvFVjM&list=PLEcS-HQTcBAqe98ozaZYXusliQhWq8Wmx" target="_blank" style="margin-top: 0.3rem;">
                        Ver en Youtube <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== Cuarto ciclo de conferencias magistrales ========== -->
            <article class="evento-card" data-tipo="evento" data-mes="9" data-anio="2025">
                <div class="evento-card__img">
                    <img src="img/Cartel_Conferencia_Lic_Isaac_Chertorivski.jpg" alt="Segundo ciclo de conferencias magistrales">
                </div>
                <div class="evento-card__body">
                    <div class="evento-card__meta">
                        <span class="evento-card__tag evento-card__tag--evento">Evento</span>
                        <span class="evento-card__date">30 de septiembre de 2025</span>
                    </div>
                    <h2 class="evento-card__title">Cuarto ciclo de conferencias magistrales</h2>
                    <p class="evento-card__desc">
                        Presentado por el Lic. Isaac Chertorivski: Estrategia "P". Manejo de una Empresa en Crisis.
                    </p>
                    <a class="evento-card__link" href="img/Cartel_Conferencia_Lic_Isaac_Chertorivski.jpg" target="_blank">
                        Ver más <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
        </div>
    </div>

    <?php require_once("includes/footer.php"); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>

    <!-- ==========================================
         SCRIPT DE FILTRADO
         ========================================== -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var selectTipo   = document.getElementById('filtro-tipo');
        var selectMes    = document.getElementById('filtro-mes');
        var selectAnio   = document.getElementById('filtro-anio');
        var btnLimpiar   = document.getElementById('filtro-limpiar');
        var mensajeVacio = document.getElementById('filtro-vacio');
        var tarjetas     = document.querySelectorAll('#eventos-grid .evento-card');

        function filtrar() {
            var tipo = selectTipo.value;
            var mes  = selectMes.value;
            var anio = selectAnio.value;
            var visibles = 0;

            tarjetas.forEach(function (tarjeta) {
                var coincideTipo = (tipo === 'todos' || tarjeta.dataset.tipo === tipo);
                var coincideMes  = (mes  === 'todos' || tarjeta.dataset.mes  === mes);
                var coincideAnio = (anio === 'todos' || tarjeta.dataset.anio === anio);

                if (coincideTipo && coincideMes && coincideAnio) {
                    tarjeta.style.display = '';
                    visibles++;
                } else {
                    tarjeta.style.display = 'none';
                }
            });

            mensajeVacio.style.display = (visibles === 0) ? 'block' : 'none';
        }

        selectTipo.addEventListener('change', filtrar);
        selectMes.addEventListener('change', filtrar);
        selectAnio.addEventListener('change', filtrar);

        btnLimpiar.addEventListener('click', function () {
            selectTipo.value = 'todos';
            selectMes.value  = 'todos';
            selectAnio.value = 'todos';
            filtrar();
        });
    });
    </script>
</body>

</html>
