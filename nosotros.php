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
        $heroTitulo = "Quiénes somos";
        $heroTexto  = "Conoce más sobre la historia de la SEFCA y quienes la conforman.";
        $heroClase  = "hero-pagina--carta";
        include("includes/hero-pagina.php");
    ?>

    <!-- Mensajes -->
    <?php include("includes/mensajes.php"); ?>

    <!-- Consejo directivo -->
    <?php include("includes/consejo.php"); ?>

    <!-- Video Celebración 30 años -->
    <div class="section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="ratio ratio-16x9 rounded-4 shadow-lg overflow-hidden border">
                        <iframe 
                            src="https://www.youtube.com/embed/3RzU-kjkvRo" 
                            title="Celebramos nuestros más de 30 años de historia" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            referrerpolicy="strict-origin-when-cross-origin" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Homenajes (Movido desde index.php) -->
    <?php include("includes/homenajes.php"); ?>

    <!-- Contenido principal -->
    <div class="section-gap">
        <div class="container">
            <?php include("includes/enlaces_relacionados.php"); ?>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Volver a inicio -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
