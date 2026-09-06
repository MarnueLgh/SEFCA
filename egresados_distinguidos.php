<!DOCTYPE html>
<html lang="es">
<!--
    Autor: Anuar Manuel Olvera Ramirez
    Fecha: 06/09/2026
    Versión: 1.0
    Descripción: Página "Egresados distinguidos" (rubro Conoce nuestras historias).
    Combina los homenajes (antes en voces.php) con las fichas de eventos
    marcadas como tipo 'egresado_distinguido', reutilizando el listado único.
-->
<?php require_once("includes/head.php"); ?>

<body>
    <!-- Spinner -->
    <?php include("includes/spinner.php"); ?>
    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Hero pagina -->
    <?php
        $heroTitulo = "Egresados distinguidos";
        $heroTexto  = "Conoce nuestras historias: la trayectoria, los logros y el legado de quienes salieron de la FCA y siguen formando parte de la comunidad.";
        include("includes/hero-pagina.php");
    ?>

    <!-- Homenajes (movido desde voces.php) -->
    <?php include("includes/homenajes.php"); ?>

    <!-- Reconocimientos y visitas registrados como eventos -->
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <span class="text-uppercase subtitle-gold">Reconocimientos y visitas</span>
            <h2 class="carta-section-titulo">Egresados que <em>regresan</em> a la Facultad</h2>
        </div>
    </div>

    <?php
        require_once __DIR__ . '/includes/datos_eventos.php';

        $eventos_a_listar = obtener_eventos_listado('egresado_distinguido');
        $eventos_vacio_texto = 'No se encontraron reconocimientos con los filtros seleccionados.';

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
