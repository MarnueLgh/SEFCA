<!DOCTYPE html>
<html lang="es">
<!--
    Autor: Anuar Manuel Olvera Ramirez
    Fecha: 06/09/2026
    Versión: 2.0
    Descripción: Página "Proyectos 2022-2026".
    Cada proyecto tiene ancla propia (#proyecto-<clave>), que es a donde
    apunta el menú en vez de crear una página por proyecto.
-->

<!-- Head -->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Spinner -->
    <?php include("includes/spinner.php"); ?>

    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Hero pagina -->
    <?php
        $heroTitulo = "Proyectos 2022-2026";
        $heroTexto  = "Las iniciativas que la Sociedad de Egresados impulsa para la Facultad y su comunidad.";
        include("includes/hero-pagina.php");
    ?>

    <!-- Contenido de los proyectos -->
    <?php include("includes/proyectos_contenido.php"); ?>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Botón para volver arriba -->
    <?php include("includes/volver_arriba_btn.php"); ?>

    <!-- Scripts -->
    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
