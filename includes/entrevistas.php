<?php
/*
 * Fecha: 20/04/2026
 * Descripción: Carrusel de entrevistas de la página Voces.
 */

$entrevistas = [
    [
        'url' => 'https://youtu.be/Gpkj5xKvccc?si=SxUuWKPISnsH2SuF',
        'titulo' => 'Lic. Isaac Chertorivski',
        'descripcion' => 'Isaac Chertorivski, economista y político mexicano, destaca el compromiso de SEFCA de retribuir a la facultad compartiendo su valiosa experiencia profesional.',
        'imagen' => 'img/entrevistas/isaac_chertorivski_shkoorman.png',
        'alt' => 'Portada de la entrevista a Lic. Isaac Chertorivski',
        'badge' => 'Video',
        'plataforma' => 'Entrevista en YouTube'
    ],
    [
        'url' => 'https://youtu.be/EKT3XU1IW5Q?si=JZuTA5O95GbwRkkG',
        'titulo' => 'Héctor Alfonso Bolio Arciniega',
        'descripcion' => 'Héctor Alfonso Bolio Arciniega felicita a la facultad y agradece las sólidas bases profesionales que recibió durante su formación.',
        'imagen' => 'img/entrevistas/hector_alfonso_bolio_arciniega.png',
        'alt' => 'Portada de la entrevista a Héctor Alfonso Bolio Arciniega',
        'badge' => 'Video',
        'plataforma' => 'Entrevista en YouTube'
    ],
    [
        'url' => 'https://youtu.be/sbFi8vZTgXY?si=8tZzBsgipxRfUdaU',
        'titulo' => 'Marcela J. Peñaloza Báez',
        'descripcion' => 'Marcela J. Peñaloza Báez, especialista en impuestos, resalta la historia de la facultad e impulsa el liderazgo de las mujeres en informática.',
        'imagen' => 'img/entrevistas/marcela_j_penaloza_baez.png',
        'alt' => 'Portada de la entrevista a Marcela J. Peñaloza Báez',
        'badge' => 'Video',
        'plataforma' => 'Entrevista en YouTube'
    ],
    [
        'url' => 'https://youtu.be/SZlp8znMxzs?si=O5_SFya7HVQ7N7qK',
        'titulo' => 'María Elena García Hernández',
        'descripcion' => 'María Elena García Hernández celebra 45 años de trayectoria y el profundo orgullo de pertenecer a la comunidad FCA.',
        'imagen' => 'img/entrevistas/maria_elena_garcia_hernandez.png',
        'alt' => 'Portada de la entrevista a María Elena García Hernández',
        'badge' => 'Video',
        'plataforma' => 'Entrevista en YouTube'
    ],
    [
        'url' => 'https://youtu.be/sstW5kG18ko?si=17a8AxQW6O_MB27i',
        'titulo' => 'Armando Espinoza Álvarez',
        'descripcion' => 'Armando Espinoza Álvarez explica cómo la contaduría impulsó su crecimiento profesional y sus viajes por todo el mundo.',
        'imagen' => 'img/entrevistas/armando_espinoza_alvarez.png',
        'alt' => 'Portada de la entrevista a Armando Espinoza Álvarez',
        'badge' => 'Video',
        'plataforma' => 'Entrevista en YouTube'
    ],
    [
        'url' => 'https://youtu.be/aP2MgWw6gAg?si=vP-mGNW11bWiu-y3',
        'titulo' => 'Arturo Velázquez Jiménez',
        'descripcion' => 'Arturo Velázquez Jiménez describe la misión de SEFCA de compartir experiencia profesional con las nuevas generaciones de estudiantes.',
        'imagen' => 'img/entrevistas/arturo_velazquez_jimenez.png',
        'alt' => 'Portada de la entrevista a Arturo Velázquez Jiménez',
        'badge' => 'Video',
        'plataforma' => 'Entrevista en YouTube'
    ],
    [
        'url' => 'https://youtu.be/cVdH-aO-OuM?si=z0-W82tBotL23I9g',
        'titulo' => 'Felipe Pérez Cervantes',
        'descripcion' => 'Felipe Pérez Cervantes destaca la innovación constante de la facultad y el orgullo de pertenecer a esta institución..',
        'imagen' => 'img/entrevistas/felipe_perez_cervantes.png',
        'alt' => 'Portada de la entrevista a Felipe Pérez Cervantes',
        'badge' => 'Video',
        'plataforma' => 'Entrevista en YouTube'
    ]
];
?>

<section class="carrusel-entrevistas">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="display-6" style="color: var(--azul_unam); font-family: 'DM Serif Display', serif;">Entrevistas
            </h2>
            <p class="text-muted">Conoce más sobre la historia y visión de SEFCA a través de estas entrevistas.</p>
        </div>
    </div>

    <!--
        ===============================================================================
        INSTRUCCIONES PARA AÑADIR NUEVAS ENTREVISTAS:
        1. Agrega un nuevo arreglo dentro de $entrevistas.
        2. Completa url, titulo, descripcion, imagen, alt, badge y plataforma.
        3. Usa la ruta de imagen dentro de img/entrevistas/.
        4. Si cambia la plataforma, ajusta también el texto mostrado en plataforma.
        ===============================================================================
    -->

    <div class="owl-carousel entrevistas-carousel owl-theme">
        <?php foreach ($entrevistas as $entrevista) { ?>
            <div class="entrevista-slide">
                <a href="<?= htmlspecialchars($entrevista['url'], ENT_QUOTES, 'UTF-8') ?>" target="_blank"
                    rel="noopener noreferrer" class="link-card text-decoration-none">
                    <div class="link-card-header">
                        <span
                            class="badge link-card-badge-oscuro"><?= htmlspecialchars($entrevista['badge'], ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                    <div class="link-card-cuerpo">
                        <h4 class="link-card-titulo"><?= htmlspecialchars($entrevista['titulo'], ENT_QUOTES, 'UTF-8') ?>
                        </h4>
                        <p class="link-card-texto"><?= htmlspecialchars($entrevista['descripcion'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    </div>
                    <div class="link-card-imagen-contenedor">
                        <img src="<?= htmlspecialchars($entrevista['imagen'], ENT_QUOTES, 'UTF-8') ?>"
                            alt="<?= htmlspecialchars($entrevista['alt'], ENT_QUOTES, 'UTF-8') ?>">
                        <div class="link-card-imagen-placeholder">
                            <p class="link-card-ubicacion"><i class="fab fa-youtube"></i>
                                <?= htmlspecialchars($entrevista['plataforma'], ENT_QUOTES, 'UTF-8') ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</section>