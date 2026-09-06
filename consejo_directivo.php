<!DOCTYPE html>
<html lang="es">
<!--
    Autor: Anuar Manuel Olvera Ramirez
    Fecha: 06/09/2026
    Versión: 1.0
    Descripción: Página "Consejo Directivo" (rubro Somos SEFCA).
    Sustituye a nosotros.php, que se dividió para separar el Consejo
    de los Mensajes institucionales.
-->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Spinner -->
    <?php include("includes/spinner.php"); ?>
    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Hero pagina -->
    <?php
        $heroTitulo = "Consejo Directivo";
        $heroTexto  = "Somos SEFCA: conoce a las y los integrantes que dan vida a la Sociedad de Egresados de la FCA.";
        include("includes/hero-pagina.php");
    ?>

    <!-- Consejo directivo -->
    <?php include("includes/consejo.php"); ?>

    <!-- Estatutos -->
    <?php include("includes/estatutos.php"); ?>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Botón para volver arriba -->
    <?php include("includes/volver_arriba_btn.php"); ?>

    <!-- Scripts -->
    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
