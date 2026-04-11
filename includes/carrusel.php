<?php
/*
 * Fecha: 10/04/2026
 * Descripción: Carrusel de eventos recientes para la página principal.
 */
?>
<section class="carrusel-eventos section-gap">
    <div class="container">
        <!-- Header con título y flechas de navegación -->
        <div class="carrusel-eventos-header">
            <h2 class="carrusel-eventos-titulo">Eventos Recientes</h2>
            <div class="carrusel-eventos-nav">
                <button class="carrusel-eventos-flecha" id="carrusel-prev" aria-label="Anterior">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carrusel-eventos-flecha" id="carrusel-next" aria-label="Siguiente">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Track de tarjetas con scroll horizontal -->
        <div class="carrusel-eventos-track" id="carrusel-eventos-track">

            <!-- Card 1 -->
            <a href="img/Cartel_Conferencia_Lic_Isaac_Chertorivski.jpg" target="_blank" class="carrusel-eventos-card">
                <img src="img/Cartel_Conferencia_Lic_Isaac_Chertorivski.jpg" alt="Cuarto ciclo de conferencias magistrales" class="carrusel-eventos-card-img" loading="lazy">
                <div class="carrusel-eventos-card-overlay"></div>
                <div class="carrusel-eventos-card-contenido">
                    <span class="carrusel-eventos-card-tag">Evento</span>
                    <h3 class="carrusel-eventos-card-titulo">Cuarto ciclo de conferencias magistrales</h3>
                </div>
            </a>

            <!-- Card 2 -->
            <a href="docs/concurso_ensayo_SEFCA_25.pdf" target="_blank" class="carrusel-eventos-card">
                <img src="img/concurso_ensayo.jpg" alt="Concurso de Ensayo SEFCA 2025" class="carrusel-eventos-card-img" loading="lazy">
                <div class="carrusel-eventos-card-overlay"></div>
                <div class="carrusel-eventos-card-contenido">
                    <span class="carrusel-eventos-card-tag">Convocatoria</span>
                    <h3 class="carrusel-eventos-card-titulo">Convocatoria Concurso de Ensayo SEFCA 2025</h3>
                </div>
            </a>

            <!-- Card 3 -->
            <a href="evento.php?evento=alfredo_helu" class="carrusel-eventos-card">
                <img src="img/250324_Visita_de_Alfredo_Harp_Helu.jpg" alt="Visita de Alfredo Harp Helú" class="carrusel-eventos-card-img" loading="lazy">
                <div class="carrusel-eventos-card-overlay"></div>
                <div class="carrusel-eventos-card-contenido">
                    <span class="carrusel-eventos-card-tag">Evento</span>
                    <h3 class="carrusel-eventos-card-titulo">Visita de Alfredo Harp Helú</h3>
                </div>
            </a>

            <!-- Card 4 -->
            <a href="docs/toma_protesta_2024-2026.pdf" target="_blank" class="carrusel-eventos-card">
                <img src="img/toma_protesta_2024.jpg" alt="Toma de protesta de la mesa directiva 2024-2026" class="carrusel-eventos-card-img" loading="lazy">
                <div class="carrusel-eventos-card-overlay"></div>
                <div class="carrusel-eventos-card-contenido">
                    <span class="carrusel-eventos-card-tag">Evento</span>
                    <h3 class="carrusel-eventos-card-titulo">Toma de protesta de la mesa directiva 2024-2026</h3>
                </div>
            </a>

            <!-- Card 5 -->
            <a href="docs/informe_actividades.pdf" target="_blank" class="carrusel-eventos-card">
                <img src="img/informe_actividades.jpg" alt="Informe de actividades 2022-2023" class="carrusel-eventos-card-img" loading="lazy">
                <div class="carrusel-eventos-card-overlay"></div>
                <div class="carrusel-eventos-card-contenido">
                    <span class="carrusel-eventos-card-tag">Evento</span>
                    <h3 class="carrusel-eventos-card-titulo">Informe de actividades 2022 – 2023</h3>
                </div>
            </a>

        </div>
    </div>
</section>
