<!DOCTYPE html>
<html lang="es">
<!-- 
    Fecha: 22/03/2026
    Descripción: Se modularizó el head
-->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Pantalla de carga -->
    <?php include("includes/spinner.php"); ?>

    <a id="inicio"></a>

    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Carousel -->
    <?php include("includes/carousel.php"); ?>

    <!-- Cita -->
    <?php include("includes/cita.php"); ?>

    <!-- Call to action -->
    <?php include("includes/call_to_action.php"); ?>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <!-- ====== Scripts ====== -->
    <?php require_once("includes/scripts.php"); ?>
</body>

</html>