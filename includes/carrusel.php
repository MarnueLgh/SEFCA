<?php
/*
 * Fecha: 13/04/2026
 * Descripción: Carrusel horizontal de eventos recientes.
 *              Diseño: cards redondeadas con título arriba-izquierda,
 *              botón flecha arriba-derecha, e imagen cubriendo el resto.
 */
?>
<section class="carrusel-eventos section-gap">
    <div class="container">

        <!-- Header: título + flechas de navegación -->
        <div class="carrusel-header">
            <h2 class="carrusel-titulo">Eventos Recientes</h2>
            <div class="carrusel-flechas">
                <button class="carrusel-flecha" id="carrusel-prev" aria-label="Anterior">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <button class="carrusel-flecha" id="carrusel-next" aria-label="Siguiente">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Pista del carrusel -->
        <div class="carrusel-viewport" id="carrusel-viewport">
            <div class="carrusel-pista" id="carrusel-pista">

                <!-- Card 1 -->
                <a href="docs/resumen_aulas.pdf" target="_blank" class="carrusel-card">
                    <div class="carrusel-card-top">
                        <h3 class="carrusel-card-titulo">Aulas dignas de la FCA</h3>
                        <span class="carrusel-card-arrow">Ver más</span>
                    </div>
                    <div class="carrusel-card-img" style="background-image: url('img/fca/aulas_proyecto.jpg')"></div>
                </a>

                <!-- Card 2 -->
                <a href="docs/concurso_ensayo_SEFCA_25.pdf" target="_blank" class="carrusel-card">
                    <div class="carrusel-card-top">
                        <h3 class="carrusel-card-titulo">Concurso de Ensayo SEFCA 2025</h3>
                        <span class="carrusel-card-arrow">Ver más</span>
                    </div>
                    <div class="carrusel-card-img" style="background-image: url('img/concurso_ensayo.jpg')"></div>
                </a>

                <!-- Card 3 -->
                <a href="evento.php?evento=alfredo_helu" class="carrusel-card">
                    <div class="carrusel-card-top">
                        <h3 class="carrusel-card-titulo">Visita de Alfredo Harp Helú</h3>
                        <span class="carrusel-card-arrow">Ver más</span>
                    </div>
                    <div class="carrusel-card-img" style="background-image: url('img/250324_Visita_de_Alfredo_Harp_Helu.jpg')"></div>
                </a>

                <!-- Card 4 -->
                <a href="docs/toma_protesta_2024-2026.pdf" target="_blank" class="carrusel-card">
                    <div class="carrusel-card-top">
                        <h3 class="carrusel-card-titulo">Toma de protesta 2024-2026</h3>
                        <span class="carrusel-card-arrow">Ver más</span>
                    </div>
                    <div class="carrusel-card-img" style="background-image: url('img/toma_protesta_2024.jpg')"></div>
                </a>

                <!-- Card 5 -->
                <a href="docs/informe_actividades.pdf" target="_blank" class="carrusel-card">
                    <div class="carrusel-card-top">
                        <h3 class="carrusel-card-titulo">Informe de actividades 2022 - 2023</h3>
                        <span class="carrusel-card-arrow">Ver más</span>
                    </div>
                    <div class="carrusel-card-img" style="background-image: url('img/informe_actividades.jpg')"></div>
                </a>

            </div>
        </div>

    </div>
</section>
