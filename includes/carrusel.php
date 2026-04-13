<?php
/*
 * Fecha: 11/04/2026
 * Descripción: Carrusel tipo arco (arc carousel) de eventos recientes.
 */
?>
<section class="carrusel-eventos section-gap">
    <div class="container">
        <!-- Header con título -->
        <div class="carrusel-eventos-header">
            <h2 class="carrusel-eventos-titulo">Eventos Recientes</h2>
        </div>

        <!-- Escena 3D del arco -->
        <div class="carrusel-arco-escena" id="carrusel-arco-escena">
            <div class="carrusel-arco-pista" id="carrusel-arco-pista">

                <!-- Card 1 -->
                <a href="docs/resumen_aulas.pdf" target="_blank" class="carrusel-arco-card">
                    <div class="carrusel-arco-card-imagen" style="background-image: url('img/fca/aulas_proyecto.jpg')"></div>
                    <div class="carrusel-arco-card-contenido">
                        <h3 class="carrusel-arco-card-titulo">Aulas dignas de la FCA</h3>
                        <div class="carrusel-arco-card-footer">
                            <span class="carrusel-arco-card-boton">Ver más</span>
                        </div>
                    </div>
                </a>

                <!-- Card 2 -->
                <a href="docs/concurso_ensayo_SEFCA_25.pdf" target="_blank" class="carrusel-arco-card">
                    <div class="carrusel-arco-card-imagen" style="background-image: url('img/concurso_ensayo.jpg')"></div>
                    <div class="carrusel-arco-card-contenido">
                        <h3 class="carrusel-arco-card-titulo">Concurso de Ensayo SEFCA 2025</h3>
                        <div class="carrusel-arco-card-footer">
                            <span class="carrusel-arco-card-boton">Ver más</span>
                        </div>
                    </div>
                </a>

                <!-- Card 3 -->
                <a href="evento.php?evento=alfredo_helu" class="carrusel-arco-card">
                    <div class="carrusel-arco-card-imagen" style="background-image: url('img/250324_Visita_de_Alfredo_Harp_Helu.jpg')"></div>
                    <div class="carrusel-arco-card-contenido">
                        <h3 class="carrusel-arco-card-titulo">Visita de Alfredo Harp Helú</h3>
                        <div class="carrusel-arco-card-footer">
                            <span class="carrusel-arco-card-boton">Ver galería</span>
                        </div>
                    </div>
                </a>

                <!-- Card 4 -->
                <a href="docs/toma_protesta_2024-2026.pdf" target="_blank" class="carrusel-arco-card">
                    <div class="carrusel-arco-card-imagen" style="background-image: url('img/toma_protesta_2024.jpg')"></div>
                    <div class="carrusel-arco-card-contenido">
                        <h3 class="carrusel-arco-card-titulo">Toma de protesta 2024-2026</h3>
                        <div class="carrusel-arco-card-footer">
                            <span class="carrusel-arco-card-boton">Ver más</span>
                        </div>
                    </div>
                </a>

                <!-- Card 5 -->
                <a href="docs/informe_actividades.pdf" target="_blank" class="carrusel-arco-card">
                    <div class="carrusel-arco-card-imagen" style="background-image: url('img/informe_actividades.jpg')"></div>
                    <div class="carrusel-arco-card-contenido">
                        <h3 class="carrusel-arco-card-titulo">Informe de actividades 2022 - 2023</h3>
                        <div class="carrusel-arco-card-footer">
                            <span class="carrusel-arco-card-boton">Ver más</span>
                        </div>
                    </div>
                </a>

            </div>
        </div>

        <!-- Navegación inferior -->
        <div class="carrusel-arco-nav">
            <button class="carrusel-arco-flecha" id="carrusel-prev" aria-label="Anterior">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="carrusel-arco-indicadores" id="carrusel-indicadores"></div>
            <button class="carrusel-arco-flecha" id="carrusel-next" aria-label="Siguiente">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

    </div>
</section>
