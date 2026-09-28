<!DOCTYPE html>
<html lang="es">
<!--
    Fecha: 06/09/2026
    Versión: 2.0
    Descripción: Página "Eventos" (rubro Experiencia y orgullo).
    El listado completo lo arma includes/listado_eventos.php.
-->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Spinner -->
    <?php include("includes/spinner.php"); ?>
    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Hero pagina -->
    <?php
        $heroTitulo = "Eventos";
        $heroTexto  = "Experiencia y orgullo: actividades, reconocimientos y celebraciones de la Sociedad de Egresados de la FCA.";
        include("includes/hero-pagina.php");
    ?>

    <!-- Listado de eventos -->
    <?php
        require_once __DIR__ . '/includes/datos_eventos.php';

        $eventos_a_listar = obtener_eventos_listado();
        $eventos_vacio_texto = 'No se encontraron eventos con los filtros seleccionados.';

        include("includes/listado_eventos.php");
    ?>

    <!-- Footer -->
    <?php require_once("includes/footer.php"); ?>

    <!-- Botón para volver arriba -->
    <?php include("includes/volver_arriba_btn.php"); ?>

    <!-- Scripts -->
    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
