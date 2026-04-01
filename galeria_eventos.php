<!DOCTYPE html>
<html lang="es">

<?php require_once("includes/head.php"); ?>
<!-- CSS de Eventos -->
<link href="css/eventos.css" rel="stylesheet">

<body>
    <?php include("includes/spinner.php"); ?>
    <?php include("includes/navbar.php"); ?>

    <!-- Hero -->
    <?php
        $heroTitulo = "Eventos";
        $heroTexto  = "Actividades, reconocimientos y celebraciones de la Sociedad de Egresados de la FCA.";
        include("includes/hero-pagina.php");
    ?>

    <!-- Listado de Eventos -->
    <div class="eventos-container">
        <div class="eventos-grid">

            <!--
                ╔══════════════════════════════════════════════╗
                ║  PLANTILLA PARA AGREGAR UN NUEVO EVENTO      ║
                ║  Copia todo el bloque <article> y cambia:    ║
                ║  1. src de la imagen                         ║
                ║  2. Fecha                                    ║
                ║  3. Título                                   ║
                ║  4. Descripción                              ║
                ║  5. href del enlace (galería o documento)    ║
                ╚══════════════════════════════════════════════╝
            -->

            <!-- ========== EVENTO: Concurso de Ensayo SEFCA 2025 ========== -->
            <article class="evento-card">
                <div class="evento-card__img">
                    <img src="img/concurso_ensayo.jpg" alt="Concurso de Ensayo SEFCA 2025">
                </div>
                <div class="evento-card__body">
                    <span class="evento-card__date">4 de septiembre de 2025</span>
                    <h2 class="evento-card__title">Convocatoria Concurso de Ensayo SEFCA 2025</h2>
                    <p class="evento-card__desc">
                        Convocatoria abierta para participar en el Concurso de Ensayo organizado por la SEFCA UNAM.
                    </p>
                    <a class="evento-card__link" href="docs/concurso_ensayo_SEFCA_25.pdf" target="_blank">
                        Ver más <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== EVENTO: Visita Alfredo Harp Helú ========== -->
            <article class="evento-card">
                <div class="evento-card__img">
                    <img src="img/250324_Visita_de_Alfredo_Harp_Helu.jpg" alt="Visita de Alfredo Harp Helú">
                </div>
                <div class="evento-card__body">
                    <span class="evento-card__date">24 de marzo de 2025</span>
                    <h2 class="evento-card__title">Visita de Alfredo Harp Helú</h2>
                    <p class="evento-card__desc">
                        Visita del empresario y filántropo Alfredo Harp Helú a las instalaciones de la Facultad de 
                        Contaduría y Administración.
                    </p>
                    <a class="evento-card__link" href="evento_galeria.php?evento=alfredo_helu">
                        Ver galería <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== EVENTO: Toma de protesta de la mesa directiva 2024-2026 ========== -->
            <article class="evento-card">
                <div class="evento-card__img">
                    <img src="img/toma_protesta_2024.jpg" alt="Toma de protesta de la mesa directiva 2024-2026">
                </div>
                <div class="evento-card__body">
                    <span class="evento-card__date">17 de octubre de 2024</span>
                    <h2 class="evento-card__title">Toma de protesta de la mesa directiva 2024-2026</h2>
                    <p class="evento-card__desc">
                        Ceremonia de toma de protesta de la mesa directiva de la Sociedad de Egresados de la FCA para el periodo 2024-2026.
                    </p>
                    <a class="evento-card__link" href="docs/toma_protesta_2024-2026.pdf" target="_blank">
                        Ver más <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== EVENTO: Informe de actividades 2022-2023 ========== -->
            <article class="evento-card">
                <div class="evento-card__img">
                    <img src="img/informe_actividades.jpg" alt="Informe de actividades 2022-2023">
                </div>
                <div class="evento-card__body">
                    <span class="evento-card__date">8 de junio de 2023</span>
                    <h2 class="evento-card__title">Informe de actividades 2022 – 2023</h2>
                    <p class="evento-card__desc">
                        Presentación del informe de actividades de la Sociedad de Egresados correspondiente al periodo 2022-2023.
                    </p>
                    <a class="evento-card__link" href="docs/informe_actividades.pdf" target="_blank">
                        Ver más <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== EVENTO: Reconocimiento Paola Reynoso ========== -->
            <article class="evento-card">
                <div class="evento-card__img">
                    <img src="img/paola1.jpg" alt="Entrega de Reconocimiento a Paola Reynoso">
                </div>
                <div class="evento-card__body">
                    <span class="evento-card__date">8 de junio de 2023</span>
                    <h2 class="evento-card__title">Entrega de Reconocimiento a Paola Reynoso</h2>
                    <p class="evento-card__desc">
                        En sesión conjunta del Consejo Directivo y del Consejo Consultivo, se hizo entrega de un 
                        Diploma SEFCA UNAM a Paola Reynoso, egresada distinguida de la FCA, en reconocimiento a 
                        que obtuvo el Primer Lugar del Premio Internacional Universia Santander 2023.
                    </p>
                    <a class="evento-card__link" href="img/agradecimiento_paola.jpg" target="_blank">
                        Ver más <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- ========== EVENTO: 30 Aniversario de Egresados ========== -->
            <article class="evento-card">
                <div class="evento-card__img">
                    <img src="img/egresados.jpg" alt="30 aniversario de egresados">
                </div>
                <div class="evento-card__body">
                    <span class="evento-card__date">1 de marzo de 2023</span>
                    <h2 class="evento-card__title">30 aniversario de egresados de la SEFCA</h2>
                    <p class="evento-card__desc">
                        Celebración del trigésimo aniversario de la Sociedad de Egresados en el Palacio de Autonomía. 
                        Evento conmemorativo con la presencia de autoridades y miembros distinguidos.
                    </p>
                    <a class="evento-card__link" href="evento_galeria.php?evento=30_aniversario">
                        Ver galería <i class="fas fa-arrow-right"></i>
                    </a>
                    <a class="evento-card__link" href="img/articulo_30_aniversario_gaceta.jpg" target="_blank" style="margin-top: 0.3rem;">
                        Ver en Gaceta UNAM <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

        </div>
    </div>

    <?php require_once("includes/footer.php"); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
