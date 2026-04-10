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

?>

<section class="hero-pagina">
    <div>
        <h1><?php echo htmlspecialchars($heroTitulo, ENT_QUOTES, 'UTF-8'); ?></h1>
        <p><?php echo htmlspecialchars($heroTexto, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
</section>