<!DOCTYPE html>
<html lang="es">
<!-- 
    Fecha: 01/04/2026
    Descripción: Página "Nosotros"
-->
<?php require_once("includes/head.php"); ?>

<body>
    <?php include("includes/spinner.php"); ?>

    <?php include("includes/navbar.php"); ?>

    <?php
        $heroTitulo = "Directiva";
        $heroTexto  = "Conoce más sobre los miembros directivos que conforman la SEFCA.";
        $heroClase  = "hero-pagina--carta";
        include("includes/hero-pagina.php");
    ?>
    
    <!-- Consejo directivo -->
    <?php include("includes/consejo.php"); ?>

    <!-- Mensajes -->
    <?php include("includes/mensajes.php"); ?>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Volver a inicio -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
