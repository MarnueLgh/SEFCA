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
 *         'texto'  => '¡Sé parte de SEFCA!',
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
        'texto'  => '¡Sé parte de SEFCA!',
        'enlace' => 'afiliacion_forms.php'
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
        /*
         * =========================================================================
         *  CONFIGURACIÓN DEL FONDO PARALLAX / PARALLAX BACKGROUND CONFIGURATION
         * =========================================================================
         *
         * 1. RUTA DE LA IMAGEN DE FONDO (Reemplaza 'img/parallax.jpg' por la tuya)
         */
        --hook-bg-image: url('img/parallax_nv_generacion.png');

        /*
         * 2. COLOR DE SUPERPOSICIÓN (Overlay para asegurar la legibilidad del texto)
         *    Usa rgba(r, g, b, opacidad) o cambia a 'transparent' si no la quieres.
         */
        --hook-overlay-color: rgba(18, 30, 49, 0.65); /* Azul oscuro de la UNAM con opacidad */

        /*
         * 3. COLORES DEL TEXTO (Ajusta según convenga con tu imagen de fondo)
         */
        --hook-color-title: #ffffff; /* Blanco para destacar sobre fondo oscuro */
        --hook-color-text: #f0f2f5;  /* Gris muy claro */

        --hook-font-title: var(--fuente-titulo);
        --hook-font-main: var(--fuente-texto);

        box-sizing: border-box;
        width: 100%;
        min-height: 380px;
        background-color: #121e31; /* Respaldo de fondo oscuro */
        background-image: var(--hook-bg-image);
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        color: var(--hook-color-text);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        font-family: var(--hook-font-main);
        padding: 4.5rem 0;
        position: relative; /* Necesario para posicionar la superposición */
    }

    .hook-afiliacion,
    .hook-afiliacion * {
        box-sizing: border-box;
    }

    /* Capa de overlay/superposición */
    .hook-afiliacion::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--hook-overlay-color);
        z-index: 1;
    }

    .hook-afiliacion__inner {
        width: 100%;
        max-width: 900px;
        padding: 20px 24px;
        text-align: center;
        position: relative;
        z-index: 2; /* Coloca el contenido por encima del overlay */
    }

    .hook-afiliacion__title {
        margin: 0 0 20px;
        color: var(--hook-color-title);
        font-family: var(--hook-font-title);
        font-size: clamp(2.2rem, 4.5vw, 3.2rem);
        font-weight: 600;
        line-height: 1.2;
        letter-spacing: -0.02em;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); /* Sombra sutil para mejorar el contraste */
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
        text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3); /* Sombra sutil para mejorar el contraste */
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

    /* Animación del ícono al pasar el mouse por encima del botón */
    .hook-afiliacion a:hover .hook-afiliacion__icon {
        transform: translateX(3px);
    }

    /* Fallback para dispositivos móviles/tablets (el scroll parallax suele fallar en iOS/Android) */
    @media (max-width: 1024px) {
        .hook-afiliacion {
            background-attachment: scroll;
            padding: 3.5rem 0;
            min-height: 320px;
        }
    }

    @media (max-width: 768px) {
        .hook-afiliacion__inner {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        .hook-afiliacion {
            min-height: 300px;
        }

        .hook-afiliacion .boton-sm-blanco {
            width: 100%;
            max-width: 300px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }
    }
</style>

<section class="hook-afiliacion section-gap" aria-labelledby="hook-afiliacion-title">

    <div class="hook-afiliacion__inner">
        <h2 class="hook-afiliacion__title" id="hook-afiliacion-title">
            <span class="hook-afiliacion__title-line"><?php echo $hook_titulo_1; ?></span>
            <span class="hook-afiliacion__title-line"><?php echo $hook_titulo_2; ?></span>
        </h2>

        <p class="hook-afiliacion__subtitle"><?php echo $hook_subtitulo; ?></p>

        <a class="boton-sm-blanco" href="<?php echo $hook_boton_enlace; ?>" target="_blank">
            <span><?php echo $hook_boton_texto; ?></span>
            <svg class="hook-afiliacion__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </a>
    </div>
</section>
