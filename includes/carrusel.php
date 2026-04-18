<?php
/*
 * Fecha: 17/04/2026
 * Descripción: Carrusel horizontal de eventos recientes con marquee continuo.
 *              Diseño: cards estilo noticia tecnológica con padding blanco.
 */

// Se define el array de las cartas de eventos para poder duplicarlo fácilmente.
$cards_eventos = [
    [
        'enlace' => 'docs/resumen_aulas.pdf',
        'imagen' => 'img/fca/aulas_proyecto.jpg',
        'tag_icono' => 'bi-building',
        'tag_color' => '#EAA636', // Dorado UNAM
        'tag_bg' => '#fdf0d9',
        'tag_texto' => 'SEFCA • Proyecto',
        'titulo' => 'Aulas dignas de la FCA',
        'excerpt' => 'Conoce los avances de esta gran iniciativa enfocada en modernizar las instalaciones de nuestra Facultad para beneficio de la comunidad estudiantil.',
        'boton' => 'Ver más'
    ],
    [
        'enlace' => 'docs/concurso_ensayo_SEFCA_25.pdf',
        'imagen' => 'img/concurso_ensayo.jpg',
        'tag_icono' => 'bi-pen',
        'tag_color' => '#112f4b', // Azul UNAM
        'tag_bg' => '#e2e7ec',
        'tag_texto' => 'Convocatoria • 2025',
        'titulo' => 'Concurso de Ensayo SEFCA 2025',
        'excerpt' => 'Participa, demuestra tus conocimientos y gana reconocimiento en esta edición de nuestro prestigioso concurso anual de ensayo.',
        'boton' => 'Ver más'
    ],
    [
        'enlace' => 'evento.php?evento=alfredo_helu',
        'imagen' => 'img/250324_Visita_de_Alfredo_Harp_Helu.jpg',
        'tag_icono' => 'bi-star-fill',
        'tag_color' => '#EAA636',
        'tag_bg' => '#fdf0d9',
        'tag_texto' => 'Visitante Distinguido',
        'titulo' => 'Visita de Alfredo Harp Helú',
        'excerpt' => 'Revive los mejores momentos del recorrido realizado en nuestras instalaciones por uno de los egresados más ilustres de la UNAM.',
        'boton' => 'Ver más'
    ],
    [
        'enlace' => 'docs/toma_protesta_2024-2026.pdf',
        'imagen' => 'img/toma_protesta_2024.jpg',
        'tag_icono' => 'bi-people',
        'tag_color' => '#112f4b',
        'tag_bg' => '#e2e7ec',
        'tag_texto' => 'Institucional • SEFCA',
        'titulo' => 'Toma de protesta 2024-2026',
        'excerpt' => 'Ceremonia oficial y toma de protesta de la nueva mesa directiva trabajando por el constante desarrollo  de los egresados de la FCA.',
        'boton' => 'Ver más'
    ],
    [
        'enlace' => 'docs/informe_actividades.pdf',
        'imagen' => 'img/informe_actividades.jpg',
        'tag_icono' => 'bi-file-earmark-text',
        'tag_color' => '#2a6a42', // Verde
        'tag_bg' => '#e5f3eb',
        'tag_texto' => 'Reporte • Anual',
        'titulo' => 'Informe de actividades 2022-2023',
        'excerpt' => 'Consulta el resumen oficial de actividades, resultados financieros y todos los hitos y logros alcanzados durante el periodo documentado.',
        'boton' => 'Ver más'
    ]
];
?>
<!-- === ESTILOS INSERTADOS TEMPORALMENTE (SE RECOMIENDA MOVER A STYLE.CSS) === -->
<style>
/* Estilos extra si style.css no toma el cambio temporalmente */
</style>

<section class="carrusel-eventos section-gap">
    <div class="container-fluid px-0">
        <div class="carrusel-marquee-container">
            <h2 class="carrusel-marquee-header-title text-center mb-5">Eventos Recientes</h2>
            
            <div class="carrusel-viewport">
                <div class="carrusel-pista">
                    <?php
                    // Se renderizan tres veces para el loop infinito del marquee (clonando de más para asegurar)
                    for ($i = 0; $i < 3; $i++) {
                        foreach ($cards_eventos as $card) {
                            $target = strpos($card['enlace'], 'docs/') !== false ? 'target="_blank" rel="noopener noreferrer"' : '';
                            // To match design "Analyse Vulnerability"
                            $btnText = $card['boton'];
                            if ($btnText === 'Analyse Event') {
                                $btnText = 'Ver Galería';
                            }
                            if ($btnText === 'Analyse Data') {
                                $btnText = 'Ver Evento';
                            }
                            ?>
                            <a href="<?= $card['enlace'] ?>" <?= $target ?> class="carrusel-cyber-card">
                                <div class="carrusel-cyber-card-img-wrap">
                                    <img src="<?= $card['imagen'] ?>" alt="<?= htmlspecialchars($card['titulo']) ?>" class="carrusel-cyber-card-img">
                                </div>
                                <div class="carrusel-cyber-card-body">
                                    <span class="carrusel-cyber-tag" style="color: <?= $card['tag_color'] ?>; background-color: <?= $card['tag_bg'] ?>;">
                                        <i class="bi <?= $card['tag_icono'] ?> me-1"></i> <?= $card['tag_texto'] ?>
                                    </span>
                                    <h3 class="carrusel-cyber-title"><?= $card['titulo'] ?></h3>
                                    <p class="carrusel-cyber-excerpt"><?= $card['excerpt'] ?></p>
                                    
                                    <!-- Boton estilo pill delineado -->
                                    <div class="carrusel-cyber-btn-wrapper mt-auto">
                                        <span class="carrusel-cyber-btn">
                                            <i class="bi bi-arrow-return-right me-1"></i> <?= $btnText ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
