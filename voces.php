<!DOCTYPE html>
<html lang="es">
<!--
    Autor: Anuar Manuel Olvera Ramirez
    Fecha: 06/09/2026
    Versión: 2.0
    Descripción: Página "Voces SEFCA" (rubro Conoce nuestras historias).
    Los homenajes se movieron a egresados_distinguidos.php; aquí quedan
    las entrevistas en video a la comunidad.
-->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Spinner -->
    <?php include("includes/spinner.php"); ?>
    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Hero pagina -->
    <?php
        $heroTitulo = "Voces SEFCA";
        $heroTexto  = "Conoce nuestras historias: egresadas y egresados de la FCA comparten en primera persona lo que han construido.";
        include("includes/hero-pagina.php");
    ?>

    <!-- Contenido principal -->
    <div class="section-gap">
        <div class="container">
            <?php include("includes/entrevistas.php"); ?>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Botón para volver arriba -->
    <?php include("includes/volver_arriba_btn.php"); ?>

    <!-- Scripts -->
    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
