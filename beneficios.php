<!DOCTYPE html>
<html lang="es">
<!-- 
    Fecha: 01/04/2026
    Descripción: Página "Beneficios"
-->
<?php require_once("includes/head.php"); ?>

<body>
    <?php include("includes/spinner.php"); ?>

    <?php include("includes/navbar.php"); ?>

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

    <!-- Volver a inicio -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>
</body>

</html>