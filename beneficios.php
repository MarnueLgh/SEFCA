<!DOCTYPE html>
<html lang="es">
<!-- 
    Fecha: 01/04/2026
    Descripción: Página "Beneficios"
-->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Spinner -->
    <?php include("includes/spinner.php"); ?>
    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- Hero pagina -->
    <?php
        $heroTitulo = "Beneficios";
        $heroTexto  = "Descubre todo lo que ofrece la SEFCA para ti.";
        $heroClase  = "hero-pagina--beneficios";
        include("includes/hero-pagina.php");
    ?>
    
    <!-- Listado de beneficios -->
    <?php include("includes/listado_beneficios.php"); ?>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Botón para volver arriba -->
    <?php include("includes/volver_arriba_btn.php"); ?>

    <!-- Scripts -->
    <?php require_once("includes/scripts.php"); ?>
</body>

</html>