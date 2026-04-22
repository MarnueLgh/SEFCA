<!--
    Fecha: 07/04/2026
    Descripción: Hero de la página principal.
-->
<!-- ════════════ CARRUSEL HERO ════════════════ -->
<div class="hero-wrap" id="heroWrap">
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5200">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Diapositiva 1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Diapositiva 2"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Diapositiva 3"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3" aria-label="Diapositiva 4"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="4" aria-label="Diapositiva 5"></button>
    </div>
    <div class="carousel-inner">

<!-- 
     ==============================
      PLANTILLA PARA NUEVOS SLIDES
     ==============================

      <div class="carousel-item">
        <picture>
          <source media="(max-width: 768px)"
            srcset="img/banner_principal_cuadrado/NOMBRE_IMG_CUADRADO.jpg">
          <img src="img/banner_principal/NOMBRE_IMG_RECTANGULO.jpg" alt="FCA UNAM – Letras" class="c-img"
            onerror="this.closest('.carousel-item').innerHTML='<div class=c-ph><p class=c-ph__tag>FCA · UNAM</p><h2 class=c-ph__title>FCA UNAM</h2><div class=c-ph__line></div></div>'">
        </picture>
      </div>
 -->

      <!-- SLIDE 1 -->
      <div class="carousel-item active">
        <picture>
          <source media="(max-width: 768px)" srcset="img/banner_principal_cuadrado/SEFCA_BANNER_orgullo_cuadrado.jpeg">
          <img src="img/banner_principal/SEFCA_BANNER_orgullo_rectangulo.jpeg" alt="Facultad de Contaduría y Administración UNAM" class="c-img"
            onerror="this.closest('.carousel-item').innerHTML='<div class=c-ph><p class=c-ph__tag>FCA · UNAM</p><h2 class=c-ph__title>Sociedad de Egresados de la FCA</h2><div class=c-ph__line></div></div>'">
        </picture>
      </div>

      <!-- SLIDE 2 -->
      <div class="carousel-item">
        <picture>
          <source media="(max-width: 768px)" srcset="img/banner_principal_cuadrado/SEFCA_BANNER_cuadrado.jpeg">
          <img src="img/banner_principal/SEFCA_BANNER_rectangulo.jpeg" alt="Aulas dignas para la FCA" class="c-img"
            onerror="this.closest('.carousel-item').innerHTML='<div class=c-ph><p class=c-ph__tag>FCA · UNAM</p><h2 class=c-ph__title>Aulas dignas para la FCA</h2><div class=c-ph__line></div></div>'">
        </picture>
      </div>

      <!-- SLIDE 3 -->
      <div class="carousel-item">
        <picture>
          <source media="(max-width: 768px)"
            srcset="img/banner_principal_cuadrado/Concurso_SEFCA_FCA_2025_sep_cuadrada.jpg">
          <img src="img/banner_principal/Concurso_SEFCA_FCA_2025_sep.jpg" alt="Biblioteca de la FCA UNAM" class="c-img"
            onerror="this.closest('.carousel-item').innerHTML='<div class=c-ph><p class=c-ph__tag>FCA · UNAM</p><h2 class=c-ph__title>Biblioteca de la FCA</h2><div class=c-ph__line></div></div>'">
        </picture>
      </div>

    </div><!-- /.carousel-inner -->

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div><!-- /#heroCarousel -->
</div><!-- /.hero-wrap -->