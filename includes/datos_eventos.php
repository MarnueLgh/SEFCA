<?php

if (!function_exists('obtener_eventos_sefca')) {
    function obtener_eventos_sefca()
    {
        return [
            'aulas_dignas_fca' => [
                'titulo' => 'Aulas dignas de la FCA',
                'descripcion' => 'Conoce la distribución de fondos de esta gran iniciativa enfocada en modernizar las instalaciones de nuestra Facultad para beneficio de la comunidad estudiantil.',
                'imagen' => 'img/fca/aulas_dignas_harv.jpg',
                'imagen_alt' => 'Aulas dignas de la FCA',
                'listado' => false,
                'home' => [
                    'mostrar' => true,
                    'orden' => 1,
                    'enlace' => 'docs/resumen_aulas.pdf',
                    'excerpt' => 'Conoce la distribución de fondos de esta gran iniciativa enfocada en modernizar las instalaciones de nuestra Facultad para beneficio de la comunidad estudiantil.',
                    'boton' => 'Ver más',
                    'target_blank' => true,
                ],
            ],
            'asamblea_general_ordinaria_2026' => [
                'titulo' => 'Asamblea General Ordinaria',
                'fecha_etiqueta' => '27 de mayo de 2026',
                'descripcion' => 'Convocatoria a la Asamblea General Ordinaria de la SEFCA, invitando a todos los asociados a participar.',
                'imagen' => 'img/asamblea_general_ordinaria_mayo.png',
                'imagen_alt' => 'Asamblea General Ordinaria SEFCA',
                'tipo' => 'evento',
                'mes' => 5,
                'anio' => 2026,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver más',
                        'url' => 'https://sefca.fca.unam.mx/docs/Convocatoria_Asamblea_27_mayo26-1.pdf',
                        'target_blank' => true,
                    ],
                ],
            ],
            'ensayos_premiados_2026' => [
                'titulo' => 'Ensayos Premiados en el Concurso de Ensayo FCA-SEFCA',
                'fecha_etiqueta' => '27 de mayo de 2026',
                'descripcion' => 'Conoce los 9 ensayos galardonados en esta edición del Concurso de Ensayo FCA-SEFCA 2025.',
                'imagen' => 'img/banner_principal/BANNERS_GANADORES_SEFCA_B-01_rectangulo.jpg',
                'imagen_alt' => 'Concurso de Ensayo SEFCA 2025',
                'tipo' => 'evento',
                'mes' => 5,
                'anio' => 2026,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver más',
                        'url' => 'https://www.fca.unam.mx/docs/avisos/CONCURSO_ENSAYO_FCA_SOCIEDAD_EGRESADOS_2025_4.pdf',
                        'target_blank' => true,
                    ],
                ],
            ],
            'premiacion_concurso_sefca' => [
                'titulo' => 'Premiación del Concurso de Ensayos FCA-SEFCA 2025',
                'fecha_etiqueta' => '27 de mayo de 2026',
                'descripcion' => 'Entrega de galardones a los autores de los mejores ensayos de 2025, celebrando el talento y la visión de nuestros estudiantes.',
                'imagen' => 'img/premiacion_ensayos_2026/reconocimiento_ensayo1.jpg',
                'imagen_alt' => 'Concurso de Ensayo SEFCA 2025',
                'tipo' => 'evento',
                'mes' => 5,
                'anio' => 2026,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver galería',
                        'url' => 'evento.php?evento=premiacion_concurso_sefca',
                        'target_blank' => true,
                    ],
                ],
                'galeria' => [
                    'carpeta' => 'img/premiacion_ensayos_2026',
                    'extension' => 'jpg',
                    'fotos' => [
                        'reconocimiento_ensayo1.jpg',
                        'reconocimiento_ensayo2.jpg',
                        'reconocimiento_ensayo3.jpg',
                        'reconocimiento_ensayo4.jpg',
                        'reconocimiento_ensayo5.jpg',
                        'reconocimiento_ensayo6.jpg',
                        'reconocimiento_ensayo7.jpg',
                        'reconocimiento_ensayo8.jpg',
                        'reconocimiento_ensayo9.jpg',
                        'reconocimiento_ensayo10.jpg',
                        'reconocimiento_ensayo11.jpg',
                        'reconocimiento_ensayo12.jpg',
                        'reconocimiento_ensayo13.jpg',
                        'reconocimiento_ensayo14.jpg',
                        'reconocimiento_ensayo15.jpg',
                    ],
                ],
            ],
            'concurso_ensayo_sefca_2025' => [
                'titulo' => 'Convocatoria Concurso de Ensayo SEFCA 2025',
                'fecha_etiqueta' => '4 de septiembre de 2025',
                'descripcion' => 'Convocatoria del Concurso de Ensayo SEFCA 2025 para egresados y comunidad FCA interesada en proponer ideas con impacto académico y social.',
                'imagen' => 'img/concurso_ensayo.jpg',
                'imagen_alt' => 'Concurso de Ensayo SEFCA 2025',
                'tipo' => 'convocatoria',
                'mes' => 9,
                'anio' => 2025,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver más',
                        'url' => 'docs/concurso_ensayo_SEFCA_25.pdf',
                        'target_blank' => true,
                    ],
                ],
                'home' => [
                    'mostrar' => true,
                    'orden' => 2,
                    'excerpt' => 'Participa, demuestra tus conocimientos y gana reconocimiento en esta edición de nuestro prestigioso concurso anual de ensayo.',
                    'boton' => 'Ver más',
                    'target_blank' => true,
                ],
            ],
            'alfredo_helu' => [
                'titulo' => 'Visita de Alfredo Harp Helú',
                'fecha_etiqueta' => '24 de marzo de 2025',
                'descripcion' => 'Visita de Alfredo Harp Helú a la FCA para dialogar sobre liderazgo, compromiso social y el papel de la educación en el desarrollo del país.',
                'imagen' => 'img/250324_Visita_de_Alfredo_Harp_Helu.jpg',
                'imagen_alt' => 'Visita de Alfredo Harp Helú',
                'tipo' => 'egresado_distinguido',
                'mes' => 3,
                'anio' => 2025,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver galería',
                        'url' => 'evento.php?evento=alfredo_helu',
                    ],
                ],
                'galeria' => [
                    'carpeta' => 'img',
                    'extension' => 'jpg',
                    'fotos' => [
                        'visita_alfredo_helu_1.jpg',
                        'visita_alfredo_helu_2.jpg',
                        'visita_alfredo_helu_3.jpg',
                        'visita_alfredo_helu_4.jpg',
                    ],
                ],
                'home' => [
                    'mostrar' => true,
                    'orden' => 3,
                    'excerpt' => 'Revive los mejores momentos del recorrido realizado en nuestras instalaciones por uno de los egresados más ilustres de la UNAM.',
                    'boton' => 'Ver más',
                ],
            ],
            'video_30_aniversario' => [
                'titulo' => 'Video conmemorativo: 30 años de historia',
                'fecha_etiqueta' => '19 de febrero de 2025',
                'descripcion' => 'Celebramos nuestros más de 30 años de historia y compromiso con la comunidad de egresados de la FCA en este video conmemorativo.',
                'imagen' => 'img/30_aniversario.jpg',
                'imagen_alt' => 'Video conmemorativo 30 años',
                'tipo' => 'evento',
                'mes' => 2,
                'anio' => 2025,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver en Youtube',
                        'url' => 'https://www.youtube.com/watch?v=3RzU-kjkvRo',
                        'clase' => 'evento-card-enlace-secundario',
                        'target_blank' => true,
                    ],
                ],
            ],
            // PENDIENTE SEFCA: entrada creada a partir de material que estaba sin usar
            // (docs/toma_protesta_2022-2024.jpg y docs/toma_protesta_2022-2024.docx).
            // Faltan por confirmar: la fecha exacta de la ceremonia y si img/toma_protesta.jpg
            // corresponde de verdad a este periodo. Sin 'mes'/'anio' hasta tenerlos.
            'toma_protesta_2022' => [
                'titulo' => 'Toma de protesta de la mesa directiva 2022-2024',
                'fecha_etiqueta' => 'Fecha por confirmar',
                'descripcion' => 'Ceremonia de toma de protesta de la mesa directiva de la SEFCA para el periodo 2022-2024.',
                'imagen' => 'img/toma_protesta.jpg',
                'imagen_alt' => 'Toma de protesta de la mesa directiva 2022-2024',
                'tipo' => 'toma_protesta',
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver más',
                        'url' => 'docs/toma_protesta_2022-2024.jpg',
                        'target_blank' => true,
                    ],
                ],
            ],
            'toma_protesta_2024' => [
                'titulo' => 'Toma de protesta de la mesa directiva 2024-2026',
                'fecha_etiqueta' => '17 de octubre de 2024',
                'descripcion' => 'Ceremonia de toma de protesta de la mesa directiva de la SEFCA para el periodo 2024-2026, con la participación de autoridades y egresados.',
                'imagen' => 'img/toma_protesta_2024.jpg',
                'imagen_alt' => 'Toma de protesta de la mesa directiva 2024-2026',
                'tipo' => 'toma_protesta',
                'mes' => 10,
                'anio' => 2024,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver más',
                        'url' => 'docs/toma_protesta_2024-2026.pdf',
                        'target_blank' => true,
                    ],
                ],
                'home' => [
                    'mostrar' => true,
                    'orden' => 4,
                    'titulo' => 'Toma de protesta 2024-2026',
                    'excerpt' => 'Ceremonia oficial y toma de protesta de la nueva mesa directiva trabajando por el constante desarrollo de los egresados de la FCA.',
                    'boton' => 'Ver más',
                    'target_blank' => true,
                ],
            ],
            'informe_actividades_2023' => [
                'titulo' => 'Informe de actividades 2022-2023',
                'fecha_etiqueta' => '8 de junio de 2023',
                'descripcion' => 'Informe de actividades SEFCA 2022-2023 con resultados, logros institucionales y acciones para fortalecer la vinculación con la comunidad.',
                'imagen' => 'img/informe_actividades.jpg',
                'imagen_alt' => 'Informe de actividades 2022-2023',
                'tipo' => 'evento',
                'mes' => 6,
                'anio' => 2023,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver más',
                        'url' => 'docs/informe_actividades.pdf',
                        'target_blank' => true,
                    ],
                ],
                'home' => [
                    'mostrar' => true,
                    'orden' => 5,
                    'excerpt' => 'Consulta el resumen oficial de actividades, resultados financieros y todos los hitos y logros alcanzados durante el periodo documentado.',
                    'boton' => 'Ver más',
                    'target_blank' => true,
                ],
            ],
            'reconocimiento_paola_reynoso' => [
                'titulo' => 'Entrega de Reconocimiento a Paola Reynoso',
                'fecha_etiqueta' => '8 de junio de 2023',
                'descripcion' => 'Entrega de reconocimiento a Paola Reynoso por su trayectoria y por obtener el primer lugar del Premio Internacional Universia Santander.',
                'imagen' => 'img/paola1.jpg',
                'imagen_alt' => 'Entrega de Reconocimiento a Paola Reynoso',
                'tipo' => 'egresado_distinguido',
                'mes' => 6,
                'anio' => 2023,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver más',
                        'url' => 'img/agradecimiento_paola.jpg',
                        'target_blank' => true,
                    ],
                ],
            ],
            '30_aniversario' => [
                'titulo' => '30 aniversario de egresados de la SEFCA',
                'fecha_etiqueta' => '1 de marzo de 2023',
                'descripcion' => 'Celebración del 30 aniversario de la SEFCA en el Palacio de Autonomía, conmemorando su historia y compromiso con la comunidad de egresados.',
                'imagen' => 'img/egresados.jpg',
                'imagen_alt' => '30 aniversario de egresados',
                'tipo' => 'evento',
                'mes' => 3,
                'anio' => 2023,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver galería',
                        'url' => 'evento.php?evento=30_aniversario',
                    ],
                    [
                        'texto' => 'Ver en Gaceta UNAM',
                        'url' => 'img/articulo_30_aniversario_gaceta.jpg',
                        'clase' => 'evento-card-enlace-secundario',
                        'target_blank' => true,
                    ],
                ],
                'galeria' => [
                    'carpeta' => 'img/30_aniversario',
                    'extension' => 'jpg',
                    'cantidad' => 13,
                    'inicio' => 1,
                ],
            ],
            'primer_ciclo_conferencias' => [
                'titulo' => 'Primer ciclo de conferencias magistrales',
                'fecha_etiqueta' => '5 de septiembre de 2022',
                'descripcion' => 'Primer ciclo de conferencias magistrales con ponentes invitados que compartieron experiencias y aprendizajes clave para la comunidad FCA.',
                'imagen' => 'img/ciclo1.jpg',
                'imagen_alt' => 'Primer ciclo de conferencias magistrales',
                'tipo' => 'conferencia',
                'mes' => 9,
                'anio' => 2022,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver en Youtube',
                        'url' => 'https://www.youtube.com/watch?v=-VPJKdsu_wQ&list=PLEcS-HQTcBAoY--ot6Kw53cZOxbaTi_H8',
                        'clase' => 'evento-card-enlace-secundario',
                        'target_blank' => true,
                    ],
                ],
            ],
            'segundo_ciclo_conferencias' => [
                'titulo' => 'Segundo ciclo de conferencias magistrales',
                'fecha_etiqueta' => '14 de noviembre de 2022',
                'descripcion' => 'Segundo ciclo de conferencias magistrales con especialistas que abordaron tendencias, desafíos y oportunidades del entorno profesional.',
                'imagen' => 'img/ciclo2.jpg',
                'imagen_alt' => 'Segundo ciclo de conferencias magistrales',
                'tipo' => 'conferencia',
                'mes' => 11,
                'anio' => 2022,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver en Youtube',
                        'url' => 'https://www.youtube.com/watch?v=HyzQ4AvFVjM&list=PLEcS-HQTcBAqe98ozaZYXusliQhWq8Wmx',
                        'clase' => 'evento-card-enlace-secundario',
                        'target_blank' => true,
                    ],
                ],
            ],
            'cuarto_ciclo_conferencias' => [
                'titulo' => 'Cuarto ciclo de conferencias magistrales',
                'fecha_etiqueta' => '30 de septiembre de 2025',
                'descripcion' => 'Conferencia magistral del Lic. Isaac Chertorivski sobre estrategia empresarial y decisiones clave para dirigir una empresa en tiempos de crisis.',
                'imagen' => 'img/Cartel_Conferencia_Lic_Isaac_Chertorivski.jpg',
                'imagen_alt' => 'Cuarto ciclo de conferencias magistrales',
                'tipo' => 'conferencia',
                'mes' => 9,
                'anio' => 2025,
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver más',
                        'url' => 'img/Cartel_Conferencia_Lic_Isaac_Chertorivski.jpg',
                        'target_blank' => true,
                    ],
                ],
            ],
            // PENDIENTE SEFCA: falta la fecha real de este ciclo. Mientras no la tenga
            // no se definen 'mes' ni 'anio', por lo que la tarjeta se muestra siempre
            // pero no coincide con ningún filtro por año.
            'conferencias_magistrales' => [
                'titulo' => 'Conferencias Magistrales',
                'fecha_etiqueta' => 'Fecha por confirmar',
                'descripcion' => 'Galería fotográfica de conferencias magistrales.',
                'imagen' => 'img/conferencias_magistrales/02.JPG',
                'imagen_alt' => 'Conferencias Magistrales',
                'tipo' => 'conferencia',
                'listado' => true,
                'acciones' => [
                    [
                        'texto' => 'Ver galería',
                        'url' => 'evento.php?evento=conferencias_magistrales',
                    ],
                ],
                'galeria' => [
                    'carpeta' => 'img/conferencias_magistrales',
                    'extension' => 'JPG',
                    'fotos' => [
                        '02.JPG',
                        '03.JPG',
                        '04.JPG',
                        '05.JPG',
                        '06.JPG',
                        '07.JPG',
                        '08.JPG',
                        '09.JPG',
                        '11.JPG',
                        '12.JPG',
                        '13.JPG',
                        '14.JPG',
                        '15.JPG',
                        '16.JPG',
                        '17.JPG',
                        '18.JPG',
                        '19.JPG',
                        '20.JPG',
                    ],
                ],
            ],
        ];
    }
}

