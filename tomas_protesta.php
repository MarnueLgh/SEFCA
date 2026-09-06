<!DOCTYPE html>
<html lang="es">
<!--
    Autor: Anuar Manuel Olvera Ramirez
    Fecha: 06/09/2026
    Versión: 1.0
    Descripción: Página "Tomas de protesta" (rubro Somos SEFCA).
    Reutiliza includes/listado_eventos.php filtrando por tipo 'toma_protesta'.
-->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Spinner -->
    <?php include("includes/spinner.php"); ?>
    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Hero pagina -->
    <?php
        $heroTitulo = "Tomas de protesta";
        $heroTexto  = "Somos SEFCA: las ceremonias en las que cada mesa directiva asume el compromiso con la comunidad de egresadas y egresados de la FCA.";
        include("includes/hero-pagina.php");
    ?>

    <!-- Listado de tomas de protesta -->
    <?php
        require_once __DIR__ . '/includes/datos_eventos.php';

        $eventos_a_listar = obtener_eventos_listado('toma_protesta');
        $eventos_vacio_texto = 'No se encontraron tomas de protesta con los filtros seleccionados.';

        include("includes/listado_eventos.php");
    ?>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Botón para volver arriba -->
    <?php include("includes/volver_arriba_btn.php"); ?>

    <!-- Scripts -->
    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
