<!DOCTYPE html>
<html lang="es">

<?php require_once("includes/head.php"); ?>
<!-- CSS de Carta Estratégica -->
<link href="css/carta.css" rel="stylesheet">

<body>
    <?php include("includes/spinner.php"); ?>
    <?php include("includes/navbar.php"); ?>

    <!-- Hero -->
    <section class="carta-hero">
        <div>
            <h1>Carta Estratégica</h1>
            <p>Principios, visión y ejes que guían el compromiso de la Sociedad de Egresados con la FCA y la UNAM.</p>
        </div>
    </section>

    <div class="carta-main">

        <!-- ============================
             MISIÓN — Texto izq, imagen der
             ============================ -->
        <section class="carta-section">
            <div class="carta-section__text">
                <h2 class="carta-section__title">
                    Nuestra <em>Misión</em>
                </h2>
                <p class="carta-section__body">
                    Representar con fuerza y compromiso a quienes egresan de la FCA. Apoyar a nuestra 
                    Universidad y nuestra Facultad en los temas prioritarios que se nos convoque; así como 
                    hacer sugerencias de iniciativas valiosas.
                </p>
            </div>
            <div class="carta-section__visual carta-section__visual--mision">
                <img class="carta-section__img" src="img/fca/FCA_UNAM_letras.jpg" alt="FCA UNAM">
            </div>
        </section>

        <div class="carta-divider"></div>

        <!-- ============================
             VISIÓN — Card izq, texto der
             ============================ -->
        <section class="carta-section carta-section--reverse">
            <div class="carta-section__text">
                <h2 class="carta-section__title">
                    Nuestra <em>Visión</em>
                </h2>
                <p class="carta-section__body">
                    Para el término de nuestro primer periodo 2022-2024 tener afiliados 500 universitarios que 
                    hayan aportado su cuota. Desarrollar acciones para atraer los recursos necesarios para los 
                    proyectos en que se nos invite a participar. Compartir con egresados y todo el alumnado de la 
                    FCA nuestra experiencia y orgullo.
                </p>
            </div>
            <div class="carta-section__visual carta-section__visual--vision">
                <img class="carta-section__img" src="img/fca/fca_entrada.jpg" alt="Entrada FCA">
            </div>
        </section>

        <div class="carta-divider"></div>

        <!-- ============================
             VALORES — Texto izq, card der
             ============================ -->
        <section class="carta-section">
            <div class="carta-section__text">
                <h2 class="carta-section__title">
                    Nuestros <em>Valores</em>
                </h2>
                <p class="carta-section__body">
                    Los pilares que definen la identidad y el actuar de la Sociedad de 
                    Egresados de la FCA en cada una de sus iniciativas.
                </p>
            </div>
            <div class="carta-section__visual carta-section__visual--valores">
                <img class="carta-section__img" src="img/fca/pasillo_fca.jpg" alt="Pasillo FCA">
            </div>
        </section>

        <div class="carta-divider"></div>

        <!-- ============================
             EJES — Card izq, texto der
             ============================ -->
        <section class="carta-section carta-section--reverse">
            <div class="carta-section__text">
                <h2 class="carta-section__title">
                    Ejes <em>Estratégicos</em>
                </h2>
                <p class="carta-section__body">
                    Las líneas de acción que orientan el trabajo de la SEFCA para cumplir su 
                    misión y alcanzar su visión a largo plazo.
                </p>
            </div>
            <div class="carta-section__visual carta-section__visual--ejes">
                <img class="carta-section__img" src="img/fca/fca_atardecer.jpg" alt="FCA Atardecer">
            </div>
        </section>

        <!-- ============================
             ESTATUTOS
             ============================ -->
        <section class="carta-estatutos">
            <div class="carta-estatutos__inner">
                <h2 class="carta-estatutos__title">Estatutos</h2>
                <p class="carta-estatutos__desc">
                    Consulta los estatutos vigentes de la Sociedad de Egresados de la 
                    Facultad de Contaduría y Administración de la UNAM.
                </p>
                <a class="carta-btn" href="docs/estatutos_v2.pdf" target="_blank">
                    <i class="fas fa-download"></i> Descargar Estatutos
                </a>
            </div>
        </section>

    </div>

    <?php require_once("includes/footer.php"); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
