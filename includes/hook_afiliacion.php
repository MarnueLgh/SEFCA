<div class="section-gap">
    <hr>
</div>

<?php
/**
 * Hook de afiliación listo para usarse como include.
 * Compatible con PHP 5.3.
 *
 * Uso básico:
 * include 'hook_afiliacion_include.php';
 *
 * Uso con datos personalizados antes del include:
 * $hook_afiliacion_data = array(
 *     'titulo_linea_1' => 'Tu experiencia vale.',
 *     'titulo_linea_2' => 'Compártela, multiplícala.',
 *     'subtitulo'      => 'Únete a una comunidad que impulsa a la siguiente generación.',
 *     'boton'          => array(
 *         'texto'  => 'Afíliate',
 *         'enlace' => '#'
 *     )
 * );
 * include 'hook_afiliacion_include.php';
 */

$hook_afiliacion_default = array(
    'titulo_linea_1' => 'Tu experiencia vale.',
    'titulo_linea_2' => 'Compártela, multiplícala.',
    'subtitulo'      => 'Únete a una comunidad que impulsa a la siguiente generación.',
    'boton'          => array(
        'texto'  => 'Afíliate',
        'enlace' => '#'
    )
);

if (!isset($hook_afiliacion_data) || !is_array($hook_afiliacion_data)) {
    $hook_afiliacion_data = array();
}

$hook_afiliacion = $hook_afiliacion_default;
foreach ($hook_afiliacion_data as $hook_key => $hook_value) {
    if ($hook_key === 'boton' && is_array($hook_value)) {
        foreach ($hook_value as $hook_boton_key => $hook_boton_value) {
            $hook_afiliacion['boton'][$hook_boton_key] = $hook_boton_value;
        }
    } else {
        $hook_afiliacion[$hook_key] = $hook_value;
    }
}

$hook_titulo_1 = htmlspecialchars($hook_afiliacion['titulo_linea_1'], ENT_QUOTES, 'UTF-8');
$hook_titulo_2 = htmlspecialchars($hook_afiliacion['titulo_linea_2'], ENT_QUOTES, 'UTF-8');
$hook_subtitulo = htmlspecialchars($hook_afiliacion['subtitulo'], ENT_QUOTES, 'UTF-8');
$hook_boton_texto = htmlspecialchars($hook_afiliacion['boton']['texto'], ENT_QUOTES, 'UTF-8');
$hook_boton_enlace = htmlspecialchars($hook_afiliacion['boton']['enlace'], ENT_QUOTES, 'UTF-8');
?>

<style>
    .hook-afiliacion {
        --hook-color-bg: var(--card_bg_color);
        --hook-color-title: var(--azul_unam);
        --hook-color-text: var(--secondary);
        --hook-color-btn-bg: var(--azul_unam);
        --hook-color-btn-border: var(--azul_unam);
        --hook-color-btn-text: #ffffff;
        --hook-color-btn-bg-hover: var(--dorado-unam);
        --hook-color-btn-border-hover: var(--dorado-unam);
        --hook-color-btn-text-hover: #ffffff;
        --hook-font-title: var(--fuente-titulo);
        --hook-font-main: var(--fuente-texto);

        box-sizing: border-box;
        width: 100%;
        min-height: 313px;
        background-color: var(--hook-color-bg);
        color: var(--hook-color-text);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        font-family: var(--hook-font-main);
        padding: 3rem 0;
    }

    .hook-afiliacion,
    .hook-afiliacion * {
        box-sizing: border-box;
    }

    .hook-afiliacion__inner {
        width: 100%;
        max-width: 900px;
        padding: 20px 24px;
        text-align: center;
    }

    .hook-afiliacion__title {
        margin: 0 0 20px;
        color: var(--hook-color-title);
        font-family: var(--hook-font-title);
        font-size: clamp(2.2rem, 4.5vw, 3.2rem);
        font-weight: 600;
        line-height: 1.2;
        letter-spacing: -0.02em;
    }

    .hook-afiliacion__title-line {
        display: block;
    }

    .hook-afiliacion__subtitle {
        max-width: 700px;
        margin: 0 auto 36px;
        color: var(--hook-color-text);
        font-family: var(--hook-font-main);
        font-size: clamp(1.1rem, 2.2vw, 1.3rem);
        font-weight: 300;
        line-height: 1.6;
    }

    .hook-afiliacion__button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 140px;
        height: 46px;
        padding: 11px 28px;
        border: 2px solid var(--hook-color-btn-border);
        border-radius: 50px;
        background-color: var(--hook-color-btn-bg);
        color: var(--hook-color-btn-text);
        font-family: var(--hook-font-main);
        font-size: 0.95rem;
        font-weight: 500;
        line-height: 1;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s ease,
                    border-color 0.3s ease,
                    color 0.3s ease,
                    transform 0.2s cubic-bezier(0.16, 1, 0.3, 1),
                    box-shadow 0.3s ease;
    }

    .hook-afiliacion__button:hover {
        background-color: var(--hook-color-btn-bg-hover);
        border-color: var(--hook-color-btn-border-hover);
        color: var(--hook-color-btn-text-hover);
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(156, 110, 9, 0.25);
    }

    .hook-afiliacion__button:active {
        transform: translateY(1px);
        box-shadow: 0 2px 6px rgba(156, 110, 9, 0.15);
    }

    .hook-afiliacion__icon {
        width: 16px;
        height: 16px;
        margin-left: 8px;
        stroke: currentColor;
        stroke-width: 2.2;
        fill: none;
        transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .hook-afiliacion__button:hover .hook-afiliacion__icon {
        transform: translateX(3px);
    }

    @media (max-width: 768px) {
        .hook-afiliacion {
            min-height: 300px;
            padding: 2rem 0;
        }

        .hook-afiliacion__inner {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        .hook-afiliacion {
            min-height: 280px;
        }

        .hook-afiliacion__button {
            width: 100%;
            max-width: 300px;
        }
    }
</style>

<section class="hook-afiliacion" aria-labelledby="hook-afiliacion-title">
    <div class="hook-afiliacion__inner">
        <h2 class="hook-afiliacion__title" id="hook-afiliacion-title">
            <span class="hook-afiliacion__title-line"><?php echo $hook_titulo_1; ?></span>
            <span class="hook-afiliacion__title-line"><?php echo $hook_titulo_2; ?></span>
        </h2>

        <p class="hook-afiliacion__subtitle"><?php echo $hook_subtitulo; ?></p>

        <a class="hook-afiliacion__button" href="<?php echo $hook_boton_enlace; ?>">
            <span><?php echo $hook_boton_texto; ?></span>
            <svg class="hook-afiliacion__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </a>
    </div>
</section>

<div class="section-gap">
    <hr>
</div>