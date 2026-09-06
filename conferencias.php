<!DOCTYPE html>
<html lang="es">
<!--
    Autor: Anuar Manuel Olvera Ramirez
    Fecha: 06/09/2026
    Versión: 1.0
    Descripción: Página "Conferencias" (rubro Experiencia y orgullo).
    Reutiliza includes/listado_eventos.php filtrando por tipo 'conferencia'.
-->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Spinner -->
    <?php include("includes/spinner.php"); ?>
    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Hero pagina -->
    <?php
        $heroTitulo = "Conferencias";
        $heroTexto  = "Experiencia y orgullo: los ciclos de conferencias magistrales que la SEFCA lleva a la comunidad de la FCA.";
        include("includes/hero-pagina.php");
    ?>

    <!-- Listado de conferencias -->
    <?php
        require_once __DIR__ . '/includes/datos_eventos.php';

        $eventos_a_listar = obtener_eventos_listado('conferencia');
        $eventos_vacio_texto = 'No se encontraron conferencias con los filtros seleccionados.';

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
