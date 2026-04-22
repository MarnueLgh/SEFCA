<!-- 
    Fecha: 14/04/2026
    Descripción: Sección de proyectos con layout horizontal (imagen + texto).
    Escalable: agregar un nuevo proyecto al array $proyectos es suficiente.
-->
<?php
$proyectos = [
    [
        'clave' => 'aulas-dignas',
        'titulo' => 'Aulas dignas para la FCA.',
        'descripcion' => 'La Facultad de Contaduría y Administración de la UNAM impulsa la transformación y para seguir formando a los líderes que México necesita, es indispensable contar con espacios educativos modernos, funcionales y dignos. Por ello, la Sociedad de Egresados de la FCA ha lanzado la iniciativa "Aulas Dignas para la FCA", un proyecto que busca renovar y equipar las aulas de nuestra Facultad.',
        'imagen' => 'img/fca/aulas_proyecto.jpg',
        'alt' => 'Estudiantes en aula de la FCA',
        'enlace' => 'docs/resumen_aulas.pdf',          // URL destino (cuando exista página propia)
        'enlace_texto' => 'Conoce más', // Texto del botón
    ],
    // Para agregar otro proyecto, copia el bloque anterior y edita los valores:
    // [
    //     'clave'       => 'otro-proyecto',
    //     'titulo'      => 'Nombre del proyecto',
    //     'descripcion' => 'Descripción breve del proyecto.',
    //     'imagen'      => 'img/fca/otra_imagen.jpg',
    //     'alt'         => 'Texto alternativo de la imagen',
    //     'enlace'      => '#URL Destino',
    //     'enlace_texto'=> 'Conoce más',
    // ],
];
?>

<section class="proyectos-section section-gap">
    <div class="container">
        <?php foreach ($proyectos as $i => $p): ?>
            <article class="proyecto-split <?= $i % 2 !== 0 ? 'proyecto-split-invertido' : '' ?>"
                id="proyecto-<?= htmlspecialchars($p['clave']) ?>">

                <!-- Imagen -->
                <div class="proyecto-split-img-col">
                    <img src="<?= htmlspecialchars($p['imagen']) ?>" alt="<?= htmlspecialchars($p['alt']) ?>"
                        class="proyecto-split-img" loading="lazy">
                </div>

                <!-- Contenido -->
                <div class="proyecto-split-contenido">
                    <h2 class="proyecto-split-titulo"><?= $p['titulo'] ?></h2>
                    <p class="proyecto-split-desc"><?= $p['descripcion'] ?></p>

                    <?php if (!empty($p['enlace']) && $p['enlace'] !== '#'): ?>
                        <a href="<?= htmlspecialchars($p['enlace']) ?>" class="boton-sm" target="_blank" rel="noopener noreferrer">
                            <?= htmlspecialchars($p['enlace_texto']) ?>
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </article>

            <?php if ($i < count($proyectos) - 1): ?>
                <hr class="proyecto-split-divider">
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
