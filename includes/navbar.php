<?php
/*
    Autor: Anuar Manuel Olvera Ramirez
    Fecha: 06/09/2026
    Versión: 2.0
    Descripción: Barra de navegación principal.

    Criterio de etiquetado: en la barra van etiquetas cortas y el nombre
    completo de cada rubro aparece como título del panel desplegable y como
    <h1> de la página destino. Con los nombres largos en la barra el menú
    colapsaría a hamburguesa cerca de los 1420px, dejando fuera a las laptops.

    Al agregar una página nueva hay que registrarla aquí: su propia variable
    $activo_* y el arreglo del padre que marca el desplegable.
*/

// Determinar la página activa
$pagina_actual = basename($_SERVER['PHP_SELF']);

$activo_inicio = ''; // Inicio ya no queda seleccionado por defecto

/*
    Las galerías se sirven todas desde evento.php, así que por nombre de archivo
    no se distingue de qué rubro vienen. includes/evento.php ya dejó $evento en
    ámbito antes de incluir este archivo, así que el rubro se deduce de su 'tipo'.
*/
$tipo_galeria_actual = '';

if ($pagina_actual == 'evento.php' && isset($evento['tipo'])) {
    $tipo_galeria_actual = $evento['tipo'];
}

$es_galeria_generica = ($pagina_actual == 'evento.php')
    && !in_array($tipo_galeria_actual, array('conferencia', 'toma_protesta', 'egresado_distinguido'), true);

// Somos SEFCA
$activo_consejo  = ($pagina_actual == 'consejo_directivo.php') ? 'active' : '';
$activo_mensajes = ($pagina_actual == 'mensajes_institucionales.php') ? 'active' : '';
$activo_historia = ($pagina_actual == 'historia.php') ? 'active' : '';
$activo_tomas    = ($pagina_actual == 'tomas_protesta.php' || $tipo_galeria_actual === 'toma_protesta') ? 'active' : '';

// Experiencia y orgullo / Proyectos 2022-2026
$activo_eventos      = ($pagina_actual == 'eventos.php' || $es_galeria_generica) ? 'active' : '';
$activo_conferencias = ($pagina_actual == 'conferencias.php' || $tipo_galeria_actual === 'conferencia') ? 'active' : '';
$activo_proyectos    = ($pagina_actual == 'proyectos.php') ? 'active' : '';

// Conoce nuestras historias
$activo_egresados = ($pagina_actual == 'egresados_distinguidos.php' || $tipo_galeria_actual === 'egresado_distinguido') ? 'active' : '';
$activo_voces     = ($pagina_actual == 'voces.php') ? 'active' : '';

// Contacto
$activo_contacto = ($pagina_actual == 'contacto.php') ? 'active' : '';

// Padres (marcan el toggle del desplegable)
$activo_somos = (in_array($pagina_actual, array(
    'consejo_directivo.php',
    'mensajes_institucionales.php',
    'historia.php',
    'tomas_protesta.php',
)) || $tipo_galeria_actual === 'toma_protesta') ? 'active' : '';

$activo_experiencia = (in_array($pagina_actual, array(
    'eventos.php',
    'conferencias.php',
    'proyectos.php',
)) || $tipo_galeria_actual === 'conferencia' || $es_galeria_generica) ? 'active' : '';

