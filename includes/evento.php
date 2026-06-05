<?php
if (isset($_SERVER['SCRIPT_FILENAME']) && realpath($_SERVER['SCRIPT_FILENAME']) === __FILE__) {
    $queryString = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== ''
        ? '?' . $_SERVER['QUERY_STRING']
        : '';

    header('Location: ../evento.php' . $queryString);
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<?php require_once __DIR__ . "/head.php"; ?>



<?php
/*
 *
 *  CONFIGURACIÓN DE EVENTOS
 *  Para agregar un nuevo evento con galería:
 *  1. Crea una carpeta en img/ con las fotos del evento
 *  2. Agrega una entrada al array $eventos con:
 *     - titulo: nombre del evento
 *     - fecha: fecha del evento (opcional)
 *     - descripcion: texto descriptivo (opcional)
 *     - carpeta: ruta de la carpeta con las imágenes
 *     - extension: extensión de las fotos (jpg, JPG, png)
 *     - cantidad: número de fotos en la carpeta
 *     - inicio: número del primer archivo (ej: 1 para 01.jpg)
 *  3. En eventos.php, agrega un <article> apuntando
 *     a evento.php?evento=TU_CLAVE
 *
 */

$eventos = [
    '30_aniversario' => [
        'titulo'      => '30 aniversario de egresados de la SEFCA',
        'carpeta'     => 'img/30_aniversario',
        'extension'   => 'jpg',
        'cantidad'    => 13,
        'inicio'      => 1,
    ],
    'alfredo_helu' => [
        'titulo'      => 'Visita de Alfredo Harp Helú',
        'carpeta'     => 'img',
        'extension'   => 'jpg',
        'fotos'       => [
            'visita_alfredo_helu_1.jpg',
            'visita_alfredo_helu_2.jpg',
            'visita_alfredo_helu_3.jpg',
            'visita_alfredo_helu_4.jpg',
        ],
    ],
    'conferencias_magistrales' => [
        'titulo'      => 'Conferencias Magistrales',
        'carpeta'     => 'img/conferencias_magistrales',
        'extension'   => 'JPG',
        'fotos'       => [
            '02.JPG', '03.JPG', '04.JPG', '05.JPG', '06.JPG', '07.JPG', '08.JPG', '09.JPG',
            '11.JPG', '12.JPG', '13.JPG', '14.JPG', '15.JPG', '16.JPG', '17.JPG', '18.JPG', '19.JPG', '20.JPG',
        ],
    ],
    'premiacion_concurso_sefca' => [
        'titulo'      => 'Premiación del Concurso de Ensayos FCA-SEFCA',
        'carpeta'     => 'img/premiacion_ensayos_2026',
        'extension'   => 'jpg',
        'fotos'       => [
            'reconocimiento_ensayo1.jpg', 'reconocimiento_ensayo2.jpg', 'reconocimiento_ensayo3.jpg', 'reconocimiento_ensayo4.jpg',
            'reconocimiento_ensayo5.jpg', 'reconocimiento_ensayo6.jpg', 'reconocimiento_ensayo7.jpg', 'reconocimiento_ensayo8.jpg',
            'reconocimiento_ensayo9.jpg', 'reconocimiento_ensayo10.jpg', 'reconocimiento_ensayo11.jpg', 'reconocimiento_ensayo12.jpg',
            'reconocimiento_ensayo13.jpg', 'reconocimiento_ensayo14.jpg', 'reconocimiento_ensayo15.jpg',
        ],
    ],
];

// Obtener evento seleccionado
$clave = isset($_GET['evento']) ? $_GET['evento'] : '';
$evento = isset($eventos[$clave]) ? $eventos[$clave] : null;

if (!$evento) {
    // Redirigir si no existe
    header('Location: eventos.php');
    exit;
}

$eventoTitulo = $evento['titulo'];
$eventoFecha = isset($evento['fecha']) ? $evento['fecha'] : '';
$eventoDescripcion = isset($evento['descripcion']) ? $evento['descripcion'] : '';

// Construir lista de fotos
$fotos = [];
if (isset($evento['fotos'])) {
    // Lista explícita de archivos
    foreach ($evento['fotos'] as $archivo) {
        $fotos[] = $evento['carpeta'] . '/' . $archivo;
    }
} else {
    // Archivos numerados secuenciales
    for ($i = $evento['inicio']; $i <= $evento['cantidad']; $i++) {
        $num = str_pad($i, 2, '0', STR_PAD_LEFT);
        $fotos[] = $evento['carpeta'] . '/' . $num . '.' . $evento['extension'];
    }
}
?>

<body>
    <?php include __DIR__ . "/spinner.php"; ?>
    <?php include __DIR__ . "/navbar.php"; ?>

    <!-- Hero de la galería -->
    <?php
        $heroTitulo = $eventoTitulo;
        $heroTexto  = !empty($eventoFecha) ? $eventoFecha : 'Galería fotográfica del evento.';
        include __DIR__ . "/hero-pagina.php";
    ?>


    <!-- Galería -->
    <div class="galeria-container">

        <?php if (!empty($eventoFecha) || !empty($eventoDescripcion)): ?>
            <div class="galeria-info">
                <?php if (!empty($eventoFecha)): ?>
                    <span class="galeria-info-fecha"><?php echo htmlspecialchars($eventoFecha); ?></span>
                <?php endif; ?>
                <?php if (!empty($eventoDescripcion)): ?>
                    <p class="galeria-info-desc"><?php echo htmlspecialchars($eventoDescripcion); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="galeria-grid">
            <?php foreach ($fotos as $index => $foto): ?>
                <div class="galeria-item">
                    <img src="<?php echo $foto; ?>" alt="Foto <?php echo $index + 1; ?> - <?php echo htmlspecialchars($eventoTitulo); ?>" loading="lazy">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php require_once __DIR__ . "/footer.php"; ?>

    <!-- Botón para volver arriba -->
    <?php include("includes/volver_arriba_btn.php"); ?>

    <!-- Scripts -->
    <?php require_once __DIR__ . "/scripts.php"; ?>
</body>

</html>
