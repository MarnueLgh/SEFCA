<!DOCTYPE html>
<html lang="es">

<?php require_once("includes/head.php"); ?>

<body>
    <?php include("includes/spinner.php"); ?>
    <?php include("includes/navbar.php"); ?>

    <!-- Hero -->
    <?php
    $heroTitulo = "Carta Estratégica";
    $heroTexto = "Principios, visión y ejes que guían el compromiso de la Sociedad de Egresados con la FCA y la UNAM.";
    $heroClase = "hero-pagina--carta";
    include("includes/hero-pagina.php");
    ?>

    <div class="carta-main">

        <!-- ============================
             MISIÓN — Texto izq, imagen der
             ============================ -->
        <section class="carta-section">
            <div class="carta-section-texto">
                <h2 class="carta-section-titulo">
                    Nuestra <em>Misión</em>
                </h2>
                <p class="carta-section-cuerpo">
                    Representar con fuerza y compromiso a quienes egresan de la FCA. Apoyar a nuestra
                    Universidad y nuestra Facultad en los temas prioritarios que se nos convoque; así como
                    hacer sugerencias de iniciativas valiosas.
                </p>
            </div>
            <div class="carta-section-visual carta-section-visual-mision">
                <img class="carta-section-img" src="img/fca/FCA_UNAM_letras.jpg" alt="FCA UNAM">
            </div>
        </section>

        <div class="carta-divider"></div>

        <!-- ============================
             VISIÓN — Card izq, texto der
             ============================ -->
        <section class="carta-section carta-section-reversa">
            <div class="carta-section-texto">
                <h2 class="carta-section-titulo">
                    Nuestra <em>Visión</em>
                </h2>
                <p class="carta-section-cuerpo">
                    Para el término de nuestro primer periodo 2022-2024 tener afiliados 500 universitarios que
                    hayan aportado su cuota. Desarrollar acciones para atraer los recursos necesarios para los
                    proyectos en que se nos invite a participar. Compartir con egresados y todo el alumnado de la
                    FCA nuestra experiencia y orgullo.
                </p>
            </div>
            <div class="carta-section-visual carta-section-visual-vision">
                <img class="carta-section-img" src="img/fca/fca_entrada.jpg" alt="Entrada FCA">
            </div>
        </section>

        <div class="carta-divider"></div>

        <!-- ============================
             VALORES — Texto izq, card der
             ============================ -->
        <section class="carta-section">
            <div class="carta-section-texto">
                <h2 class="carta-section-titulo">
                    Nuestros <em>Valores</em>
                </h2>
                <p class="carta-section-cuerpo">
                    Los pilares que definen la identidad y el actuar de la Sociedad de
                    Egresados de la FCA en cada una de sus iniciativas.
                </p>
                <ul class="carta-section-lista">
                    <li>Integridad</li>
                    <li>Compromiso</li>
                    <li>Fortaleza</li>
                    <li>Orgullo</li>
                </ul>
            </div>
            <div class="carta-section-visual carta-section-visual-valores">
                <img class="carta-section-img" src="img/fca/biblioteca_fca.jpeg" alt="Biblioteca FCA">
            </div>
        </section>

        <div class="carta-divider"></div>

        <!-- ============================
             EJES — Card izq, texto der
             ============================ -->
        <section class="carta-section carta-section-reversa">
            <div class="carta-section-texto">
                <h2 class="carta-section-titulo">
                    Ejes <em>Estratégicos</em>
                </h2>
                <p class="carta-section-cuerpo">
                    Las líneas de acción que orientan el trabajo de la SEFCA para cumplir su
                    misión y alcanzar su visión a largo plazo.
                </p>
                <ul class="carta-section-lista">
                    <li>Afiliación y Registro</li>
                    <li>Experiencia y Orgullo a compartir</li>
                    <li>Vinculación con el sector productivo</li>
                    <li>Atracción de recursos para proyectos prioritarios</li>
                </ul>
            </div>
            <div class="carta-section-visual carta-section-visual-ejes">
                <img class="carta-section-img" src="img/fca/posgrado_fca.jpg" alt="FCA Atardecer">
            </div>
        </section>

        <!-- ============================
             ESTATUTOS
             ============================ -->
        <section class="carta-estatutos">
            <div class="carta-estatutos-inner">
                <h2 class="carta-estatutos-titulo">Estatutos</h2>
                <p class="carta-estatutos-desc">
                    Consulta los estatutos vigentes de la Sociedad de Egresados de la
                    Facultad de Contaduría y Administración de la UNAM.
                </p>
                <a class="boton-sm" href="docs/estatutos_v2.pdf" target="_blank" rel="noopener noreferrer">
                    <i class="fas fa-download"></i> Descargar
                </a>
            </div>
        </section>

    </div>

    <?php require_once("includes/footer.php"); ?>

    <!-- Volver a inicio -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
