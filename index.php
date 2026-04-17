<!-- 
    Fecha: 10/04/2026
    Descripción: Index de la página web de la SEFCA
-->

<!DOCTYPE html>
<html lang="es">

<?php require_once("includes/head.php"); ?>

<body>
    <!-- Pantalla de carga -->
    <?php include("includes/spinner.php"); ?>

    <a id="inicio"></a>

    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Hero -->
    <?php include("includes/hero_index.php"); ?>
    
    <!-- Cita -->
    <?php //include("includes/cita.php"); ?>

    <!-- Carta estratégica -->
    <?php include("includes/carta_estrategica.php"); ?>

    <!-- Carrusel de eventos recientes -->
    <?php include("includes/carrusel.php"); ?>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Volver a inicio -->
    <a href="#inicio" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <!-- ====== Scripts ====== -->
    <?php require_once("includes/scripts.php"); ?>
</body>

</html>