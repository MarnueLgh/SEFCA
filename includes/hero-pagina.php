<?php
/*
    Fecha: 01/04/2026
    Descripción: Componente hero reutilizable para páginas internas.

    USO:
    Antes de incluir este archivo, definir las siguientes variables:
        $heroTitulo  → (obligatorio) Título principal del hero (ej. "Eventos")
        $heroTexto   → (obligatorio) Párrafo descriptivo debajo del título
        $heroClase   → (opcional)    Clase CSS extra para personalizar fondo/colores (ej. "hero-pagina--carta")

    EJEMPLO:
        <?php
            $heroTitulo = "Carta Estratégica";
            $heroTexto  = "Principios, visión y ejes que guían el compromiso...";
            $heroClase  = "hero-pagina--carta";
            include("includes/hero-pagina.php");
        ?>
*/

// Si no se definieron las variables obligatorias, no renderizar nada
if (!isset($heroTitulo) || !isset($heroTexto)) {
    return;
}

$heroClaseSeguro = '';

if (isset($heroClase)) {
    $heroClaseSeguro = trim(preg_replace('/[^a-zA-Z0-9_ -]/', '', $heroClase));
}

$heroClases = trim('hero-pagina ' . $heroClaseSeguro);

?>

<section class="<?php echo htmlspecialchars($heroClases, ENT_QUOTES, 'UTF-8'); ?>">
    <picture class="hero-pagina-imagen">
        <source
            type="image/webp"
            media="(max-width: 767px)"
            srcset="img/fca/hero_fca_900.webp">
        <source
            type="image/webp"
            srcset="img/fca/hero_fca_1600.webp">
        <source
            media="(max-width: 767px)"
            srcset="img/fca/hero_fca_900.jpg">
        <img
            src="img/fca/hero_fca_1600.jpg"
            alt=""
            width="1600"
            height="1092"
            loading="eager"
            fetchpriority="high"
            decoding="async"
            aria-hidden="true">
    </picture>
    <div class="hero-pagina-contenido">
        <h1><?php echo htmlspecialchars($heroTitulo, ENT_QUOTES, 'UTF-8'); ?></h1>
        <p><?php echo htmlspecialchars($heroTexto, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
</section>