/*
    Devuelve los eventos que se muestran en un listado.

    $tipo (opcional) restringe el resultado a un solo valor de 'tipo'
    ('conferencia', 'toma_protesta', 'egresado_distinguido', 'evento',
    'convocatoria'). Sin argumento devuelve el listado completo, igual que antes.
*/
if (!function_exists('obtener_eventos_listado')) {
    function obtener_eventos_listado($tipo = null)
    {
        $eventos = [];

        foreach (obtener_eventos_sefca() as $clave => $evento) {
            if (empty($evento['listado'])) {
                continue;
            }

            $tipo_evento = isset($evento['tipo']) ? $evento['tipo'] : '';

            if ($tipo !== null && $tipo_evento !== $tipo) {
                continue;
            }

            $eventos[$clave] = $evento;
        }

        return $eventos;
    }
}

if (!function_exists('obtener_eventos_galeria')) {
    function obtener_eventos_galeria()
    {
        $eventos = [];

        foreach (obtener_eventos_sefca() as $clave => $evento) {
            if (isset($evento['galeria'])) {
                $eventos[$clave] = $evento;
            }
        }

        return $eventos;
    }
}

if (!function_exists('obtener_eventos_carrusel')) {
    function obtener_eventos_carrusel()
    {
        $cards = [];
        $index = 0;

        foreach (obtener_eventos_sefca() as $evento) {
            // Only include events with registered dates
            if (empty($evento['anio']) || empty($evento['mes'])) {
                continue;
            }

            $accion = isset($evento['acciones'][0]) ? $evento['acciones'][0] : [];
            $home = isset($evento['home']) ? $evento['home'] : [];

            // Skip if explicitly marked as hidden on home
            if (isset($home['mostrar']) && !$home['mostrar']) {
                continue;
            }

            $cards[] = [
                'index' => $index++,
                'anio' => (int) $evento['anio'],
                'mes' => (int) $evento['mes'],
                'enlace' => isset($home['enlace']) ? $home['enlace'] : (isset($accion['url']) ? $accion['url'] : '#'),
                'imagen' => isset($home['imagen']) ? $home['imagen'] : $evento['imagen'],
                'titulo' => isset($home['titulo']) ? $home['titulo'] : $evento['titulo'],
                'excerpt' => isset($home['excerpt']) ? $home['excerpt'] : (isset($evento['descripcion']) ? $evento['descripcion'] : ''),
                'boton' => isset($home['boton']) ? $home['boton'] : (isset($accion['texto']) ? $accion['texto'] : 'Ver más'),
                'target_blank' => !empty($home['target_blank']) || !empty($accion['target_blank']),
            ];
        }

        // Sort by year descending, then by month descending, preserving order of appearance
        usort($cards, function ($a, $b) {
            if ($b['anio'] !== $a['anio']) {
                return $b['anio'] - $a['anio'];
            }
            if ($b['mes'] !== $a['mes']) {
                return $b['mes'] - $a['mes'];
            }
            return $a['index'] - $b['index'];
        });

        return $cards;
    }
}
