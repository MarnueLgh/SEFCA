<!--
    Fecha: 07/04/2026
    Descripción: Consejo Directivo de la página principal.
-->

<!-- Inicio de Consejo Directivo -->
<div class="consejo section-gap">
    <div class="container">

        <!-- Bloque superior: texto + imagen -->
        <div class="consejo-feature-card">

            <!-- Columna izquierda: información + resumen de semblanzas -->
            <div class="consejo-info-col">
                <h2 class="consejo-info-title">
                    Conócenos.
                </h2>

                <p class="consejo-info-text">
                    El Consejo Directivo de SEFCA integra perfiles estratégicos que fortalecen la vinculación
                    entre egresados, comunidad universitaria, sector profesional e instituciones aliadas. Su labor
                    orienta la toma de decisiones, impulsa iniciativas de valor y preserva el sentido de identidad
                    con la Facultad de Contaduría y Administración.
                </p>

                <div class="consejo-semblanzas consejo-semblanzas-left">
                    <span class="consejo-semblanzas-titulo">Resumen de Semblanzas</span>

                    <a href="docs/semblanzas_consejo_sefca.pdf" target="_blank" rel="noopener noreferrer" class="consejo-semblanzas-btn">
                        Abrir <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Columna derecha: imagen -->
            <div class="consejo-imagen-col wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.3s">
                <img src="img/30_aniversario/consejo_completo_30.jpg" alt="Consejo Directivo SEFCA" class="consejo_img">
            </div>

        </div>

        <!-- Bloque inferior: menú tipo folder -->
        <div class="consejo-accordion-bloque">
            <div class="consejo-accordion-header">
                <h3 class="consejo-accordion-title">
                    Integrantes por cargo
                </h3>

                <p class="consejo-accordion-text">
                    Consulta la integración del Consejo Directivo por responsabilidades y áreas de representación.
                </p>
            </div>

            <style>
                /* Ajustes locales: solo afectan la sección Consejo Directivo */
                .consejo-feature-card {
                    grid-template-columns: minmax(0, 0.78fr) minmax(0, 1.22fr);
                    gap: clamp(0.9rem, 1.8vw, 1.4rem);
                    padding: clamp(1.25rem, 2.4vw, 2rem);
                }

                .consejo-info-col {
                    padding: clamp(1.35rem, 2.8vw, 2.15rem);
                }

                .consejo-feature-card .consejo-imagen-col {
                    min-height: 100%;
                }

                .consejo-feature-card .consejo_img {
                    min-height: 460px;
                }

                .consejo-folder-widget {
                    width: 100%;
                    max-width: 100%;
                    background-color: #ffffff;
                    border: 1px solid rgba(0, 0, 0, 0.06);
                    border-radius: 22px;
                    box-shadow: 0 18px 55px rgba(17, 48, 75, 0.08);
                    overflow: hidden;
                    font-family: var(--fuente-texto);
                }

                .consejo-folder-tabs {
                    display: flex;
                    height: 64px;
                    background-color: rgba(17, 48, 75, 0.045);
                    border-radius: 22px 22px 0 0;
                    overflow-x: auto;
                    scrollbar-width: none;
                    -ms-overflow-style: none;
                }

                .consejo-folder-tabs::-webkit-scrollbar {
                    display: none;
                }

                .consejo-folder-tab {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    min-width: max-content;
                    padding: 0 20px;
                    border: 0;
                    outline: none;
                    background-color: transparent;
                    border-radius: 22px 22px 0 0;
                    color: var(--secondary);
                    cursor: pointer;
                    flex-shrink: 0;
                    font-family: var(--fuente-texto);
                    font-size: 0.88rem;
                    font-weight: 500;
                    letter-spacing: 0.2px;
                    line-height: 1;
                    position: relative;
                    text-align: center;
                    transition: color 0.2s ease, background-color 0.2s ease;
                    white-space: nowrap;
                }

                .consejo-folder-tab:hover,
                .consejo-folder-tab:focus-visible {
                    color: var(--azul_unam);
                }

                .consejo-folder-tab.activa {
                    background-color: #ffffff;
                    color: var(--azul_unam);
                    font-weight: 600;
                    padding: 0 28px;
                }

                .consejo-folder-tab .indicador {
                    display: none;
                    position: absolute;
                    bottom: 12px;
                    left: 28px;
                    right: 28px;
                    height: 3px;
                    background-color: var(--dorado-unam);
                    border-radius: 2px;
                }

                .consejo-folder-tab.activa .indicador {
                    display: block;
                }

                .consejo-folder-panel {
                    display: none;
                    padding: 0.6rem 1.5rem 1.5rem;
                    background-color: #ffffff;
                }

                .consejo-folder-panel.activo {
                    display: block;
                }

                .consejo-folder-item {
                    display: flex;
                    align-items: center;
                    gap: 0;
                    padding: 1.1rem 0;
                    border-bottom: 1px solid rgba(0, 0, 0, 0.06);
                }

                .consejo-folder-item:last-child {
                    border-bottom: none;
                }

                .consejo-folder-icono {
                    width: 46px;
                    height: 46px;
                    min-width: 46px;
                    border-radius: 50%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-right: 18px;
                    flex-shrink: 0;
                }

                .consejo-folder-icono.icono-claro {
                    background-color: rgba(17, 48, 75, 0.07);
                }

                .consejo-folder-icono.icono-oscuro {
                    background-color: var(--azul_unam);
                }

                .consejo-folder-icono.icono-claro svg path,
                .consejo-folder-icono.icono-claro svg rect,
                .consejo-folder-icono.icono-claro svg circle {
                    stroke: var(--azul_unam);
                    fill: none;
                }

                .consejo-folder-icono.icono-claro svg circle[fill="#111"],
                .consejo-folder-icono.icono-claro svg path[fill="#111"] {
                    fill: var(--azul_unam);
                    stroke: none;
                }

                .consejo-folder-detalles {
                    flex-grow: 1;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    min-width: 0;
                }

                .consejo-folder-nombre {
                    color: var(--azul_unam);
                    font-family: var(--fuente-texto);
                    font-size: 0.96rem;
                    font-weight: 600;
                    line-height: 1.35;
                    margin-bottom: 0.25rem;
                }

                .consejo-folder-subtitulo {
                    color: var(--secondary);
                    font-family: var(--fuente-texto);
                    font-size: 0.8rem;
                    font-weight: 400;
                    line-height: 1.45;
                    opacity: 0.86;
                }

                .consejo-folder-cargo {
                    color: var(--dorado-unam);
                    font-family: var(--fuente-texto);
                    font-size: 0.79rem;
                    font-weight: 600;
                    letter-spacing: 0.2px;
                    margin-left: 18px;
                    text-align: right;
                    white-space: nowrap;
                }

                @media (max-width: 991.98px) {
                    .consejo-feature-card {
                        grid-template-columns: 1fr;
                    }

                    .consejo-info-col {
                        padding: 1.7rem 1.5rem;
                    }

                    .consejo-feature-card .consejo_img {
                        min-height: 340px;
                    }
                }

                @media (max-width: 767px) {
                    .consejo-folder-tabs {
                        height: 60px;
                    }

                    .consejo-folder-tab {
                        font-size: 0.84rem;
                        padding: 0 18px;
                    }

                    .consejo-folder-tab.activa {
                        padding: 0 22px;
                    }

                    .consejo-folder-panel {
                        padding: 0.4rem 1.1rem 1.1rem;
                    }

                    .consejo-folder-item {
                        align-items: flex-start;
                        padding: 1rem 0;
                    }

                    .consejo-folder-nombre {
                        font-size: 0.92rem;
                    }

                    .consejo-folder-cargo {
                        display: none;
                    }
                }

                @media (max-width: 575.98px) {
                    .consejo-feature-card {
                        padding: 1rem;
                    }

                    .consejo-info-col {
                        padding: 1.3rem 1rem;
                    }

                    .consejo-feature-card .consejo_img {
                        min-height: 300px;
                    }
                }
            </style>

            <div class="consejo-folder-widget" data-consejo-folder>
                <!-- Cabecera de pestañas -->
                <div class="consejo-folder-tabs" role="tablist" aria-label="Integrantes por cargo">
                    <button class="consejo-folder-tab activa" type="button" role="tab" aria-selected="true" aria-controls="folder-presidente" id="tab-presidente" data-folder-target="folder-presidente">
                        Presidente
                        <span class="indicador"></span>
                    </button>

                    <button class="consejo-folder-tab" type="button" role="tab" aria-selected="false" aria-controls="folder-presidente-honorario" id="tab-presidente-honorario" data-folder-target="folder-presidente-honorario">
                        Presidente Honorario
                        <span class="indicador"></span>
                    </button>

                    <button class="consejo-folder-tab" type="button" role="tab" aria-selected="false" aria-controls="folder-vicepresidentes" id="tab-vicepresidentes" data-folder-target="folder-vicepresidentes">
                        Vicepresidentes
                        <span class="indicador"></span>
                    </button>

                    <button class="consejo-folder-tab" type="button" role="tab" aria-selected="false" aria-controls="folder-tesorero" id="tab-tesorero" data-folder-target="folder-tesorero">
                        Tesorero
                        <span class="indicador"></span>
                    </button>

                    <button class="consejo-folder-tab" type="button" role="tab" aria-selected="false" aria-controls="folder-director-ejecutivo" id="tab-director-ejecutivo" data-folder-target="folder-director-ejecutivo">
                        Director Ejecutivo
                        <span class="indicador"></span>
                    </button>

                    <button class="consejo-folder-tab" type="button" role="tab" aria-selected="false" aria-controls="folder-secretario" id="tab-secretario" data-folder-target="folder-secretario">
                        Secretario
                        <span class="indicador"></span>
                    </button>

                    <button class="consejo-folder-tab" type="button" role="tab" aria-selected="false" aria-controls="folder-consejeros" id="tab-consejeros" data-folder-target="folder-consejeros">
                        Consejeros
                        <span class="indicador"></span>
                    </button>

                    <button class="consejo-folder-tab" type="button" role="tab" aria-selected="false" aria-controls="folder-comisario" id="tab-comisario" data-folder-target="folder-comisario">
                        Comisario
                        <span class="indicador"></span>
                    </button>

                    <button class="consejo-folder-tab" type="button" role="tab" aria-selected="false" aria-controls="folder-auditor" id="tab-auditor" data-folder-target="folder-auditor">
                        Auditor
                        <span class="indicador"></span>
                    </button>

                    <button class="consejo-folder-tab" type="button" role="tab" aria-selected="false" aria-controls="folder-consejo-consultivo" id="tab-consejo-consultivo" data-folder-target="folder-consejo-consultivo">
                        Consejo Consultivo
                        <span class="indicador"></span>
                    </button>
                </div>

                <!-- Contenido principal -->
                <div class="consejo-folder-panel activo" id="folder-presidente" role="tabpanel" aria-labelledby="tab-presidente">
                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Isaac Chertorivski</div>
                            <div class="consejo-folder-subtitulo">Titular del Consejo Directivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Presidente</div>
                    </div>
                </div>

                <div class="consejo-folder-panel" id="folder-presidente-honorario" role="tabpanel" aria-labelledby="tab-presidente-honorario">
                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Dr. Armando Tomé González</div>
                            <div class="consejo-folder-subtitulo">Representación honoraria del Consejo Directivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Presidente Honorario</div>
                    </div>
                </div>

                <div class="consejo-folder-panel" id="folder-vicepresidentes" role="tabpanel" aria-labelledby="tab-vicepresidentes">
                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Héctor Alfonso Bolio Arciniega</div>
                            <div class="consejo-folder-subtitulo">Vicepresidencia</div>
                        </div>
                        <div class="consejo-folder-cargo">VP Ejecutivo</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Felipe Pérez Cervantes</div>
                            <div class="consejo-folder-subtitulo">Vicepresidencia</div>
                        </div>
                        <div class="consejo-folder-cargo">VP Ejecutivo</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Manuel Arce Rincón</div>
                            <div class="consejo-folder-subtitulo">Vicepresidencia</div>
                        </div>
                        <div class="consejo-folder-cargo">VP Administración</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Armando Espinosa Álvarez</div>
                            <div class="consejo-folder-subtitulo">Vicepresidencia</div>
                        </div>
                        <div class="consejo-folder-cargo">VP Contaduría</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Marcela Peñaloza Báez</div>
                            <div class="consejo-folder-subtitulo">Vicepresidencia</div>
                        </div>
                        <div class="consejo-folder-cargo">VP Informática</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Francisco Javier Macías Valadez Treviño</div>
                            <div class="consejo-folder-subtitulo">Vicepresidencia</div>
                        </div>
                        <div class="consejo-folder-cargo">VP Posgrado</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Joaquín Méndez Salvador</div>
                            <div class="consejo-folder-subtitulo">Vicepresidencia</div>
                        </div>
                        <div class="consejo-folder-cargo">VP Relaciones Institucionales</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Héctor Guillermo Silva Mayer</div>
                            <div class="consejo-folder-subtitulo">Vicepresidencia</div>
                        </div>
                        <div class="consejo-folder-cargo">VP Relaciones Institucionales</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">David Peñaloza</div>
                            <div class="consejo-folder-subtitulo">Vicepresidencia</div>
                        </div>
                        <div class="consejo-folder-cargo">VP Relaciones Corporativas</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Salvador Sánchez Vázquez</div>
                            <div class="consejo-folder-subtitulo">Vicepresidencia</div>
                        </div>
                        <div class="consejo-folder-cargo">VP Comunicación Social</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Jesús Hernández Torres</div>
                            <div class="consejo-folder-subtitulo">Vicepresidencia</div>
                        </div>
                        <div class="consejo-folder-cargo">VP Promoción y Vinculación con Egresados</div>
                    </div>
                </div>

                <div class="consejo-folder-panel" id="folder-tesorero" role="tabpanel" aria-labelledby="tab-tesorero">
                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Luis González Ortega</div>
                            <div class="consejo-folder-subtitulo">Responsable de tesorería</div>
                        </div>
                        <div class="consejo-folder-cargo">Tesorero</div>
                    </div>
                </div>

                <div class="consejo-folder-panel" id="folder-director-ejecutivo" role="tabpanel" aria-labelledby="tab-director-ejecutivo">
                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Arturo Velázquez Jiménez</div>
                            <div class="consejo-folder-subtitulo">Coordinación ejecutiva del Consejo Directivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Director Ejecutivo</div>
                    </div>
                </div>

                <div class="consejo-folder-panel" id="folder-secretario" role="tabpanel" aria-labelledby="tab-secretario">
                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Alberto Namnum</div>
                            <div class="consejo-folder-subtitulo">Secretaría del Consejo Directivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Secretario</div>
                    </div>
                </div>

                <div class="consejo-folder-panel" id="folder-consejeros" role="tabpanel" aria-labelledby="tab-consejeros">
                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Elsa Beatriz García Bojorges</div>
                            <div class="consejo-folder-subtitulo">Integrante del Consejo Directivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Consejera</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">María Elena García Hernández</div>
                            <div class="consejo-folder-subtitulo">Integrante del Consejo Directivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Consejera</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Juan Manuel Portal Martínez</div>
                            <div class="consejo-folder-subtitulo">Integrante del Consejo Directivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Consejero</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Victor Manuel Terrones</div>
                            <div class="consejo-folder-subtitulo">Integrante del Consejo Directivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Consejero</div>
                    </div>
                </div>

                <div class="consejo-folder-panel" id="folder-comisario" role="tabpanel" aria-labelledby="tab-comisario">
                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Enrique Alejandro Rivas Zivy</div>
                            <div class="consejo-folder-subtitulo">Comisaría del Consejo Directivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Comisario</div>
                    </div>
                </div>

                <div class="consejo-folder-panel" id="folder-auditor" role="tabpanel" aria-labelledby="tab-auditor">
                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">César Hernández Maciel</div>
                            <div class="consejo-folder-subtitulo">Auditoría del Consejo Directivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Auditor</div>
                    </div>
                </div>

                <div class="consejo-folder-panel" id="folder-consejo-consultivo" role="tabpanel" aria-labelledby="tab-consejo-consultivo">
                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Rubén Goldberg</div>
                            <div class="consejo-folder-subtitulo">Integrante del Consejo Consultivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Consultivo</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Elías Lanson</div>
                            <div class="consejo-folder-subtitulo">Integrante del Consejo Consultivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Consultivo</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Carlos Machorro</div>
                            <div class="consejo-folder-subtitulo">Integrante del Consejo Consultivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Consultivo</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Juan Carlos Varela Cota</div>
                            <div class="consejo-folder-subtitulo">Integrante del Consejo Consultivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Consultivo</div>
                    </div>

                    <div class="consejo-folder-item">
                        <div class="consejo-folder-icono icono-claro" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="#111"/><path d="M4 20c.8-4.3 4-7 8-7s7.2 2.7 8 7" fill="none" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <div class="consejo-folder-detalles">
                            <div class="consejo-folder-nombre">Joaquín Méndez Salvador</div>
                            <div class="consejo-folder-subtitulo">Integrante del Consejo Consultivo</div>
                        </div>
                        <div class="consejo-folder-cargo">Consultivo</div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const folderWidgets = document.querySelectorAll('[data-consejo-folder]');

                    folderWidgets.forEach(function (widget) {
                        const tabs = widget.querySelectorAll('.consejo-folder-tab');
                        const panels = widget.querySelectorAll('.consejo-folder-panel');

                        tabs.forEach(function (tab) {
                            tab.addEventListener('click', function () {
                                const targetId = tab.getAttribute('data-folder-target');

                                tabs.forEach(function (currentTab) {
                                    currentTab.classList.remove('activa');
                                    currentTab.setAttribute('aria-selected', 'false');
                                });

                                panels.forEach(function (panel) {
                                    panel.classList.remove('activo');
                                });

                                tab.classList.add('activa');
                                tab.setAttribute('aria-selected', 'true');

                                const targetPanel = widget.querySelector('#' + targetId);
                                if (targetPanel) {
                                    targetPanel.classList.add('activo');
                                }

                                tab.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                            });
                        });
                    });
                });
            </script>
        </div>

    </div>
</div>
<!-- Fin de Consejo Directivo -->
