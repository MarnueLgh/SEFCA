<!DOCTYPE html>
<html lang="es">
<!-- 
    Autor: @anuar
    Fecha: 01/04/2026
    Descripción: Página "Nosotros"
-->
<?php require_once("includes/head.php"); ?>

<body>
    <?php include("includes/spinner.php"); ?>

    <?php include("includes/navbar.php"); ?>

    <?php
        $heroTitulo = "Proyectos";
        $heroTexto  = "Conoce más sobre los proyectos de la SEFCA.";
        $heroClase  = "hero-pagina--carta";
        include("includes/hero-pagina.php");
    ?>

    <?php include("includes/proyectos.php"); ?>

    <?php require_once("includes/footer.php"); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
