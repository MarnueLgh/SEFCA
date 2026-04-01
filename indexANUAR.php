<!DOCTYPE html>
<html lang="es">
<!-- 
    Autor: @anuar
    Fecha: 22/03/2026
    Descripción: Se modularizó el head
-->
<?php require_once("includes/head.php"); ?>

<body>
    <?php include("includes/spinner.php"); ?>

    <a id="inicio"></a>

    <?php include("includes/navbar.php"); ?>

    <?php include("includes/carousel.php"); ?>


    <?php include("includes/cita.php"); ?>

    <?php include("includes/mensajes.php"); ?>


    <!-- Video 2025 -->
    <div class="section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <a href="https://www.youtube.com/watch?v=3RzU-kjkvRo" target="_blank">
                        <img src="img/video_2025.jpg" class="img-fluid rounded shadow-sm" alt="Video SEFCA 2025">
                    </a>
                </div>
            </div>
        </div>
    </div>


    <?php //include("includes/parallax.php"); ?>

    <a id="consejo"></a>

    <?php include("includes/consejo.php"); ?> 


    <?php include("includes/conferencias.php"); ?>


    <?php include("includes/enlaces_relacionados.php"); ?>

    <?php include("includes/homenajes.php"); ?>


    <!-- Reconocimiento Paola Reynoso -->
    <div class="section-gap">
        <div class="container">
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h2 class="display-6 mb-4">Entrega de Reconocimiento a Paola Reynoso</h2>
                    <p>
                        El 8 de junio 2023, en sesión conjunta del Consejo Directivo y del Consejo Consultivo,
                        presidida por su Presidente Lic. Isaac Chertorivski y por el Director de la FCA, Mtro.
                        Tomás Humberto Rubio Pérez, se hizo entrega de un Diploma SEFCA UNAM a PAOLA REYNOSO
                        egresada distinguida de la FCA, en reconocimiento a que obtuvo el Primer Lugar del
                        Premio Internacional Universia Santander 2023. Igualmente se le designó como Afiliada
                        Honoraria de SEFCA UNAM.
                    </p>
                    <div class="mt-3">
                        <a class="btn-hero" href="img/agradecimiento_paola.jpg"
                            target="_blank">Ver agradecimiento <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="img/paola1.jpg" alt="Paola Reynoso" class="img-fluid rounded shadow-sm">
                </div>
            </div>
        </div>
    </div>


    <a id="proyectos"></a>

    <?php include("includes/proyectos.php"); ?>


    <?php require_once("includes/footer.php"); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>
</body>

</html>