$activo_historias = (in_array($pagina_actual, array(
    'egresados_distinguidos.php',
    'voces.php',
)) || $tipo_galeria_actual === 'egresado_distinguido') ? 'active' : '';
?>
<!-- Navbar Start -->
<nav class="navbar navbar-expand-custom navbar-dark fixed-top px-custom-5">

    <!-- Logos: UNAM → FCA → SEFCA -->
    <div class="navbar-logos">
        <a href="https://www.unam.mx/" target="_blank" class="navbar-logo-link">
            <img src="img/unam_logo.png" alt="UNAM" class="navbar-logo navbar-logo-unam">
        </a>
        <a href="https://www.fca.unam.mx/" target="_blank" class="navbar-logo-link">
            <img src="img/fca-unam-logo.png" alt="FCA" class="navbar-logo navbar-logo-fca">
        </a>
        <a href="index.php" class="navbar-logo-link">
            <img src="img/SEFCA_DORADO.png" alt="SEFCA" class="navbar-logo navbar-logo-sefca">
        </a>
    </div>

    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Abrir menú">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto px-4 py-2 p-custom-0">
            <a href="index.php" class="nav-item nav-link <?php echo $activo_inicio; ?>">Inicio</a>

            <!-- Somos SEFCA -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?php echo $activo_somos; ?>" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    SEFCA <i class="fa fa-angle-down ms-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-desktop">
                    <a href="#" class="dropdown-item dropdown-back"><i class="fa fa-chevron-left me-2"></i> Volver atrás</a>
                    <div class="navbar-panel">
                        <div class="navbar-panel-columna" role="group" aria-labelledby="panel-somos-titulo">
                            <p class="navbar-panel-titulo" id="panel-somos-titulo">Somos SEFCA</p>
                            <a href="consejo_directivo.php" class="dropdown-item <?php echo $activo_consejo; ?>">Consejo Directivo</a>
                            <a href="mensajes_institucionales.php" class="dropdown-item <?php echo $activo_mensajes; ?>">Mensajes institucionales</a>
                            <a href="historia.php" class="dropdown-item <?php echo $activo_historia; ?>">Historia</a>
                            <a href="tomas_protesta.php" class="dropdown-item <?php echo $activo_tomas; ?>">Tomas de protesta</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Experiencia y orgullo + Proyectos 2022-2026 -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?php echo $activo_experiencia; ?>" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    Experiencia <i class="fa fa-angle-down ms-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-desktop">
                    <a href="#" class="dropdown-item dropdown-back"><i class="fa fa-chevron-left me-2"></i> Volver atrás</a>
                    <div class="navbar-panel navbar-panel-doble">
                        <div class="navbar-panel-columna" role="group" aria-labelledby="panel-experiencia-titulo">
                            <p class="navbar-panel-titulo" id="panel-experiencia-titulo">Experiencia y orgullo</p>
                            <a href="eventos.php" class="dropdown-item <?php echo $activo_eventos; ?>">Eventos</a>
                            <a href="conferencias.php" class="dropdown-item <?php echo $activo_conferencias; ?>">Conferencias</a>
                        </div>
                        <div class="navbar-panel-columna" role="group" aria-labelledby="panel-proyectos-titulo">
                            <p class="navbar-panel-titulo" id="panel-proyectos-titulo">
                                <a href="proyectos.php" class="navbar-panel-enlace <?php echo $activo_proyectos; ?>">Proyectos 2022-2026</a>
                            </p>
                            <a href="proyectos.php#proyecto-aulas-dignas" class="dropdown-item">Aulas dignas</a>
                            <a href="proyectos.php#proyecto-concurso-ensayo" class="dropdown-item">Concurso de ensayo 2025</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conoce nuestras historias -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?php echo $activo_historias; ?>" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    Historias <i class="fa fa-angle-down ms-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-desktop">
                    <a href="#" class="dropdown-item dropdown-back"><i class="fa fa-chevron-left me-2"></i> Volver atrás</a>
                    <div class="navbar-panel">
                        <div class="navbar-panel-columna" role="group" aria-labelledby="panel-historias-titulo">
                            <p class="navbar-panel-titulo" id="panel-historias-titulo">Conoce nuestras historias</p>
                            <a href="egresados_distinguidos.php" class="dropdown-item <?php echo $activo_egresados; ?>">Egresados distinguidos</a>
                            <a href="voces.php" class="dropdown-item <?php echo $activo_voces; ?>">Voces SEFCA</a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="contacto.php" class="nav-item nav-link <?php echo $activo_contacto; ?>">Contacto</a>

            <a href="afiliacion_forms.php" class="afiliacion-btn" target="_blank">¡Sé parte de SEFCA!</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->
