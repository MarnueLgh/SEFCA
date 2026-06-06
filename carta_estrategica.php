<!DOCTYPE html>
<html lang="es">

<?php require_once("includes/head.php"); ?>

<body>
    <?php include("includes/spinner.php"); ?>
    <?php include("includes/navbar.php"); ?>

    <?php
        $heroTitulo = "Carta Estratégica";
        $heroTexto = "Misión, visión, valores y ejes de trabajo de la Sociedad de Egresados de la FCA.";
        include("includes/hero-pagina.php");
    ?>

    <?php include("includes/carta_estrategica.php"); ?>

    <?php require_once("includes/footer.php"); ?>
    <?php include("includes/volver_arriba_btn.php"); ?>
    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
