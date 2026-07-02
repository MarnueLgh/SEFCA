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

    <!-- Hook de afiliación -->
    <?php include("includes/hook_afiliacion.php"); ?>

    <!-- Carta estratégica -->
    <?php include("includes/carta_estrategica.php"); ?>

    <!-- Carrusel de eventos recientes -->
    <?php include("includes/carrusel.php"); ?>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

    <!-- Botón para volver arriba -->
    <?php include("includes/volver_arriba_btn.php"); ?>

    <!-- Scripts -->
    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
