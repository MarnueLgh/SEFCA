<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sefca - Historias de Clientes</title>
  
  <!-- Bootstrap 5 CSS para estructura base rápida y tipografía neutra -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts: Fuentes oficiales del proyecto SEFCA -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,400&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  
  <style>
    /* VARIABLES GLOBALES Y RESET PRINCIPAL */
    :root {
      --color-primario: #9c6e09;       /* Dorado UNAM */
      --color-primario-rgb: 156, 110, 9;
      --color-texto-oscuro: #11304b;   /* Azul UNAM */
      --color-texto-mutado: #545454;   /* Gris secundario */
      --color-fondo-pestaña: #ffffff;  /* Blanco por defecto */
      --fuente-texto: "Roboto", sans-serif;
      --fuente-titulo: "Playfair Display", serif;
    }

    body {
      font-family: var(--fuente-texto);
      background-color: transparent; /* Hereda el blanco de Bootstrap por defecto */
      color: var(--color-texto-oscuro);
      overflow-x: hidden;
      margin: 0;
      padding: 0;
    }

    /* CONTENEDOR PRINCIPAL - SECCION ELEMENTO */
    .testimonio-seccion {
      padding: 80px 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      min-height: 100vh;
      background: radial-gradient(circle at top right, rgba(var(--color-primario-rgb), 0.03), transparent 40%);
    }

    .testimonio-contenedor {
      max-width: 1140px; /* Un poco más ancho para albergar cómodamente las dos columnas */
      margin: 0 auto;
      padding: 0 24px;
      position: relative;
    }

    /* BARRA DE LOGOS SUPERIOR (Pestañas interactivas) */
    .testimonio-marcas-contenedor {
      margin-bottom: 60px;            /* Espacio hacia abajo de las pestañas */
      border-bottom: 1px solid #e6ebf1; /* Borde inferior ahora que está arriba */
      position: relative;
      padding-top: 0;
      padding-bottom: 0;
    }

    /* Contenedor horizontal scrollable para móviles */
    .testimonio-marcas-scroll {
      display: flex;
      justify-content: flex-start;
      overflow-x: auto;
      scroll-behavior: smooth;
      -webkit-overflow-scrolling: touch;
      position: relative;
    }

    /* Ocultar barra de scroll nativa */
    .testimonio-marcas-scroll::-webkit-scrollbar {
      display: none;
    }
    .testimonio-marcas-scroll {
      -ms-overflow-style: none;  /* IE and Edge */
      scrollbar-width: none;  /* Firefox */
    }

    /* GRID / LISTA DE BOTONES DE LOGO */
    .testimonio-marcas-lista {
      display: flex;
      width: 100%;
      min-width: max-content; /* Asegura que no se aplaste en móviles */
      justify-content: space-between;
      position: relative;
      padding: 0;
      margin: 0;
    }

    /* CADA LOGOTIPO INDIVIDUAL */
    .testimonio-marca-item {
      flex: 1;
      min-width: 130px;
      padding: 24px 10px;
      border: none;
      background: none;
      outline: none;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0.45;
      filter: grayscale(100%);
      transition: opacity 0.3s ease, filter 0.3s ease, transform 0.2s ease;
      cursor: pointer;
      position: relative;
    }

    .testimonio-marca-item:hover {
      opacity: 0.85;
      filter: grayscale(40%);
    }

    .testimonio-marca-item.marca-activa {
      opacity: 1;
      filter: grayscale(0%);
    }

    /* CONTENEDOR FLEX DE ICONO Y TEXTO */
    .testimonio-marca-contenido {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px; /* Separación horizontal uniforme */
      position: relative;
    }

    /* ICONO INDIVIDUAL SVG DENTRO DE MARCAS */
    .testimonio-marca-icono {
      width: 28px;
      height: 28px;
      display: block;
      color: var(--color-primario);
      flex-shrink: 0;
    }

    /* DIV PROPIO DEL TEXTO (CENTRADOR DE CONTENIDO) */
    .testimonio-marca-texto {titulo);
      font-weight: 500;
      font-size: 16px;
      color: var(--color-texto-oscuro);
      letter-spacing: 0o-oscuro);
      letter-spacing: -0.01em;
      white-space: nowrap;
      text-align: center;
    }

    /* LÍNEA INDICADORA DE PROGRESO DE LA MARCA ACTIVA (Colocada de manera óptima abajo del logo) */
    .testimonio-barra-indicador {
      position: absolute;
      bottom: 0; /* Se asienta perfectamente en el límite inferior de la lista */
      left: 0;
      height: 2px;
      width: 0;
      background-color: var(--color-primario);
      transition: left 0.4s cubic-bezier(0.25, 1, 0.5, 1), width 0.4s cubic-bezier(0.25, 1, 0.5, 1);
      z-index: 2;
    }

    /* CUERPO DEL CONTENIDO (Agrupa slider y flechas independientes de las pestañas superiores) */
    .testimonio-cuerpo {
      position: relative;
      width: 100%;
    }

    /* ENVOLTURA INTERNA DEL SLIDER */
    .testimonio-mascara {
      overflow: hidden;
      width: 100%;
      position: relative;
      cursor: grab;
    }
    
    .testimonio-mascara:active {
      cursor: grabbing;
    }

    /* PISTA DESLIZANTE DE TESTIMONIOS */
    .testimonio-pista {
      display: flex;
      transition: transform 0.65s cubic-bezier(0.25, 1, 0.5, 1);
      width: 900%; /* Cubre los 9 paneles */
    }

    /* CADA SLIDE INDIVIDUAL (100% de la envoltura) */
    .testimonio-slide {
      width: 11.1111%; /* 100% / 9 sections */
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 40px;
      opacity: 0;
      transform: scale(0.97);
      transition: opacity 0.6s ease, transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    }

    .testimonio-slide.slide-activo {
      opacity: 1;
      transform: scale(1);
    }

    /* REJILLA DISTRIBUIDORA DE 2 COLUMNAS */
    .testimonio-slide-grid {
      display: grid;
      grid-template-columns: 1fr 1.25fr; /* Columna de Imagen sutilmente más angosta que la de información */
      gap: 60px;
      align-items: center;
      width: 100%;
      max-width: 1060px;
    }

    /* COLUMNA IZQUIERDA: GRÁFICO / IMAGEN */
    .testimonio-columna-grafica {
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* MARCO CONTENEDOR DE LA ILUSTRACIÓN DE IMAGEN */
    .testimonio-imagen-marco {
      width: 100%;
      max-width: 440px;
      aspect-ratio: 4 / 3; /* Proporción ideal de fotografía o gráfica corporativa */
      background: white;
      border-radius: 16px;
      overflow: hidden;
      position: relative;
      border: 1px solid #e6ebf1;
      box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.01);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .testimonio-ilustracion-svg {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    /* COLUMNA DERECHA: TEXTO / INFORMACIÓN */
    .testimonio-columna-info {
      display: flex;
      flex-direction: column;
      align-items: flex-start; /* Alineado a la izquierda en desktop */
      text-align: left;        /* Texto alineado a la izquierda */
    }

    /* LOGO DE LA SECCIÓN ACTIVA */
    .testimonio-logo-principal {
      height: 48px;
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      justify-content: flex-start; /* Alineación izquierda en concordancia con el texto */
      color: var(--color-primario);
    }

    .testimonio-logo-principal svg {
      height: 100%;
      width: auto;
      max-width: 180px;
    }

    /* CITA / TESTIMONIO */
    .testimonio-cita {
      font-family: var(--fuente-titulo);
      font-size: 24px; /* Un poco más grande para darle peso estético */
      line-height: 1.6;
      font-weight: 400;
      color: var(--color-texto-oscuro);
      max-width: 100%;
      margin-bottom: 24px;
      letter-spacing: 0;
    }

    .testimonio-comillas {
      color: var(--color-primario);
      font-weight: 700;
      font-size: 1.3em;
    }

    /* ENLACE DE ACCIÓN */
    .testimonio-enlace {
      display: inline-flex;
      align-items: center;
      font-size: 15px;
      font-weight: 600;
      color: var(--color-primario);
      text-decoration: none;
      transition: color 0.2s ease, transform 0.2s ease;
    }

    .testimonio-enlace:hover {
      color: #4338ca;
      transform: translateX(4px);
    }

    .testimonio-enlace svg {
      margin-left: 6px;
      transition: transform 0.2s ease;
    }

    /* CONTROLES DE DIRECCIÓN (Sincronizados perfectamente con el cuerpo del testimonio) */
    .testimonio-control-flotante {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: white;
      border: 1px solid #e6ebf1;
      width: 44px;
      height: 44px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
      cursor: pointer;
      z-index: 10;
      transition: all 0.2s ease;
      color: var(--color-texto-mutated);
    }

    .testimonio-control-flotante:hover {
      background-color: #f8f9fc;
      color: var(--color-primario);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
    }

    .testimonio-control-izq {
      left: -22px;
    }

    .testimonio-control-der {
      right: -22px;
    }

    /* RESPONSIVE DESIGN */
    @media (max-width: 992px) {
      .testimonio-slide-grid {
        gap: 30px;
      }
      .testimonio-cita {
        font-size: 19px;
      }
      .testimonio-marcas-contenedor {
        margin-bottom: 40px;
      }
      .testimonio-marcas-lista {
        justify-content: flex-start;
      }
      .testimonio-marca-item {
        min-width: 140px;
      }
      .testimonio-control-flotante {
        display: none; /* Ocultar botones laterales en tablets/móviles y confiar en swipe */
      }
    }

    @media (max-width: 768px) {
      /* Cambio a 1 columna apilada en móvil */
      .testimonio-slide-grid {
        grid-template-columns: 1fr;
        gap: 32px;
      }
      .testimonio-columna-info {
        align-items: center;
        text-align: center;
      }
      .testimonio-logo-principal {
        justify-content: center;
      }
      .testimonio-imagen-marco {
        max-width: 320px;
      }
    }

    @media (max-width: 576px) {
      .testimonio-seccion {
        padding: 40px 0;
      }
      .testimonio-slide {
        padding: 10px 15px;
      }
      .testimonio-cita {
        font-size: 16px;
        margin-bottom: 20px;
      }
      .testimonio-logo-principal {
        height: 38px;
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- SECCIÓN PRINCIPAL DE TESTIMONIOS -->
  <section class="testimonio-seccion">
    <div class="testimonio-contenedor">
      
      <!-- BARRA DE SELECCIÓN DE INDUSTRIAS (CON LOGOS) - ARRIBA -->
      <div class="testimonio-marcas-contenedor">

        <div class="testimonio-marcas-scroll" id="marcas_scroll">
          <div class="testimonio-marcas-lista" id="marcas_lista_elementos">
            
            <!-- Indicador de desplazamiento horizontal de la pestaña activa -->
            <div class="testimonio-barra-indicador" id="indicador_deslizante"></div>

            <!-- MARCA 1: FINANZAS -->
            <button class="testimonio-marca-item marca-activa" data-indice="0" aria-label="Finanzas">
              <div class="testimonio-marca-contenido">
                <div class="testimonio-marca-texto">Finanzas</div>
              </div>
            </button>

            <!-- MARCA 2: EDUCACIÓN -->
            <button class="testimonio-marca-item" data-indice="1" aria-label="Educación">
              <div class="testimonio-marca-contenido">
                <div class="testimonio-marca-texto">Educación</div>
              </div>
            </button>

            <!-- MARCA 3: ENTRETENIMIENTO -->
            <button class="testimonio-marca-item" data-indice="2" aria-label="Entretenimiento">
              <div class="testimonio-marca-contenido">
                <div class="testimonio-marca-texto">Entretenimiento</div>
              </div>
            </button>

            <!-- MARCA 4: GIMNASIO -->
            <button class="testimonio-marca-item" data-indice="3" aria-label="Gimnasio">
              <div class="testimonio-marca-contenido">
                <div class="testimonio-marca-texto">Gimnasio</div>
              </div>
            </button>

            <!-- MARCA 5: HOTELES -->
            <button class="testimonio-marca-item" data-indice="4" aria-label="Hoteles">
              <div class="testimonio-marca-contenido">
                <div class="testimonio-marca-texto">Hoteles</div>
              </div>
            </button>

            <!-- MARCA 6: ÓPTICAS -->
            <button class="testimonio-marca-item" data-indice="5" aria-label="Ópticas">
              <div class="testimonio-marca-contenido">
                <div class="testimonio-marca-texto">Ópticas</div>
              </div>
            </button>

            <!-- MARCA 7: RESTAURANTES -->
            <button class="testimonio-marca-item" data-indice="6" aria-label="Restaurantes">
              <div class="testimonio-marca-contenido">
                <div class="testimonio-marca-texto">Restaurantes</div>
              </div>
            </button>

            <!-- MARCA 8: SALUD -->
            <button class="testimonio-marca-item" data-indice="7" aria-label="Salud">
              <div class="testimonio-marca-contenido">
                <div class="testimonio-marca-texto">Salud</div>
              </div>
            </button>

            <!-- MARCA 9: TIENDAS -->
            <button class="testimonio-marca-item" data-indice="8" aria-label="Tiendas">
              <div class="testimonio-marca-contenido">
                <div class="testimonio-marca-texto">Tiendas</div>
              </div>
            </button>

          </div>
        </div>
      </div>

      <!-- CUERPO DEL TESTIMONIO (Contiene el slider y los botones flotantes perfectamente alineados) -->
      <div class="testimonio-cuerpo">
        
        <!-- Botones de navegación flotante lateral (Grandes pantallas) -->
        <button class="testimonio-control-flotante testimonio-control-izq" id="boton_retroceder" aria-label="Testimonio anterior">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
          </svg>
        </button>
        
        <button class="testimonio-control-flotante testimonio-control-der" id="boton_avanzar" aria-label="Testimonio siguiente">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
          </svg>
        </button>

        <!-- Máscara de visualización para enmascarar deslizamiento -->
        <div class="testimonio-mascara" id="slider_mascara">
          <div class="testimonio-pista" id="slider_pista">
            
            <!-- SLIDE 1: BANCOS Y SEGUROS -->
            <div class="testimonio-slide slide-activo">
              <div class="testimonio-slide-grid">
                <!-- Columna Izquierda: Gráfico/Imagen -->
                <div class="testimonio-columna-grafica">
                  <div class="testimonio-imagen-marco">
                    <svg class="testimonio-ilustracion-svg" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient id="grad_banseg" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" stop-color="#4f46e5" />
                          <stop offset="100%" stop-color="#635bff" />
                        </linearGradient>
                      </defs>
                      <rect width="400" height="300" fill="url(#grad_banseg)" opacity="0.08"/>
                      <circle cx="200" cy="150" r="80" fill="none" stroke="rgba(99,91,255,0.15)" stroke-width="2" stroke-dasharray="8 4"/>
                      <rect x="140" y="90" width="120" height="120" rx="16" fill="#ffffff" stroke="#635bff" stroke-width="3" />
                      <circle cx="200" cy="150" r="30" fill="none" stroke="#635bff" stroke-width="3"/>
                      <path d="M200,110 L200,130 M200,170 L200,190 M160,150 L180,150 M220,150 L240,150" stroke="#635bff" stroke-width="3" stroke-linecap="round"/>
                      <circle cx="200" cy="150" r="8" fill="#635bff"/>
                    </svg>
                  </div>
                </div>
                <!-- Columna Derecha: Texto -->
                <div class="testimonio-columna-info">
                  <div class="testimonio-logo-principal">
                    <svg viewBox="0 0 200 50" xmlns="http://www.w3.org/2000/svg">
                      <rect width="36" height="36" x="10" y="7" rx="8" fill="currentColor" opacity="0.15"/>
                      <path d="M28 17L21 21V28L28 32L35 28V21L28 17Z" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linejoin="round"/>
                      <path d="M28 17V32" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                      <text x="56" y="32" font-family="'Playfair Display', serif" font-weight="700" font-size="20" fill="#0a2540" letter-spacing="0.5">Sefca</text>
                      <text x="122" y="32" font-family="'Playfair Display', serif" font-weight="400" font-size="20" fill="#4f566b">Banseg</text>
                    </svg>
                  </div>
                  <p class="testimonio-cita">
                    <span class="testimonio-comillas">«</span> Con Sefca integramos flujos de pago robustos con los bancos de la región en un abrir y cerrar de ojos. El nivel de seguridad en nuestros servicios de corretaje nos permitió ganar la confianza de corporativos transnacionales. <span class="testimonio-comillas">»</span>
                  </p>
                  <a href="#" class="testimonio-enlace">
                    Conoce más
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 5H9M9 5L5 1M9 5L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <!-- SLIDE 2: EDUCACIÓN -->
            <div class="testimonio-slide">
              <div class="testimonio-slide-grid">
                <!-- Columna Izquierda: Gráfico/Imagen -->
                <div class="testimonio-columna-grafica">
                  <div class="testimonio-imagen-marco">
                    <svg class="testimonio-ilustracion-svg" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient id="grad_academy" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" stop-color="#3b82f6" />
                          <stop offset="100%" stop-color="#1d4ed8" />
                        </linearGradient>
                      </defs>
                      <rect width="400" height="300" fill="url(#grad_academy)" opacity="0.08"/>
                      <path d="M 200,80 L 290,120 L 200,160 L 110,120 Z" fill="#ffffff" stroke="#3b82f6" stroke-width="3" stroke-linejoin="round"/>
                      <path d="M 150,140 L 150,190 C 150,210 250,210 250,190 L 250,140" fill="none" stroke="#3b82f6" stroke-width="3" stroke-linejoin="round"/>
                      <path d="M 290,120 L 290,180 L 295,190 L 285,190 Z" fill="#3b82f6"/>
                      <circle cx="290" cy="120" r="4" fill="#3b82f6"/>
                      <circle cx="200" cy="150" r="75" fill="none" stroke="rgba(59,130,246,0.15)" stroke-width="1.5" stroke-dasharray="6 6"/>
                    </svg>
                  </div>
                </div>
                <!-- Columna Derecha: Texto -->
                <div class="testimonio-columna-info">
                  <div class="testimonio-logo-principal">
                    <svg viewBox="0 0 200 50" xmlns="http://www.w3.org/2000/svg">
                      <rect width="36" height="36" x="10" y="7" rx="8" fill="currentColor" opacity="0.15"/>
                      <path d="M28 16L17 22L28 28L39 22L28 16Z" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linejoin="round"/>
                      <path d="M21 24.5V30C21 32 24.5 34 28 34C31.5 34 35 32 35 30V24.5" stroke="currentColor" stroke-width="2" fill="none"/>
                      <text x="56" y="32" font-family="'Playfair Display', serif" font-weight="700" font-size="20" fill="#0a2540">Sefca</text>
                      <text x="122" y="32" font-family="'Playfair Display', serif" font-weight="400" font-size="20" fill="#4f566b">Academy</text>
                    </svg>
                  </div>
                  <p class="testimonio-cita">
                    <span class="testimonio-comillas">«</span> Desplegamos el cobro recurrente de matrículas mensuales reduciendo la cartera vencida en un 40%. La experiencia ágil de Sefca evitó que nuestros estudiantes sufrieran interrupciones en sus pagos académicos. <span class="testimonio-comillas">»</span>
                  </p>
                  <a href="#" class="testimonio-enlace">
                    Conoce más
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 5H9M9 5L5 1M9 5L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <!-- SLIDE 3: ENTRETENIMIENTO -->
            <div class="testimonio-slide">
              <div class="testimonio-slide-grid">
                <!-- Columna Izquierda: Gráfico/Imagen -->
                <div class="testimonio-columna-grafica">
                  <div class="testimonio-imagen-marco">
                    <svg class="testimonio-ilustracion-svg" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient id="grad_play" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" stop-color="#ec4899" />
                          <stop offset="100%" stop-color="#be185d" />
                        </linearGradient>
                      </defs>
                      <rect width="400" height="300" fill="url(#grad_play)" opacity="0.08"/>
                      <circle cx="200" cy="150" r="60" fill="none" stroke="#ec4899" stroke-width="2" stroke-dasharray="5 5"/>
                      <path d="M170 110L250 150L170 190Z" fill="#ffffff" stroke="#ec4899" stroke-width="3" stroke-linejoin="round"/>
                      <rect x="130" y="80" width="140" height="140" rx="20" fill="none" stroke="#ec4899" stroke-width="3" />
                    </svg>
                  </div>
                </div>
                <!-- Columna Derecha: Texto -->
                <div class="testimonio-columna-info">
                  <div class="testimonio-logo-principal">
                    <svg viewBox="0 0 200 50" xmlns="http://www.w3.org/2000/svg">
                      <rect width="36" height="36" x="10" y="7" rx="8" fill="currentColor" opacity="0.15"/>
                      <path d="M23 17V33L35 25L23 17Z" stroke="currentColor" stroke-width="2" fill="none" stroke-linejoin="round"/>
                      <text x="56" y="32" font-family="'Playfair Display', serif" font-weight="700" font-size="20" fill="#0a2540">Sefca</text>
                      <text x="122" y="32" font-family="'Playfair Display', serif" font-weight="400" font-size="20" fill="#4f566b">Play</text>
                    </svg>
                  </div>
                  <p class="testimonio-cita">
                    <span class="testimonio-comillas">«</span> Procesar más de 3,000 transacciones por segundo durante ventas de alta demanda de conciertos era nuestra pesadilla. Sefca gestionó el tráfico masivo de boletaje sin una sola desconexión o falla de pasarela. <span class="testimonio-comillas">»</span>
                  </p>
                  <a href="#" class="testimonio-enlace">
                    Conoce más
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 5H9M9 5L5 1M9 5L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <!-- SLIDE 4: GIMNASIO -->
            <div class="testimonio-slide">
              <div class="testimonio-slide-grid">
                <!-- Columna Izquierda: Gráfico/Imagen -->
                <div class="testimonio-columna-grafica">
                  <div class="testimonio-imagen-marco">
                    <svg class="testimonio-ilustracion-svg" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient id="grad_fit" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" stop-color="#ef4444" />
                          <stop offset="100%" stop-color="#b91c1c" />
                        </linearGradient>
                      </defs>
                      <rect width="400" height="300" fill="url(#grad_fit)" opacity="0.08"/>
                      <line x1="120" y1="150" x2="280" y2="150" stroke="#ef4444" stroke-width="12" stroke-linecap="round"/>
                      <rect x="100" y="120" width="20" height="60" rx="6" fill="#ffffff" stroke="#ef4444" stroke-width="3"/>
                      <rect x="280" y="120" width="20" height="60" rx="6" fill="#ffffff" stroke="#ef4444" stroke-width="3"/>
                      <circle cx="200" cy="150" r="70" fill="none" stroke="rgba(239,68,68,0.15)" stroke-width="2" stroke-dasharray="10 5"/>
                    </svg>
                  </div>
                </div>
                <!-- Columna Derecha: Texto -->
                <div class="testimonio-columna-info">
                  <div class="testimonio-logo-principal">
                    <svg viewBox="0 0 200 50" xmlns="http://www.w3.org/2000/svg">
                      <rect width="36" height="36" x="10" y="7" rx="8" fill="currentColor" opacity="0.15"/>
                      <path d="M20 25H36" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                      <path d="M17 19V31" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                      <path d="M39 19V31" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                      <text x="56" y="32" font-family="'Playfair Display', serif" font-weight="700" font-size="20" fill="#0a2540">Sefca</text>
                      <text x="122" y="32" font-family="'Playfair Display', serif" font-weight="400" font-size="20" fill="#4f566b">Fit</text>
                    </svg>
                  </div>
                  <p class="testimonio-cita">
                    <span class="testimonio-comillas">«</span> Sefca transformó la forma en la que nuestros afiliados pagan su membresía. Con el servicio de cobro invisible recurrente, logramos consolidar un modelo SaaS de bienestar altamente predecible y automatizado. <span class="testimonio-comillas">»</span>
                  </p>
                  <a href="#" class="testimonio-enlace">
                    Conoce más
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 5H9M9 5L5 1M9 5L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <!-- SLIDE 5: HOTELES -->
            <div class="testimonio-slide">
              <div class="testimonio-slide-grid">
                <!-- Columna Izquierda: Gráfico/Imagen -->
                <div class="testimonio-columna-grafica">
                  <div class="testimonio-imagen-marco">
                    <svg class="testimonio-ilustracion-svg" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient id="grad_stay" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" stop-color="#f59e0b" />
                          <stop offset="100%" stop-color="#d97706" />
                        </linearGradient>
                      </defs>
                      <rect width="400" height="300" fill="url(#grad_stay)" opacity="0.08"/>
                      <path d="M130 220V120C130 100 150 80 200 80C250 80 270 100 270 120V220" fill="none" stroke="#f59e0b" stroke-width="3"/>
                      <rect x="150" y="120" width="100" height="100" rx="8" fill="#ffffff" stroke="#f59e0b" stroke-width="3"/>
                      <line x1="200" y1="120" x2="200" y2="220" stroke="#f59e0b" stroke-width="2"/>
                      <circle cx="200" cy="150" r="40" fill="none" stroke="rgba(245,158,11,0.2)" stroke-width="2" stroke-dasharray="6 4"/>
                    </svg>
                  </div>
                </div>
                <!-- Columna Derecha: Texto -->
                <div class="testimonio-columna-info">
                  <div class="testimonio-logo-principal">
                    <svg viewBox="0 0 200 50" xmlns="http://www.w3.org/2000/svg">
                      <rect width="36" height="36" x="10" y="7" rx="8" fill="currentColor" opacity="0.15"/>
                      <path d="M16 32V18H40V32" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M22 24C23.6569 24 25 22.6569 25 21C25 19.3431 23.6569 18 22 18C20.3431 18 19 19.3431 19 21C19 22.6569 20.3431 24 22 24Z" stroke="currentColor" stroke-width="2"/>
                      <path d="M28 22H36" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                      <text x="56" y="32" font-family="'Playfair Display', serif" font-weight="700" font-size="20" fill="#0a2540">Sefca</text>
                      <text x="122" y="32" font-family="'Playfair Display', serif" font-weight="400" font-size="20" fill="#4f566b">Stay</text>
                    </svg>
                  </div>
                  <p class="testimonio-cita">
                    <span class="testimonio-comillas">«</span> Aceptar depósitos de garantía y cargos internacionales en múltiples monedas solía ser complejo debido a las comisiones. Gracias a la solución simplificada de Sefca, agilizamos el check-in global de nuestros huéspedes. <span class="testimonio-comillas">»</span>
                  </p>
                  <a href="#" class="testimonio-enlace">
                    Conoce más
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 5H9M9 5L5 1M9 5L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <!-- SLIDE 6: ÓPTICAS -->
            <div class="testimonio-slide">
              <div class="testimonio-slide-grid">
                <!-- Columna Izquierda: Gráfico/Imagen -->
                <div class="testimonio-columna-grafica">
                  <div class="testimonio-imagen-marco">
                    <svg class="testimonio-ilustracion-svg" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient id="grad_vision" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" stop-color="#10b981" />
                          <stop offset="100%" stop-color="#059669" />
                        </linearGradient>
                      </defs>
                      <rect width="400" height="300" fill="url(#grad_vision)" opacity="0.08"/>
                      <circle cx="150" cy="150" r="45" fill="none" stroke="#10b981" stroke-width="3"/>
                      <circle cx="250" cy="150" r="45" fill="none" stroke="#10b981" stroke-width="3"/>
                      <path d="M 195 150 L 205 150" stroke="#10b981" stroke-width="3" stroke-linecap="round"/>
                      <path d="M 110 135 L 110 165 M 290 135 L 290 165" stroke="#10b981" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                  </div>
                </div>
                <!-- Columna Derecha: Texto -->
                <div class="testimonio-columna-info">
                  <div class="testimonio-logo-principal">
                    <svg viewBox="0 0 200 50" xmlns="http://www.w3.org/2000/svg">
                      <rect width="36" height="36" x="10" y="7" rx="8" fill="currentColor" opacity="0.15"/>
                      <circle cx="21" cy="25" r="7" stroke="currentColor" stroke-width="2" fill="none"/>
                      <circle cx="35" cy="25" r="7" stroke="currentColor" stroke-width="2" fill="none"/>
                      <path d="M28 25H28.1" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                      <text x="56" y="32" font-family="'Playfair Display', serif" font-weight="700" font-size="20" fill="#0a2540">Sefca</text>
                      <text x="122" y="32" font-family="'Playfair Display', serif" font-weight="400" font-size="20" fill="#4f566b">Vision</text>
                    </svg>
                  </div>
                  <p class="testimonio-cita">
                    <span class="testimonio-comillas">«</span> Logramos integrar terminales de pago inalámbricas conectadas en tiempo real con nuestra tienda en línea. El cliente puede cotizar sus micas graduadas y concretar el pago con cualquier tarjeta de manera omnicanal. <span class="testimonio-comillas">»</span>
                  </p>
                  <a href="#" class="testimonio-enlace">
                    Conoce más
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 5H9M9 5L5 1M9 5L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <!-- SLIDE 7: RESTAURANTES -->
            <div class="testimonio-slide">
              <div class="testimonio-slide-grid">
                <!-- Columna Izquierda: Gráfico/Imagen -->
                <div class="testimonio-columna-grafica">
                  <div class="testimonio-imagen-marco">
                    <svg class="testimonio-ilustracion-svg" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient id="grad_food" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" stop-color="#f97316" />
                          <stop offset="100%" stop-color="#ea580c" />
                        </linearGradient>
                      </defs>
                      <rect width="400" height="300" fill="url(#grad_food)" opacity="0.08"/>
                      <circle cx="200" cy="150" r="70" fill="none" stroke="#f97316" stroke-width="3"/>
                      <path d="M200 100 V200" stroke="#f97316" stroke-width="3" stroke-linecap="round" stroke-dasharray="8 4"/>
                      <circle cx="200" cy="150" r="45" fill="none" stroke="rgba(249,115,22,0.2)" stroke-width="2"/>
                    </svg>
                  </div>
                </div>
                <!-- Columna Derecha: Texto -->
                <div class="testimonio-columna-info">
                  <div class="testimonio-logo-principal">
                    <svg viewBox="0 0 200 50" xmlns="http://www.w3.org/2000/svg">
                      <rect width="36" height="36" x="10" y="7" rx="8" fill="currentColor" opacity="0.15"/>
                      <path d="M22 17V26" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
                      <path d="M19 17V23C19 25 25 25 25 23V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                      <path d="M33 17V33" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
                      <path d="M29 17C29 20 33 22 33 22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                      <path d="M25 26V33" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
                      <text x="56" y="32" font-family="'Playfair Display', serif" font-weight="700" font-size="20" fill="#0a2540">Sefca</text>
                      <text x="122" y="32" font-family="'Playfair Display', serif" font-weight="400" font-size="20" fill="#4f566b">Food</text>
                    </svg>
                  </div>
                  <p class="testimonio-cita">
                    <span class="testimonio-comillas">«</span> El pago mediante código QR dinámico integrado a nuestras comandas de Sefca redujo el tiempo de espera por mesa. Los clientes pagan la cuenta de forma independiente, aumentando la rotación un 22%. <span class="testimonio-comillas">»</span>
                  </p>
                  <a href="#" class="testimonio-enlace">
                    Conoce más
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 5H9M9 5L5 1M9 5L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <!-- SLIDE 8: SALUD -->
            <div class="testimonio-slide">
              <div class="testimonio-slide-grid">
                <!-- Columna Izquierda: Gráfico/Imagen -->
                <div class="testimonio-columna-grafica">
                  <div class="testimonio-imagen-marco">
                    <svg class="testimonio-ilustracion-svg" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient id="grad_health" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" stop-color="#06b6d4" />
                          <stop offset="100%" stop-color="#0891b2" />
                        </linearGradient>
                      </defs>
                      <rect width="400" height="300" fill="url(#grad_health)" opacity="0.08"/>
                      <path d="M130 150 H180 L195 110 L210 190 L225 140 L235 160 H270" fill="none" stroke="#06b6d4" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                      <circle cx="200" cy="150" r="75" fill="none" stroke="rgba(6,182,212,0.15)" stroke-width="2" stroke-dasharray="8 4"/>
                    </svg>
                  </div>
                </div>
                <!-- Columna Derecha: Texto -->
                <div class="testimonio-columna-info">
                  <div class="testimonio-logo-principal">
                    <svg viewBox="0 0 200 50" xmlns="http://www.w3.org/2000/svg">
                      <rect width="36" height="36" x="10" y="7" rx="8" fill="currentColor" opacity="0.15"/>
                      <path d="M18 25H38" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                      <path d="M28 15V35" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                      <text x="56" y="32" font-family="'Playfair Display', serif" font-weight="700" font-size="20" fill="#0a2540">Sefca</text>
                      <text x="122" y="32" font-family="'Playfair Display', serif" font-weight="400" font-size="20" fill="#4f566b">Health</text>
                    </svg>
                  </div>
                  <p class="testimonio-cita">
                    <span class="testimonio-comillas">«</span> En el sector médico, la agilidad y el cumplimiento de datos delicados son no negociables. Con Sefca, garantizamos que las transacciones de pacientes y copagos de seguros estén totalmente encriptados y procesados de inmediato. <span class="testimonio-comillas">»</span>
                  </p>
                  <a href="#" class="testimonio-enlace">
                    Conoce más
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 5H9M9 5L5 1M9 5L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

            <!-- SLIDE 9: TIENDAS -->
            <div class="testimonio-slide">
              <div class="testimonio-slide-grid">
                <!-- Columna Izquierda: Gráfico/Imagen -->
                <div class="testimonio-columna-grafica">
                  <div class="testimonio-imagen-marco">
                    <svg class="testimonio-ilustracion-svg" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient id="grad_shop" x1="0%" y1="0%" x2="100%" y2="100%">
                          <stop offset="0%" stop-color="#8b5cf6" />
                          <stop offset="100%" stop-color="#6d28d9" />
                        </linearGradient>
                      </defs>
                      <rect width="400" height="300" fill="url(#grad_shop)" opacity="0.08"/>
                      <path d="M150 120 H250 L240 210 H160 Z" fill="#ffffff" stroke="#8b5cf6" stroke-width="3" stroke-linejoin="round"/>
                      <path d="M180 120 V100 C180 88 188 80 200 80 C212 80 220 88 220 100 V120" fill="none" stroke="#8b5cf6" stroke-width="3" stroke-linecap="round"/>
                      <circle cx="200" cy="150" r="70" fill="none" stroke="rgba(139,92,246,0.15)" stroke-width="2" stroke-dasharray="10 4"/>
                    </svg>
                  </div>
                </div>
                <!-- Columna Derecha: Texto -->
                <div class="testimonio-columna-info">
                  <div class="testimonio-logo-principal">
                    <svg viewBox="0 0 200 50" xmlns="http://www.w3.org/2000/svg">
                      <rect width="36" height="36" x="10" y="7" rx="8" fill="currentColor" opacity="0.15"/>
                      <path d="M16 19H40L36 34H20L16 19Z" stroke="currentColor" stroke-width="2" fill="none" stroke-linejoin="round"/>
                      <path d="M22 19V15C22 13 25 11 28 11C31 11 34 13 34 15V19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                      <text x="56" y="32" font-family="'Playfair Display', serif" font-weight="700" font-size="20" fill="#0a2540">Sefca</text>
                      <text x="122" y="32" font-family="'Playfair Display', serif" font-weight="400" font-size="20" fill="#4f566b">Shop</text>
                    </svg>
                  </div>
                  <p class="testimonio-cita">
                    <span class="testimonio-comillas">«</span> Lanzar nuestra tienda de retail unificando inventario físico e e-commerce con Sefca nos quitó meses de integraciones tediosas. Es una solución de nivel empresarial simple de manejar para cualquier tamaño de tienda. <span class="testimonio-comillas">»</span>
                  </p>
                  <a href="#" class="testimonio-enlace">
                    Conoce más
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 5H9M9 5L5 1M9 5L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- LÓGICA DE INTERACCIÓN PREMIUM EN JS VANILLA -->
  <script>
    // ELEMENTOS DE CONTROL DEL DOM
    const pista_testimonios = document.getElementById('slider_pista');
    const mascara_testimonios = document.getElementById('slider_mascara');
    const lista_slides = document.querySelectorAll('.testimonio-slide');
    const lista_botones_marcas = document.querySelectorAll('.testimonio-marca-item');
    const indicador_deslizante = document.getElementById('indicador_deslizante');
    const scroll_marcas_contenedor = document.getElementById('marcas_scroll');
    const boton_retroceder = document.getElementById('boton_retroceder');
    const boton_avanzar = document.getElementById('boton_avanzar');

    // VARIABLES DE ESTADO (Snake Case obligatorio)
    let indice_actual = 0;
    const total_paneles = lista_slides.length;
    let temporizador_auto_slide;
    let posicion_inicial_tactil = 0;
    let posicion_actual_tactil = 0;
    let en_movimiento_tactil = false;

    // ACTUALIZACIÓN DE LA INTERFAZ
    function cambiar_seccion(indice_nuevo) {
      // 1. Validar rangos de seguridad
      if (indice_nuevo < 0) {
        indice_actual = total_paneles - 1;
      } else if (indice_nuevo >= total_paneles) {
        indice_actual = 0;
      } else {
        indice_actual = indice_nuevo;
      }

      // 2. Deslizar la pista horizontalmente
      const porcentaje_desplazamiento = indice_actual * (100 / total_paneles);
      pista_testimonios.style.transform = `translateX(-${porcentaje_desplazamiento}%)`;

      // 3. Gestionar clases de slides activos
      lista_slides.forEach((slide, idx) => {
        if (idx === indice_actual) {
          slide.classList.add('slide-activo');
        } else {
          slide.classList.remove('slide-activo');
        }
      });

      // 4. Actualizar botones de marca
      lista_botones_marcas.forEach((boton, idx) => {
        if (idx === indice_actual) {
          boton.classList.add('marca-activa');
        } else {
          boton.classList.remove('marca-activa');
        }
      });

      // 5. Ajustar indicador azul deslizante debajo del logo activo
      actualizar_posicion_indicador();

      // 6. Centrar el elemento de marca de forma fluida en móviles
      centrar_marca_activa_scroll();

      // 7. Reiniciar el temporizador para evitar saltos inmediatos tras interacción del usuario
      reiniciar_temporizador_auto();
    }

    // AJUSTAR POSICIÓN DE LA LÍNEA AZUL (Bajo la pestaña activa con ancho dinámico real)
    function actualizar_posicion_indicador() {
      const boton_activo = lista_botones_marcas[indice_actual];
      if (!boton_activo) return;

      const contenido_interno = boton_activo.querySelector('.testimonio-marca-contenido');
      if (!contenido_interno) return;

      // Calcular el ancho real del contenido interno (icono + texto) y su desfase izquierdo exacto
      const ancho_contenido = contenido_interno.offsetWidth;
      const posicion_izquierda = boton_activo.offsetLeft + contenido_interno.offsetLeft;

      indicador_deslizante.style.width = `${ancho_contenido}px`;
      indicador_deslizante.style.left = `${posicion_izquierda}px`;
    }

    // CENTRAR EL LOGO SELECCIONADO EN PANTALLAS CHICAS
    function centrar_marca_activa_scroll() {
      const boton_activo = lista_botones_marcas[indice_actual];
      if (!boton_activo) return;

      const mitad_contenedor = scroll_marcas_contenedor.offsetWidth / 2;
      const mitad_boton = boton_activo.offsetWidth / 2;
      const posicion_destino = boton_activo.offsetLeft - mitad_contenedor + mitad_boton;

      scroll_marcas_contenedor.scrollTo({
        left: posicion_destino,
        behavior: 'smooth'
      });
    }

    // SISTEMA DE REPRODUCCIÓN AUTOMÁTICA INTELIGENTE
    function iniciar_temporizador_auto() {
      temporizador_auto_slide = setInterval(() => {
        cambiar_seccion(indice_actual + 1);
      }, 7500); // Cambia cada 7.5 segundos
    }

    function detener_temporizador_auto() {
      clearInterval(temporizador_auto_slide);
    }

    // Reinicia tras click o swipe manual para dar tiempo al usuario de leer
    function reiniciar_temporizador_auto() {
      detener_temporizador_auto();
      iniciar_temporizador_auto();
    }

    // ASOCIACIÓN DE EVENTOS DE INTERACCIÓN (Click, Resize, Swipe táctil)
    function inicializar_eventos() {
      // Evento Click en Pestañas Superiores
      lista_botones_marcas.forEach((boton) => {
        boton.addEventListener('click', (e) => {
          const indice_elegido = parseInt(e.currentTarget.getAttribute('data-indice'));
          cambiar_seccion(indice_elegido);
        });
      });

      // Controles de dirección laterales
      boton_retroceder.addEventListener('click', () => {
        cambiar_seccion(indice_actual - 1);
      });

      boton_avanzar.addEventListener('click', () => {
        cambiar_seccion(indice_actual + 1);
      });

      // Detener auto_reproducir temporalmente al colocar el cursor encima del slider
      mascara_testimonios.addEventListener('mouseenter', detener_temporizador_auto);
      mascara_testimonios.addEventListener('mouseleave', iniciar_temporizador_auto);

      // Recalcular dimensiones de la línea azul en rediseño de ventana
      window.addEventListener('resize', actualizar_posicion_indicador);

      // --- INTEGRACIÓN DE GESTOS SWIPE (TÁCTIL) ---
      mascara_testimonios.addEventListener('touchstart', (e) => {
        posicion_inicial_tactil = e.touches[0].clientX;
        en_movimiento_tactil = true;
        detener_temporizador_auto();
      }, { passive: true });

      mascara_testimonios.addEventListener('touchmove', (e) => {
        if (!en_movimiento_tactil) return;
        posicion_actual_tactil = e.touches[0].clientX;
      }, { passive: true });

      mascara_testimonios.addEventListener('touchend', () => {
        if (!en_movimiento_tactil) return;
        
        const diferencia_desplazamiento = posicion_inicial_tactil - posicion_actual_tactil;
        const umbral_minimo = 50; // Desplazamiento mínimo de 50px para considerarse swipe

        if (Math.abs(diferencia_desplazamiento) > umbral_minimo) {
          if (diferencia_desplazamiento > 0) {
            // Swipe a la izquierda -> Avanzar testimonio
            cambiar_seccion(indice_actual + 1);
          } else {
            // Swipe a la derecha -> Retroceder testimonio
            cambiar_seccion(indice_actual - 1);
          }
        }
        
        en_movimiento_tactil = false;
        iniciar_temporizador_auto();
      });

      // Flechas del teclado para accesibilidad
      document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
          cambiar_seccion(indice_actual - 1);
        } else if (e.key === 'ArrowRight') {
          cambiar_seccion(indice_actual + 1);
        }
      });
    }

    // INICIALIZACIÓN GENERAL DEL COMPONENTE
    window.onload = function() {
      inicializar_eventos();
      // Aseguramos la aliniación de la barra azul indicadora desde el arranque inicial
      setTimeout(actualizar_posicion_indicador, 150);
      iniciar_temporizador_auto();
    };
  </script>

</body>
</html>
