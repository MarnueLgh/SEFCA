<!DOCTYPE html>
<html lang="es">
<!-- 
    Fecha: 14/04/2026
    Descripción: Página "Proyectos"
-->

<!-- Head -->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Spinner -->
    <?php include("includes/spinner.php"); ?>

    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Variables para el hero -->
    <?php
        $heroTitulo = "Proyectos";
        $heroTexto  = "Conoce más sobre los proyectos de la SEFCA.";
        $heroClase  = "hero-pagina--carta";
        include("includes/hero-pagina.php");
    ?>

    <!-- Contenido de los proyectos -->
    <?php include("includes/proyectos_contenido.php"); ?>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Volver a inicio -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
