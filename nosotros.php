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
        $heroTitulo = "Nosotros";
        $heroTexto  = "Conoce más sobre la historia y visión de la SEFCA.";
        $heroClase  = "hero-pagina--carta";
        include("includes/hero-pagina.php");
    ?>

    <!-- Mensajes -->
    <?php include("includes/mensajes.php"); ?>
    
    <!-- Contenido principal -->
    <div class="section-gap">
        <div class="container">
            <?php include("includes/enlaces_relacionados.php"); ?>
        </div>
    </div>

    <!-- Homenajes (Movido desde indexANUAR.php) -->
    <?php include("includes/homenajes.php"); ?>

    <!-- Video 30 años de historia (Movido desde indexANUAR.php) -->
    <div class="section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <a href="https://www.youtube.com/watch?v=3RzU-kjkvRo" target="_blank">
                        <img src="img/video_2025.jpg" class="img-fluid rounded shadow-sm" alt="Video SEFCA 2025">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php require_once("includes/footer.php"); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
