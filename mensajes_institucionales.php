<!DOCTYPE html>
<html lang="es">
<!--
    Autor: Anuar Manuel Olvera Ramirez
    Fecha: 06/09/2026
    Versión: 1.0
    Descripción: Página "Mensajes institucionales" (rubro Somos SEFCA).
    Se separó de nosotros.php, donde compartía página con el Consejo Directivo.
-->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Spinner -->
    <?php include("includes/spinner.php"); ?>
    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Hero pagina -->
    <?php
        $heroTitulo = "Mensajes institucionales";
        $heroTexto  = "Somos SEFCA: comunicados y cartas de nuestras autoridades a la comunidad de egresadas y egresados de la FCA.";
        include("includes/hero-pagina.php");
    ?>

    <!-- Mensajes -->
    <?php include("includes/mensajes.php"); ?>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Botón para volver arriba -->
    <?php include("includes/volver_arriba_btn.php"); ?>

    <!-- Scripts -->
    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
