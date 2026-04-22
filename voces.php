<!-- 
    Fecha: 14/04/2026
    Descripción: Página "Voces"
-->

<!DOCTYPE html>
<html lang="es">

<!-- Head -->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Spinner -->
    <?php include("includes/spinner.php"); ?>

    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Variables para el hero -->
    <?php
    $heroTitulo = "Voces";
    $heroTexto = "Conoce a los integrantes que dan vida a la SEFCA.";
    $heroClase = "hero-pagina--carta";
    include("includes/hero-pagina.php");
    ?>

    <!-- Homenajes (Movido desde index.php) -->
    <?php include("includes/homenajes.php"); ?>

    <!-- Contenido principal -->
    <div class="section-gap">
        <div class="container">
            <?php include("includes/entrevistas.php"); ?>
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